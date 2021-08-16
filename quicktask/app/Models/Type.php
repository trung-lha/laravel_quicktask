<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
    protected $fillable = [
        'name',
        'description',
    ];

    public function products() 
    {
        return $this->hasMany(Product::class);
    }
}
