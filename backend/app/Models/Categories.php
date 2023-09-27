<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    /**
     * Override fillable property data.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'active'
    ];

    /**
     * Products
     *
     * Get All products uploaded by categories
     *
     * @return object Eloquent product object
     */
    public function products()
    {
        return $this->hasMany(Product::class)->orderBy('id', 'desc');
    }
}
