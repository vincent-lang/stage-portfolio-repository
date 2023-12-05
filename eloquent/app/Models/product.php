<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'product_name',
        'artikel_nr'
    ];

    public function shop(): BelongsTo
    {
        return $this->belongsTo(shop::class);
    }
}
