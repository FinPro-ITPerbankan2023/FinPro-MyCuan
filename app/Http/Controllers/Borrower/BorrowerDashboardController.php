<?php

namespace App\Http\Controllers\Borrower;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Loans;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class BorrowerDashboardController extends Controller
{
    public function borrowerDashboard(Request $request)
    {
        try {
            $userId = $request->input('user_id');

            $loanData = Loans::select('amount', 'loan_status')
                ->where('borrower_id', $userId)
                ->first();

            $response = [
                'amount' => $loanData->amount,
                'loan_status' => $loanData->loan_status
            ];


            return response()->json($response);
        } catch (\Exception $e) {

            if (!$userId) {
                return response()->json(['error' => 'User ID not provided'], 400);
            }

        }
    }
}
