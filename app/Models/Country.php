<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function poReceipt(): HasMany
    {
        return $this->hasMany(PoReceipt::class);
    }
    public function supplier(): HasMany
    {
        return $this->hasMany(Supplier::class);
    }
    public function warehouse(): HasMany
    {
        return $this->hasMany(Warehouse::class);
    }
}
