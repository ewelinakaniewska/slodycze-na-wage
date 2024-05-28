<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candy extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'ingredients', 'price', 'stock', 'rating', 'supplier_id', 'img'];

    public $timestamps = false;

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
