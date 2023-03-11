<?php

namespace App\Repositories\Eloquents;

use App\Models\Category;
use App\Repositories\Contracts\AbstractRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository extends AbstractRepository implements AbstractRepositoryInterface, CategoryRepositoryInterface {
    protected $model = Category::class;
}