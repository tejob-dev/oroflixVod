<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Validator;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class CustomLoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Handle OTP login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendOTP(Request $request)
{


    // Validate phone number
    $validator = Validator::make($request->all(), [
        'phone_number' => 'required|numeric', // Adjust validation rules as needed
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    // Generate OTP
    $otp = mt_rand(100000, 999999); // Generate a 6-digit OTP

    // Store OTP in database
    $user = User::where('mobile', $request->phone_number)->first();

     // Create PhoneNumberUtil instance
     $phoneUtil = PhoneNumberUtil::getInstance();
    
     $defaultRegion = 'IN';
     // Parse the phone number
     $phoneNumberProto = $phoneUtil->parse($request->phone_number, $defaultRegion);
     
     // Get the country code from the parsed phone number
     $countryCode = $phoneNumberProto->getCountryCode();
     
     // Format phone number with country code
     $formattedPhoneNumber = $phoneUtil->format($phoneNumberProto, PhoneNumberFormat::E164);
    
     //From Number Format
     $phoneNumberProtoFrom = $phoneUtil->parse(env('TWILIO_NUMBER'), $defaultRegion);
     
     // Get the country code from the parsed phone number
     $countryCodes = $phoneNumberProtoFrom->getCountryCode();

     // Format phone number with country code
     $formattedPhoneNumberFrom = $phoneUtil->format($phoneNumberProtoFrom, PhoneNumberFormat::E164);
     
             // Send OTP via SMS using Twilio
             $twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
             $twilio->messages->create(
                 "$formattedPhoneNumber",
                 ['from' => $formattedPhoneNumberFrom, 'body' => "Your OTP is: $otp"]
             );
    
    if (!empty($user)) {
        // Check if the mobile number is null
       
            // If the mobile number is found, update only the OTP
            $user->update([
                'otp' => $otp,
            ]);

            
            return response()->json(['message' => 'Success'], 200);
            
        }
    else{
        $email = $request->phone_number . '@gmail.com';

        $user = User::create([
            'mobile' => $request->phone_number,
            'password' => $request->phone_number,
            'email' => $email,
            'otp' => $otp,
        ]);
        return response()->json(['message' => 'Success'], 200);

    }
    
   

  
}

    public function verifyOTP(Request $request)
    {
      
        // Retrieve user by phone number and verify OTP
        $user = User::where('mobile', $request->phone_number)->first();
      
        if (!$user || trim($user->otp) !== trim($request->otp)) {
            return redirect('/')->with('deleted', 'Invalid OTP');
        }
        
        // Clear OTP after successful verification
        $user->otp = null;
        $user->save();

        Auth::login($user);

        return redirect('/')->with('success', 'OTP verified successfully');

    }
}

