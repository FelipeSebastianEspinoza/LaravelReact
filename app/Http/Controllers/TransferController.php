<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transfer;
use App\Wallet;
use Illuminate\Foundation\Console\Presets\React;

class TransferController extends Controller
{
    public function store(Request $request){
        $wallet = Wallet::find($request->wallet_id);
        $wallet->money = $wallet->money + $request->amount;
        $wallet->update();

        $transfer = new Transfer();
        $transfer->description = $request->description;
        $transfer->amount = $request->amount;
        $transfer->wallet_id = $request->wallet_id;
        $transfer->save();

        return response()->json([
            'id' => '1', 
            'description' => 'sdfaf', 
            'amount' => 200, 
            'wallet_id'=>1
        ], 201);

    }

}
