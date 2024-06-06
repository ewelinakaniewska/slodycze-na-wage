<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candy extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'type', 'ingredients', 'price', 'stock', 'rating', 'supplier_id', 'img'];

    public $timestamps = false;

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
    public function orders()
{
    return $this->belongsToMany(Order::class)->withPivot('quantity');
}
}
