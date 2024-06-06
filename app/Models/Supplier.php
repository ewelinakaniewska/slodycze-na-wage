<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Supplier extends Model
{   

    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'name',
        'contact_name',
        'phone_number',
        'email',
        'address',
        'notes',
    ];

    public function candies(): HasMany
    {
        return $this->hasMany(Candy::class);
    }
    public function orders(): HasManyThrough
    {
        return $this->hasManyThrough(Order::class, Candy::class, 'supplier_id', 'id', 'id', 'id');
    }
}
