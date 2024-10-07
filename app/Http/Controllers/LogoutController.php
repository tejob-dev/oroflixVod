<?php

namespace App\Http\Controllers;

use App\Multiplescreen;
use App\PaypalSubscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LogoutController extends Controller
{
  
      public function logout()
{
    if (Auth::user()->is_admin == 1) {
        // If user is admin, log them out and flush session
        Auth::logout();
        Session::flush();
        return redirect('/')->with('success', 'Logged out!');
    } elseif ($activeSubscription = PaypalSubscription::where('user_id', Auth::user()->id)
        ->where('status', '=', 1)
        ->orderBy('created_at', 'desc')
        ->first()) {
        // If user has an active subscription
        $getScreens = Multiplescreen::where('user_id', Auth::user()->id)->first();

        if ($getScreens) {
            // Update the corresponding screen usage status
            foreach (range(1, 4) as $i) {
                $screenUsed = "screen_${i}_used";
                if ($getScreens->$screenUsed == 'YES') {
                    // If the screen is in use, mark it as not used
                    $getScreens->$screenUsed = 'NO';
                }
            }

            // Save the changes
            $getScreens->save();
        }

        Auth::logout();
        Session::flush();
        return redirect('/')->with('success', 'Logged out!');
    } else {
        // In case user is not subscribed or screen not found
        Auth::logout();
        Session::flush();
        return redirect('/')->with('success', 'Logged out!');
    }
}

}
