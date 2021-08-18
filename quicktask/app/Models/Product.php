<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'price',
        'quantity',
    ];

    public function type() 
    {
        return $this->belongsTo(Type::class);
    }
}
