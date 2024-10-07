<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Affilate;
use App\AffilateHistory;
use App\UserWalletHistory;
use App\WalletSettings;

class AffiliateController extends Controller
{

    public function index(Request $request){

    $data  = new MainController;
    $secretData = $data->CheckSecretKey($request);
    if($secretData != ''){
      return $secretData;
    }

    $uid = Auth::user()->id;

    $affiliate = AffilateHistory::with(['fromRefered' => function ($q) {
        $q->select('id', 'name', 'email');
    }, 'user' => function ($q) {
        $q->select('id', 'name', 'email');
    }])->whereHas('fromRefered')->whereHas('user')->where('user_id', $uid)->get();

    return response()->json($affiliate, 200);

  }

   public function walletdata(Request $request){

    $data  = new MainController;
    $secretData = $data->CheckSecretKey($request);
    if($secretData != ''){
      return $secretData;
    }

   $authUserId = Auth::id();

    $wallet_transactions = UserWalletHistory::with('wallet')
        ->whereHas('wallet', function ($query) use ($authUserId) {
            $query->where('user_id', $authUserId);
        })
        ->orderBy('id', 'DESC')
        ->get();

    return response()->json($wallet_transactions, 200);

  }
}
