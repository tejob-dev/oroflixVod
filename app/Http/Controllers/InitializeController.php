<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;


class InitializeController extends Controller
{
   
    public function verify(Request $request)
    {

        $d = \Request::getHost();
        $domain = str_replace("www.", "", $d);

        $alldata = ['app_id' => "24626244", 'ip' => $request->ip(), 'domain' => $domain, 'code' => $request->code];

        $data = $this->make_request($alldata);

        if ($data['status'] == 1) {
            $put = 1;
            file_put_contents(public_path() . '/config.txt', $put);

            $status = 'complete';
            $status = Crypt::encrypt($status);
            @file_put_contents(public_path() . '/step3.txt', $status);

            $draft = 'gotostep1';
            $draft = Crypt::encrypt($draft);
            @file_put_contents(public_path() . '/draft.txt', $draft);

            return redirect()->route('db.setup');
        } elseif ($data['msg'] == 'Already Register') {
            return redirect()->route('verifylicense')->withErrors(['User is already registered']);
        } else {            
            return back()->withErrors([$data['msg']]);
        }
    }

    public function make_request($alldata)
    {
    	return array('status' => 1);

    }

}
