<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'category_id',
        'unit',
        'price',
        'stock',
        'desc',
        'product_code',
        'image'
    ];
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
