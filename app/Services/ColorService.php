<?php

namespace App\Services;

use App\Http\Resources\ColorResource;
use App\Models\Color;

class ColorService {
    /**
     * Retorna uma coleção de cores
     * 
     * @param void
     * @return ColorResource::collection
     */
    public function index() {
        return ColorResource::collection(Color::get());
    }
}