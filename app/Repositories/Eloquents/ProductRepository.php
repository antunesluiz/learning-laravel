<?php

namespace App\Repositories\Eloquents;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository extends AbstractRepository implements ProductRepositoryInterface {
    protected $model = Product::class;
}