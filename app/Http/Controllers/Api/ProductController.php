<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response as Res;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProductList(Request $request)
    {
        $products =  DB::table('products AS p')
            ->select('p.id', 'p.user_id', 'p.name', 'p.price', 'p.category_id', 'c.name AS category_name', 'p.status', 'p.description', 'p.slug', 'p.created_at', 'pa.attachment')
            ->where('p.status', 1)
            ->join('product_additionals AS pa', 'p.id', '=', 'pa.product_id')
            ->leftJoin('categories AS c', 'p.category_id', '=', 'c.id')
            ->get();
        if (isset($products) && count($products) > 0) {
            $response['status'] = Res::HTTP_OK;
            $response['response_time'] = microtime(true) - LARAVEL_START;
            $response['message'] = 'Product list';
            $response['results'] = $products;
            return response()->json($response, Res::HTTP_OK);
        }
        else {
            $response['status'] = Res::HTTP_OK;
            $response['response_time'] = microtime(true) - LARAVEL_START;
            $response['message'] = 'No Products';
            $response['results'] = [];
            return response()->json($response, Res::HTTP_OK);
        }
    }
}
