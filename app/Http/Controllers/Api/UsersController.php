<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /*
     * function to manage dashboard
     */

    public function dashboard(Request $request) {
        if (isset($request) && $request->user_id) {
            $item = User::findOrFail($request->user_id);
            $countries = Country::where('active', 1)->get();
            $areas = Area::where('country_id', $item->country_id)->get();
            $edit = 1;
            if (isset($item->country_id)) {
                $county = Country::findOrFail($item->country_id);
                $item['country_name'] = isset($county) ? $county->trans->name : "";
            } else {
                $item['country_name'] = "";
            }
            if (isset($item->area_id)) {
                $area = Area::find($item->area_id);
                $item['area_name'] = isset($area) ? $area->trans->name : "";
            } else {
                $item['area_name'] = "";
            }
            return response([
                'status' => Res::HTTP_OK,
                'response_time' => microtime(true) - LARAVEL_START,
                'userData' => $item,
                'countries' => $countries,
                'areas' => $areas,
                'msg' => Res::HTTP_OK,
            ], Res::HTTP_OK);
            return view('website.profile.dashboard', compact('item', 'countries', 'areas'));
        } else {
            return response([
                'status' => Res::HTTP_BAD_REQUEST,
                'response_time' => microtime(true) - LARAVEL_START,
                'error' => trans('project.something_went_wrong'),
                'request' => $request->all()
            ], Res::HTTP_OK);
        }
    }

    /**
     * User profile
     *
     * @var view
     */
    public function profile(Request $request) {
        if (isset($request) && $request->user_id) {
            $item = User::findOrFail($request->user_id);
            $countries = Country::where('active', 1)->get();
            $areas = Area::where('country_id', $item->country_id)->get();
            $edit = 1;
            if (isset($item->country_id)) {
                $county = Country::findOrFail($item->country_id);
                $item['country_name'] = isset($county) ? $county->trans->name : "";
            } else {
                $item['country_name'] = "";
            }
            if (isset($item->area_id)) {
                $area = Area::find($item->area_id);
                $item['area_name'] = isset($area) ? $area->trans->name : "";
            } else {
                $item['area_name'] = "";
            }
            return response([
                'status' => Res::HTTP_OK,
                'response_time' => microtime(true) - LARAVEL_START,
                'userData' => $item,
                'countries' => $countries,
                'areas' => $areas,
                'msg' => Res::HTTP_OK,
            ], Res::HTTP_OK);
            return view('website.profile.dashboard', compact('item', 'countries', 'areas'));
        } else {
            return response([
                'status' => Res::HTTP_BAD_REQUEST,
                'response_time' => microtime(true) - LARAVEL_START,
                'error' => trans('project.something_went_wrong'),
                'request' => $request->all()
            ], Res::HTTP_OK);
        }
    }

    //update profile
    public function updateProfile(Request $request) {
        if (isset($request->user_id) && $request->user_id != '') {
            $user = User::findOrFail($request->user_id);
            if (isset($user) && $user->name != "") {
                $user_id = Auth::user()->id;
                if ($request->main_image_id) {
                    $options['media']['main_image_id'] = $request->main_image_id;
                    $user->options = $options;
                }
                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->iso2 = $request->iso2;
                $user->country_id = $request->country;
                $user->area_id = $request->area;
                $user->save();
                return response([
                    'status' => Res::HTTP_OK,
                    'response_time' => microtime(true) - LARAVEL_START,
                    'userData' => $user,
                    'msg' => trans('Core::operations.updated_successfully'),
                ], Res::HTTP_OK);
            } else {
                return response([
                    'status' => Res::HTTP_BAD_REQUEST,
                    'response_time' => microtime(true) - LARAVEL_START,
                    'error' => trans('project.record_not_found'),
                    'request' => $request->all()
                ], Res::HTTP_OK);
            }
        }
        return response([
            'status' => Res::HTTP_BAD_REQUEST,
            'response_time' => microtime(true) - LARAVEL_START,
            'error' => trans('project.something_went_wrong'),
            'request' => $request->all()
        ], Res::HTTP_OK);
    }

    //change password
    public function updatePassword(Request $request) {
        if (isset($request->user_id) && $request->user_id != '') {
            $user = User::findOrFail($request->user_id);
            if (isset($user) && $user->name != "") {
                $user_id = $request->user_id;
                if ($request->main_image_id) {
                    $options['media']['main_image_id'] = $request->main_image_id;
                    $user->options = $options;
                }
                if ($request->password) {
                    $user->password = bcrypt($request->password);
                }
                $user->save();
                return response([
                    'status' => Res::HTTP_OK,
                    'response_time' => microtime(true) - LARAVEL_START,
                    'userData' => $user,
                    'msg' => trans('Core::operations.updated_successfully'),
                ], Res::HTTP_OK);
            } else {
                return response([
                    'status' => Res::HTTP_BAD_REQUEST,
                    'response_time' => microtime(true) - LARAVEL_START,
                    'error' => trans('project.record_not_found'),
                    'request' => $request->all()
                ], Res::HTTP_OK);
            }
        }
        return response([
            'status' => Res::HTTP_BAD_REQUEST,
            'response_time' => microtime(true) - LARAVEL_START,
            'error' => trans('project.something_went_wrong'),
            'request' => $request->all()
        ], Res::HTTP_OK);
    }

}
