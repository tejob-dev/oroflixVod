<?php

namespace App\Http\Controllers;

use App\Multiplescreen;
use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class MultipleScreenController extends Controller
{
   

    public function newupdate(Request $request, $id)
    {

        $screenNo = $request->count;
        $screenrow = Multiplescreen::where('user_id', $id)->first();
        $screenUsedColumn = "screen_" . $screenNo . "_used";
        $screenNameColumn = "screen" . $screenNo;

    // Update the specified screen as used
    $query = Multiplescreen::where('user_id', $id)->update([$screenUsedColumn => 'YES', 'activescreen' => $request->screen]);

    // Loop through all screens to check if they are in use by the same user
    for ($i = 1; $i <= 4; $i++) {
        if ($i != $screenNo) {
            $otherScreenUsedColumn = "screen_" . $i . "_used";
            $otherScreenNameColumn = "screen" . $i;
    
            // Check if the other screen is used by the same user
            if ($screenrow->$otherScreenUsedColumn == 'YES') {
                // Update the other screen as not used, but only if necessary
                if ($screenrow->$otherScreenUsedColumn !== 'NO') {
                    Multiplescreen::where('user_id', $id)
                        ->where($otherScreenUsedColumn, 'YES')
                        ->update([$otherScreenUsedColumn => 'NO']);
                }
            }
        }
    }


        Session::forget('nickname');
        Session::put('nickname', $request->screen);
        if ($query) {
            return "$request->screen is now Active Profile !";
        } else {
            return "Something Went Wrong ! Please Try again !";
        }
    }

    public function manageprofile($id)
    {

        $result = Multiplescreen::where('user_id', $id)->first();

        if (!isset($result)) {
            Session::forget('nickname');

            $value = Auth::user()->paypal_subscriptions->last();

            if ($value != null) {
                if ($value['status'] == 1) {

                    $muser = new Multiplescreen;

                    $getpkgid = $value->package_id;

                    $pkg = Package::where('id', $value->package_id)->first();

                    if (isset($pkg)) {
                        $screen = $pkg->screens;
                        $muser->pkg_id = $pkg->id;
                        $muser->user_id = Auth::user()->id;

                        if ($screen == 1) {
                            $muser->screen1 = Auth::user()->name;

                        } elseif ($screen == 2) {
                            $muser->screen1 = Auth::user()->name;
                            $muser->screen2 = "Screen2";
                        } elseif ($screen == 3) {
                            $muser->screen1 = Auth::user()->name;
                            $muser->screen2 = "Screen2";
                            $muser->screen3 = "Screen3";
                        } elseif ($screen == 4) {
                            $muser->screen1 = Auth::user()->name;
                            $muser->screen2 = "Screen2";
                            $muser->screen3 = "Screen3";
                            $muser->screen4 = "Screen4";
                        }

                        $muser->save();

                    }
                }
            }

        }

        //Check if user changed the plan update screen accroding to it
        if (isset($result)) {
            $value = Auth::user()->paypal_subscriptions->last();
            if ($value != null) {
                if ($value['status'] == 1 && $value->package_id != $result->pkg_id) {
                    $result->delete();
                    $muser = new Multiplescreen;
                    $pkg = Package::find($value->package_id);

                    if (isset($pkg)) {

                        $screen = $pkg->screens;
                        $muser->pkg_id = $pkg->id;
                        $muser->user_id = Auth::user()->id;

                        if ($screen == 1) {
                            $muser->screen1 = Auth::user()->name;

                        } elseif ($screen == 2) {
                            $muser->screen1 = Auth::user()->name;
                            $muser->screen2 = "Screen2";
                        } elseif ($screen == 3) {
                            $muser->screen1 = Auth::user()->name;
                            $muser->screen2 = "Screen2";
                            $muser->screen3 = "Screen3";
                        } elseif ($screen == 4) {
                            $muser->screen1 = Auth::user()->name;
                            $muser->screen2 = "Screen2";
                            $muser->screen3 = "Screen3";
                            $muser->screen4 = "Screen4";
                        }

                        $muser->save();

                    }

                }
            }

        }

        $result = Multiplescreen::where('user_id', $id)->first();

        return view('manageprofile', compact('result'));

    }

    public function updateprofile(Request $request, $id)
    {

        $result = Multiplescreen::where('user_id', $id)->first();
        $macaddress = $_SERVER['REMOTE_ADDR'];

        if ($request->screen1 != null || $request->screen1 != '') {
            $result->screen1 = $request->screen1;

        }
         if ($request->screen2 != null || $request->screen2 != '') {
            $result->screen2 = $request->screen2;
        }

        if ($request->screen3 != null || $request->screen3 != '') {
            $result->screen3 = $request->screen3;
        }

        if ($request->screen4 != null || $request->screen4 != '') {
            $result->screen4 = $request->screen4;
        }

        if ($result->screen_1_used != '' && $result->screen_1_used == "YES") {
            Session::put('nickname', $request->screen1);
        } elseif ($result->screen_2_used != '' && $result->screen_2_used == "YES") {
            Session::put('nickname', $request->screen2);
        } elseif ($result->screen_3_used != '' && $result->screen_3_used == "YES") {
            Session::put('nickname', $request->screen3);
        } elseif ($result->screen_4_used != '' && $result->screen_4_used == "YES") {
            Session::put('nickname', $request->screen4);
        }

        $result->save();

        return back()->with('updated', __('Profile Updated Successfully !'));
    }

    public function updatename($id){
        $result = Multiplescreen::where('user_id', $id)->first();
        return view('manageprofileedit', compact('result'));
    }

    public function updatescreenname(Request $request) {
        $id = Auth::user()->id;
        $result = Multiplescreen::where('user_id', $id)->first();
    
        if ($result) {
            $result->screen1 = $request->screen1 ?? '';
            $result->screen2 = $request->screen2 ?? '';
            $result->screen3 = $request->screen3 ?? '';
            $result->screen4 = $request->screen4 ?? '';
    
            $result->save();
            return back()->with('updated', __('Profile Name Updated Successfully!'));
        } else {
            // Handle the case where the record was not found
            return back()->with('error', __('No screen profile found for this user.'));
        }
    }
    

}