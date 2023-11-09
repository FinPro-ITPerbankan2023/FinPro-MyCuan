<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function payment(Request $request){

        $params = array (
            'transaction_details' => array(
                'order_id' => Str::uuid(),
                'gross_amount' => $request->amount,
            ),
        );

        $auth = base64_encode(env('MIDTRANS_SERVER_KEY'));

        $response = Http::withHeaders([
            'Content-type' => 'application/json',
            'Authorization' => "Basic $auth",
        ])->post('https://app.sandbox.midtrans.com/snap/v1/transactions', $params);

        $response = json_decode($response->body());

        if (property_exists($response, 'redirect_url')) {
            $payment = new Payment();
            $payment->order_id = $params['transaction_details']['order_id'];
            $payment->user_id = request('userId');
            $payment->loan_id = request('loanId');
            $payment->status = 'pending';
            $payment->payment_date = now();
            $payment->amount = $request->amount;
            $payment->payment_link = $response->redirect_url;

            $payment->save();

            return redirect($response->redirect_url);
        } else {
            dd($response);
        }
    }


    public function webhook (Request $request){
        $auth = base64_encode(env('MIDTRANS_SERVER_KEY'));

        $response = Http::withHeaders([
            'Content-type' => 'application/json',
            'Authorization' => "Basic $auth",
        ])->get('https://api.sandbox.midtrans.com/$request->order_id/status');

        $response = json_decode($response->body());

        $payment = Payment::where('order_id', $response->order_id)->firstOrFail();

        if ($payment->status === 'settlement' || $payment->status === 'capture'){
            return response()->json('Pembayaran sudah di proses');
        }

        if($response->transaction_status === 'capture'){
            $payment->status = 'capture';
        } else if ($response->transaction_status === 'settlement'){
            $payment->status = 'settlement';
        } else if ($response->transaction_status === 'pending'){
            $payment->status = 'pending';
        } else if ($response->transaction_status === 'deny') {
            $payment->status = 'deny';
        } else if ($response->transaction_status === 'expire') {
            $payment->status = 'expire';
        } else if ($response->transaction_status === 'cancel') {
            $payment->status = 'cancel';
        }

        $payment->save();

        return response()->json('success');

    }

    //TODO, Still can't get proper post http action from webhook, FIX if have time or delete if not time!

}
