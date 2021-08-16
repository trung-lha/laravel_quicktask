<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price'
    ];

    public function type() 
    {
        return $this->belongsTo(Type::class);
    }
}