<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class district extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function supplier(): HasMany
    {
        return $this->hasMany(Supplier::class);
    }
    public function poReceipt(): HasMany
    {
        return $this->hasMany(PoReceipt::class);
    }
}
