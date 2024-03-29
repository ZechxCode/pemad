<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'contact_info',
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class);
    }
    public function serviceOffer()
    {
        return $this->hasMany(ServiceOffer::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
}
