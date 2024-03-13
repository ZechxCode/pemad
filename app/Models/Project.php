<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'service_offer_id',
        'name',
        'description',
        'status',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
        // return $this->hasOne(Invoice::class);
    }
    public function serviceRequest()
    {
        return $this->hasMany(ServiceRequest::class);
        // return $this->hasOne(Invoice::class);
    }
    public function serviceOffer()
    {
        // return $this->hasMany(ServiceOffer::class);
        return $this->belongsTo(ServiceOffer::class);
    }
}
