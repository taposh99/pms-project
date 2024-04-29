<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Supplier extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function supplierCategory(): BelongsTo
    {
        return $this->belongsTo(SupplierCategory::class);
    }
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
    

}
