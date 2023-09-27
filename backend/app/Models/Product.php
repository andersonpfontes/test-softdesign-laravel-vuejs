<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Override fillable property data.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'code',
        'reference',
        'stock_balance',
        'user_id',
        'categories_id'
    ];

    /**
     * User
     *
     * Get User Uploaded By Product
     *
     * @return object
     */
    public function user(): object
    {
        return $this->belongsTo(User::class)->select('id', 'name', 'email');
    }

    /**
     * Categories
     *
     * Get Categories Uploaded By Product
     *
     * @return object
     */
    public function categories(): object
    {
        return $this->belongsTo(Categories::class)->select('id', 'description', 'active');
    }

    // Add New Attribute to get image address
    protected $appends = ['image_url'];

    /**
     * Get Added Image Attribute URL.
     *
     * @return string|null
     */
    public function getImageUrlAttribute(): string | null
    {
        if (is_null($this->image) || $this->image === "") {
            return null;
        }

        return url('') . "/images/products/" . $this->image;
    }
}
