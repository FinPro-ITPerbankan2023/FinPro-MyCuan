<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function create(Request $request){

        $params = array (
            'transaction_details' => array(
                'order_id' => Str::uuid(),
                'gross_amount' => $request->price,
            ),
            'item_details' => array (
                array(
                    'price' => $request->price,
                    'quantity' => 1,
                    'name' => $request->item_name,
                )
            ),
            'customer_details' => array(
                'first_name' => $request->customer_first_name,
                'email' => $request->customer_email,
            ),
        );

        $auth = base64_encode(env('MIDTRANS_SERVER_KEY'));

        $response = Http::withHeaders([
            'Content-type' => 'application/json',
            'Authorization' => "Basic $auth",
        ])->post('https://app.sandbox.midtrans.com/snap/v1/transactions', $params);

        $response = json_decode($response->body());


        if (property_exists($response, 'redirect_url')) {
            $payment = new Payment;
            $payment->order_id = $params['transaction_details']['order_id'];
            $payment->status = 'pending';
            $payment->price = $request->price;
            $payment->customer_first_name = $request->customer_first_name;
            $payment->customer_email = $request->customer_email;
            $payment->item_name  = $request->item_name;
            $payment->checkout_link = $response->redirect_url;
            $payment->save();

            return response()->json($response);
        } else {
            // Handle the case where redirect_url is not present in the response
            dd($response);

//            return response()->json(['error' => 'Redirect URL not found in the response'], 500);
        }
    }
}
