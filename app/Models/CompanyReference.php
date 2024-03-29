<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyReference extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'bank_account',
        'email',
        'address',
    ];
}
