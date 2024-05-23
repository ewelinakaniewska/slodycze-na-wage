<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candy extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'ingredients', 'price', 'img', 'stock', 'rating', 'supplier_id'];

    public $timestamps = false;

    public function suppliers(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
