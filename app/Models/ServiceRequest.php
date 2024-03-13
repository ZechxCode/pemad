<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'project_ref',
        'description',
        'status',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function serviceOffers()
    {
        return $this->hasMany(ServiceOffer::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class, "project_ref");
    }
}
