<?php

namespace App\Models;

use App\Traits\Searchable;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasRelationships, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'category_id',
        'color_id'
    ];

    /**
     * The attributes that are searchable.
     *
     * @var array<int, string>
     */
    protected $searchable = [
        'name',
        'price',
        'category.name',
        'color.name'
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ProductFactory::new();
    }

    /**
     * Get the category associated with the product.
     */
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    /**
     * Get the color associated with the product.
     */
    public function color()
    {
        return $this->hasOne(Color::class, 'id', 'color_id');
    }
}
