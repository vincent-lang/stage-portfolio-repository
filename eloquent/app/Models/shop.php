<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_name',
        'location'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(product::class);
    }
}
