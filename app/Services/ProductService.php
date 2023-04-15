<?php

namespace App\Services;

use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductService {
    /**
     * Retorna uma coleção de produtos paginados e filtrados
     * 
     * @param String $search
     * @return ProductResource::collection
     */
    public function index($search) {
        return ProductResource::collection(Product::search($search)->paginate(6));
    }

    /**
     * Salva no banco de dados um novo produto
     * 
     * @param array $validatedData
     * @return void
     */
    public function store(Array $validatedData) {
        Product::create($validatedData);

        return;
    }
}