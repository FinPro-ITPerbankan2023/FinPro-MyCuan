<?php

namespace App\Models;

use App\Events\PaymentStatusChanged;
use App\Http\Controllers\Loan\LoansController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\Dispatchable;


class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
      'order_id',
      'user_id',
      'loan_id',
      'amount',
      'payment_date',
      'status',
      'payment_link',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loans::class, 'business_id');
    }
    public function verifyPayment(): void
    {
        $this->status = 'accepted';
        $this->save();

        $loanId = $this->loan_id;

        $loanUserId = Loans::where('id', $loanId)->value('user_id');

        HistoryTransaction::create([
            'borrower' => $loanUserId,
            'loan_id' => $loanId,
            'transaction_date' => now(),
            'lender' => $this->user->name,
        ]);
    }

    public function verifyPaymentLoan(): void
    {
        $this->status = 'accepted';
        $this->save();

        $loanId = $this->loan_id;

        $loan = Loans::find($loanId);

        $loan->repaid_amount += $this->amount;

        $loan->save();
    }



    public function setStatusAttribute($value): void
    {
        if (!array_key_exists('status', $this->attributes) || $this->attributes['status'] !== $value) {
            event(new PaymentStatusChanged($this->id, $value));
        }

        $this->attributes['status'] = $value;
    }


}

