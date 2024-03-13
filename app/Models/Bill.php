<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id',
        'company_reference_id',
        'status',
        'amount_paid',
        'proof_of_payment',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }


    public function companyReference()
    {
        return $this->belongsTo(CompanyReference::class);
    }
}
