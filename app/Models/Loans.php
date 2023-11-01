<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Loans extends Model
{
    use HasFactory;

    protected $table = 'loans';

    protected $fillable = [
        'user_id',
        'loan_status',
        'amount',
        'loan_duration',
        'application_date',
        'approval_date',
        'denied_date',
        'loan_purpose'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($loan) {

            if ($loan->isDirty('is_verified') && $loan->is_verified === true) {
                $loan->verification_date = now();
            }

//            if ($loan->isDirty('loan_status') && $loan->loan_status === 'Approved') {
//                $loan->approval_date = DB::raw('CURRENT_TIMESTAMP');
//            }
//
//            if ($loan->isDirty('loan_status') && $loan->loan_status === 'Rejected') {
//                $loan->denied_date = DB::raw('CURRENT_TIMESTAMP');
//            }
//
//            if ($loan->isDirty('loan_status') && $loan->getOriginal('loan_status') === 'Approved' && $loan->loan_status === 'Rejected') {
//                $loan->denied_date = $loan->approval_date;
//                $loan->approval_date = null;
//            }
//
//            if ($loan->isDirty('loan_status') && $loan->getOriginal('loan_status') === 'Rejected' && $loan->loan_status === 'Approved') {
//                $loan->approval_date = $loan->denied_date;
//                $loan->denied_date = null;
//            }
//            if ($loan->isDirty('loan_status') && $loan->loan_status === 'Pending') {
//                $loan->approval_date = null;
//                $loan->denied_date = null;
//            }
        });
    }
}
