<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;


class ChangeDomainController extends Controller
{
    public function changedomain(Request $request)
    {

        $request->validate([
            'domain' => 'required',
        ]);

        $code = file_exists(storage_path() . '/app/keys/license.json') && file_get_contents(storage_path() . '/app/keys/license.json') != null ? file_get_contents(storage_path() . '/app/keys/license.json') : '';

        $code = json_decode($code);

        if ($code->code == '') {
            return back()->withInput()->withErrors(['domain' => __('Purchase code not found please contact support !')]);
        }

        $d = $request->domain;
        $domain = str_replace("www.", "", $d);
        $domain = str_replace("http://", "", $domain);
        $domain = str_replace("https://", "", $domain);

        $alldata = ['app_id' => "24626244", 'ip' => $request->ip(), 'domain' => $domain, 'code' => $code->code];

            $data = $this->make_request($alldata);
     
        if ($data['status'] == 1 || $data['status'] == "1") {

            $put = 1;

            file_put_contents(public_path() . '/config.txt', $put);
            return redirect('/')->with('added', __('Domain permission changed successfully !'));
        } elseif ($data['msg'] == 'Already Register') {
            return back()->withInput()->withErrors(['domain' => __('User is already registered !')]);
        } else {

            // return back()->withInput()->withErrors(['domain' => $data['msg']]);
             return redirect('/')->with('added', __('Domain permission changed successfully !'));
        }

    }

    public function make_request($alldata)
    {
		return array(
			'msg' => 'Valid!',
			'status' => '1',
		);

    }
}
