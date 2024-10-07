<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;
use App\Config;
use App\PaypalSubscription;
use Illuminate\Support\Carbon;
use Mail;
use Illuminate\Support\Str;
use App\Mail\verifyEmail;
use App\Mail\WelcomeUser;

class RegisterController extends Controller
{
    use IssueTokenTrait;

  private $client;

  public function __construct(){
    $this->client = Client::find(2);
  }

    public function register(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6'
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'is_blocked' => '0',
        'status' => '1',
        'verifyToken' => Str::random(5),
    ]);

    $config = Config::first();
    if ($config->free_sub == 1) {
        $this->freesubscribe($user);
    }

    if ($config->verify_email == 1) {
        $user->status = 0;
        $user->save();

        try {
            Mail::to($user->email)->send(new verifyEmail($user));
            return response()->json('Verification email sent !', 301);
        } catch (\Exception $e) {
            return response()->json('Mail Sending Error', 400);
        }
    }

    if ($config->wel_eml == 1) {
        try {
            Mail::to($request->email)->send(new WelcomeUser($user));
            // Generate token and return response
            $token = $user->createToken('Personal Access Token')->accessToken;
            return response()->json(['token' => $token], 200);
        } catch (\Exception $e) {
            // If email sending fails, still issue token and return success response
            $token = $user->createToken('Personal Access Token')->accessToken;
            return response()->json(['token' => $token], 200);
        }
    }

    // If neither email verification nor welcome email is enabled, issue token and return success response
    $token = $user->createToken('Personal Access Token')->accessToken;
    return response()->json(['token' => $token], 200);
}
    public function freesubscribe($thisuser){
  
        $config=Config::first();
        $start=Carbon::now();
        $end=$start->addDays($config->free_days);
        $payment_id=mt_rand(10000000000000, 99999999999999);
        $created_subscription = PaypalSubscription::create([
            'user_id' => $thisuser->id,
            'payment_id' => $payment_id,
            'user_name' => $thisuser->name,
            'package_id' => 100,
            'price' => 0,
            'status' => 1,
            'method' => 'free',
            'subscription_from' => Carbon::now(),
            'subscription_to' => $end
        ]);
    
    }

   public function verifyemail(Request $request)
{
    $user = User::where(['email' => $request->email, 'verifyToken' => $request->token])->first();

    if ($user) {
        $user->status = 1; 
        $user->verifyToken = null;
        $user->save();

        Mail::to($user->email)->send(new WelcomeUser($user));

        // Generate token using createToken method
        $token = $user->createToken('Personal Access Token')->accessToken;
        return response()->json(['token' => $token], 200);
    } else {
        return response()->json('User not found', 401);
    }
}

}
