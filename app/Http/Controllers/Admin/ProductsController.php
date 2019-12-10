<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Helpers\GeneralHelper;
use App\Product;
use App\ProductAdditional;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index()
    {
        $items = Product::all();
        return view('tenant.admin.products.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::where('status', 1)
            ->get();
        return view('tenant.admin.products.create', compact('categories'));
    }

    public function storeProduct(Request $request)
    {

        $validator = $this->validate(
            $request,
            [
                'name' => 'required',
                'price' => 'numeric',
                'min_price' => 'numeric',
                'max_price' => 'numeric',
                'category_id' => 'required',
                'description' => 'required',
                'images' => 'required',
                'images' => 'required|image|max:10024',
                'status' => 'required'
            ],
            [
                'category_id.required' => 'Please select category.',
                'images.required' => 'Please select image',
                'images.image' => 'Please select a valid image',
                'images.max' => 'Image must be less than 10MB.'
            ]
        );

        $product = new Product();
        $product->user_id = Auth::user()->id;
        $product->name = $request->name;
        $product->slug = GeneralHelper::seoUrl($request->name);
        $tenant = GeneralHelper::getCurrentTenant();
        if ($tenant === env('CLIENT1')) {
            $product->min_price = $request->min_price;
            $product->max_price = $request->max_price;
        }
        else {
            $product->price = $request->price;
        }
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->status = isset($request->status) && $request->status === 'active' ? 1 : 0;
        $product->save();

        $images = array();
        $img_dest = public_path('img/product');
        if ($files = $request->file('images')) {
                $name = $files->getClientOriginalName();
                $files->move($img_dest, $name);
                $images[] = $name;
                /*Insert your data*/
                $productImg = new ProductAdditional();
                $productImg->product_id = $product->id;
                $productImg->attachment = $name;
                $productImg->save();
                /*Insert your data*/

        }

        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Product has been created successfully.');
        return redirect(route('products.list'));
    }

    public function edit($id)
    {
        $item = Product::findOrFail($id);
        $categories = Category::where('status', 1)
            ->get();
        return view('tenant.admin.products.edit', compact('item', 'categories'));
    }

    public function updateProduct(Request $request)
    {
        $validator = $this->validate(
            $request,
            [
                'name' => 'required',
                'price' => 'numeric',
                'min_price' => 'numeric',
                'max_price' => 'numeric',
                'category_id' => 'required',
                'description' => 'required',
                'images' => 'required',
                'images' => 'image|max:10024',
                'status' => 'required'
            ],
            [
                'category_id.required' => 'Please select category.',
                'images.image' => 'Please select a valid image',
                'images.max' => 'Image must be less than 10MB.'
            ]
        );
        $product = Product::find($request->edit_id);
        $product->name = $request->name;
        $product->slug = GeneralHelper::seoUrl($request->name);

        $tenant = GeneralHelper::getCurrentTenant();
        if ($tenant === env('CLIENT1')) {
            $product->min_price = $request->min_price;
            $product->max_price = $request->max_price;
        }
        else {
            $product->price = $request->price;
        }
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->save();

        $images = array();
        $img_dest = public_path('img/product');
        if ($files = $request->file('images')) {
            if (isset($product->productAdditional->attachment)) {
                if (file_exists($img_dest.'/'.$product->productAdditional->attachment)) {
                    unlink($img_dest . '/' . $product->productAdditional->attachment);
                }
                $product->productAdditional->delete();
            }
                $name=$files->getClientOriginalName();
                $files->move($img_dest, $name);
                $images[] = $name;
                /*Insert your data*/
                $productImg = new ProductAdditional();
                $productImg->product_id = $product->id;
                $productImg->attachment = $name;
                $productImg->save();
                /*Insert your data*/
        }

        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Product has been updated successfully.');
        return redirect(route('products.list'));
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Product deleted successfully.');
        return redirect(route('products.list'));
    }
}
