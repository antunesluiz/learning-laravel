<?php

namespace App\Repositories\Contracts;

interface AbstractRepositoryInterface {
    public function index();
    public function store(array $data);
}