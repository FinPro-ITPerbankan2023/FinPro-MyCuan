<?php

namespace App\Http\Controllers;

use App\Models\Loans;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class RepayLoanController extends Controller
{
    public function rePayment(Request $request){

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

            // Update repaid_amount in the loans table


            return redirect($response->redirect_url);
        } else {
            dd($response);
        }
    }
}
