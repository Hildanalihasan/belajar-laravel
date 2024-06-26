<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = ([
        'code',
        'name',
        'phone_number',
        'email',
        'address',
        'is_active'
    ]);
    public function Sale()
    {
        return $this->hasMany(Product::class);
    }
}