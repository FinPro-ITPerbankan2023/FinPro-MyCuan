<?php

namespace App\Http\Controllers\Loan;

use App\Http\Controllers\Controller;
use App\Models\Loans;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    public function applyForLoan(Request $request)
    {
        $request->validate([
            'borrower_id' => 'required|integer',
            'loan_status' => 'required|string',
            'amount' => 'required|integer',
            'loan_duration' => 'required|string',
        ]);

        // Create Business record
        $userDetail = Loans::create([
            'borrower_id' => $request->borrower_id,
            'loan_status' => $request->loan_status,
            'amount' => $request->amount,
            'loan_duration' => $request->loan_duration,
        ]);

        return response()->json(['users' => $userDetail], 201);
    }
}
