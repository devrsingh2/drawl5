<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    //
    public function index()
    {

        $settings_info = Setting::where('name', 'info')
            ->get();
        $settings_smtp = Setting::where('name', 'smtp')
            ->get();

        $settings = (object) array(
            'info' => $settings_info,
            'smtp' => $settings_smtp
        );

        return view('tenant.admin.settings.create-edit', compact('settings'));
    }

    public function saveInfo(Request $request)
    {
        $validator = $this->validate(
            $request,
            [
                'name' => 'required',
                'address' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'zipcode' => 'required',
                'token_amount' => 'required',
            ],
            [
                'name.required' => "Please enter name.",
                'address.required' => "Please enter address.",
                'email.required' => "Please enter email address.",
                'email.email' => "Please enter a valid email address.",
                'zipcode.required' => "Please enter zipcode."
            ]
        );

        $name = $request->name;
        $address = $request->address;
        $email = $request->email;
        $phone = $request->phone;
        $zipcode = $request->zipcode;
        $vendor_notification = $request->vendor_notification;
        $token_amount = $request->token_amount;

        $nameSetting = Setting::find(1);
        $addressSetting = Setting::find(2);
        $emailSetting = Setting::find(3);
        $phoneSetting = Setting::find(4);
        $zipcodeSetting = Setting::find(5);
        $vendorNotificationSetting = Setting::find(6);
        $tokenAmountSetting = Setting::find(7);

        $nameSetting->value = $name;
        $addressSetting->value = $address;
        $emailSetting->value = $email;
        $phoneSetting->value = $phone;
        $zipcodeSetting->value = $zipcode;
        $vendorNotificationSetting->value = $vendor_notification;
        $tokenAmountSetting->value = $token_amount;

        $nameSetting->save();
        $addressSetting->save();
        $emailSetting->save();
        $phoneSetting->save();
        $zipcodeSetting->save();
        $vendorNotificationSetting->save();
        $tokenAmountSetting->save();

        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Site Information Settings Updated successfully.');
        return back();
    }

    public function saveSMTP(Request $request)
    {
        $validator = $this->validate(
            $request,
            [
                'driver' => 'required',
                'host' => 'required',
                'port' => 'required',
                'username' => 'required',
                'password' => 'required',
                'address' => 'required',
                'name' => 'required'
            ],
            [
                'driver.required' => "Please enter driver.",
                'host.required' => "Please enter host.",
                'port.required' => "Please enter port.",
                'username.required' => "Please enter username.",
                'password.required' => "Please enter password.",
                'address.required' => "Please enter address.",
                'name.required' => "Please enter name."
            ]
        );

        $driver = $request->driver;
        $host = $request->host;
        $port = $request->port;
        $username = $request->username;
        $password = $request->password;
        $address = $request->address;
        $name = $request->name;
        $encryption = $request->encryption;

        $driverSetting = Setting::find(6);
        $hostSetting = Setting::find(7);
        $portSetting = Setting::find(8);
        $usernameSetting = Setting::find(9);
        $passwordSetting = Setting::find(10);
        $encryptionSetting = Setting::find(11);
        $addressSetting = Setting::find(12);
        $nameSetting = Setting::find(13);

        $driverSetting->value = $driver;
        $hostSetting->value = $host;
        $portSetting->value = $port;
        $usernameSetting->value = $username;
        $passwordSetting->value = $password;
        $addressSetting->value = $address;
        $nameSetting->value = $name;
        $encryptionSetting->value = $encryption;

        $driverSetting->save();
        $hostSetting->save();
        $portSetting->save();
        $usernameSetting->save();
        $passwordSetting->save();
        $addressSetting->save();
        $nameSetting->save();
        $encryptionSetting->save();

        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'SMTP Settings Updated successfully.');
        return back();
    }

}
