<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'furniture_id',
        'quantity',
        'unit_price',
    ];

    // Relation avec la commande
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    // Relation avec le meuble (furniture)
    public function furniture(): BelongsTo
    {
        return $this->belongsTo(Furniture::class);
    }
}
