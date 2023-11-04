<?php

namespace App\Listeners;

use App\Events\PaymentStatusChanged;
use App\Models\Loans;
use App\Models\Payment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateLoanStatus
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */

    public function handle(PaymentStatusChanged $event): void
    {
        if ($event->newStatus === 'accepted') {
            $payment = Payment::find($event->paymentId);
            $loan = Loans::find($payment->loan_id);
            $loan->update(['loan_status' => 1]);
        }
    }
}
