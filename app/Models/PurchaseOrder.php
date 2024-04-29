<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class PurchaseOrder extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function Supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
