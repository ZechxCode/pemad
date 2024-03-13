<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOffer extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_request_id',
        'client_id',
        'client_request',
        'offer',
        'estimated_price',
        'down_payment',
        'status',
    ];

    public function serviceRequest()
    {
        return $this->belongsTo(ServiceRequest::class);
    }

    public function project()
    {
        return $this->hasOne(Project::class);
    }


    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
