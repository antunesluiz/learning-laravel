<?php

namespace App\Services;

use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryService {
    /**
     * Retorna uma coleção de categorias
     * 
     * @param void
     * @return CategoryResource::collection
     */
    public function index() {
        return CategoryResource::collection(Category::get());
    }
}