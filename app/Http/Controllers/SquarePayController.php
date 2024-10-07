<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SubscriptionController;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;
use Illuminate\Support\Str;
use Square\Environment;
use Square\SquareClient;

class SquarePayController extends Controller
{
    /* This function save the api keys to .env file */

    public function saveKeys(Request $request){

        $env = DotenvEditor::setKeys([
            'SQUARE_PAY_ENABLE'         => $request->SQUARE_PAY_ENABLE ? 1 : 0,
            'SQUARE_PAY_LOCATION_ID'    => $request->SQUARE_PAY_LOCATION_ID,
            'SQUARE_ACCESS_TOKEN'       => $request->SQUARE_ACCESS_TOKEN,
            'SQUARE_APPLICATION_ID'     => $request->SQUARE_APPLICATION_ID,
            'SQUARE_PAY_LIVE'           => $request->SQUARE_PAY_LIVE ? "live" : "sandbox"
        ]);

        $env->save();

        return back()->with('added', 'SquarePay Keys has been updated successfully !');

    }

    public function payment(Request $request){

        $client = new SquareClient([
            'accessToken' => env('SQUARE_ACCESS_TOKEN'),
             'environment' => Environment::SANDBOX,
            //'environment' => env('SQUARE_PAY_LIVE'),
        ]);
        

        $amount_money = new \Square\Models\Money;

        $amount_money->setAmount($request->amount);
        $amount_money->setCurrency($request->currency);
        
        $body = new \Square\Models\CreatePaymentRequest(
            $request->sourceId,
            Str::uuid(),
            $amount_money
        );

        $body->setAutocomplete(false);
        $body->setAcceptPartialAuthorization(true);
        
        $api_response = $client->getPaymentsApi()->createPayment($body);
        
        if ($api_response->isSuccess()) {
            return $result = $api_response->getResult();
        } else {
            return $errors = $api_response->getErrors();
        }

    }

    public function storepayment(Request $request)
    {

        $plan_id = $request->plan_id;
        $amount  = $request->amount;

        /** Capture the success transaction and place order */
        $checkout = new SubscriptionController;

        return $checkout->subscribe($payment_id = $request->txn_id,$payment_method = 'squarepay',$plan_id,$payment_status=1,$amount); 

    }

    /**
     * Open keys setting view
     */
    public function getSettings(){
        return view('squarepay::admin.tab');
    }
}
