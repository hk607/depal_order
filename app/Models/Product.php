<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'price',
        'brand',
        'diet_type',
        'flavour',
        'net_content_volume',
        'special_feature',
        'liquid_volume',
        'package_quantity',
        'shelf_life_days',
        'item_form',
        'speciality',
        'description',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getFirstImageUrlAttribute()
    {
        if ($this->images->isNotEmpty()) {
            return asset('images/products/' . $this->images[0]->image);
        }
        return asset('images/products/default.jpg');
    }
}
