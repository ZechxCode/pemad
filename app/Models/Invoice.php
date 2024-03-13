<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'purchase_details_id',
        'project_id',
        'client_id',
        'total_amount',
        'due_date',
        'status'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function purchaseDetail()
    {
        return $this->belongsTo(PurchaseDetail::class);
    }

    public function bill()
    {
        return $this->hasMany(Bill::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
