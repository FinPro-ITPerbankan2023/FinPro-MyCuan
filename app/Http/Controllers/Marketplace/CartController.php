<?php

// TODO - Test with the UI
// TODO - Test delete and update for cart

namespace App\Http\Controllers\Marketplace;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Loans;
use App\Models\User;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        try {
            $loanIds = $request->input('loan_ids');

            if (!is_array($loanIds)) {
                return response()->json(['error' => 'Invalid input format'], 400);
            }

            foreach ($loanIds as $loanId) {
                $loanDetails = Loans::select('borrower_id', 'amount')
                    ->where('id', $loanId)
                    ->first();

                if (!$loanDetails) {
                    return response()->json(['error' => "Loan with ID $loanId not found"], 404);
                }

                $businessDetails = Business::select('business_name', 'field_of_business', 'business_duration')
                    ->where('user_id', $loanDetails->borrower_id)
                    ->first();

                $userDetails = User::select('name')
                    ->where('id', $loanDetails->borrower_id)
                    ->first();

                // Add the loan to the cart
                \Cart::add([
                    'id' => $loanId,
                    'name' =>$userDetails->name,
                    'Business' => $businessDetails->business_name,
                    'price' => $loanDetails->amount,
                    'quantity' => 1,
                    'attributes' => [
                        'business name' => $businessDetails->business_name,
                        'field of business' => $businessDetails->field_of_business,
                        'business duration' => $businessDetails->business_duration,
                    ],
                ]);
            }

            // Retrieve the updated cart content
            $cartItems = \Cart::getContent();
            $total = \Cart::getTotal();

            return response()->json(['message' => 'Loans added to cart', 'cart_items' => $cartItems, 'total' => $total]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
