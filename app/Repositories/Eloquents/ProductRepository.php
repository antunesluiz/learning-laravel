<?php

namespace App\Repositories\Eloquents;

use App\Models\Product;
use App\Repositories\Contracts\AbstractRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository extends AbstractRepository implements AbstractRepositoryInterface, ProductRepositoryInterface {
    protected $model = Product::class;
}