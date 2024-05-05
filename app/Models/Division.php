<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Division extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function district(): HasMany
    {
        return  $this->hasMany(District::class);
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
