<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MpesaC2B extends Model
{
    protected $fillable=[
        'trans_time',
        'trans_amount',
        'business_short_code',
        'bill_ref_number',
        'invoice_number',
        'org_account_balance',
        'third_party_trans_id',
        'msisdn',
        'first_name',
        'middle_time',
        'last_time',
        'trans_id',
        'transaction_type',
    ];
}
