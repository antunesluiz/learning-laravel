<?php

namespace App\Repositories\Eloquents;

abstract class AbstractRepository {
    protected $model;

    public function __construct() {   
        $this->model = $this->resolveModel();
    }

    protected function resolveModel() {
        return app($this->model);
    }

    public function index() {
        return $this->model->all();
    }

    public function store(array $data) {
        return $this->model::create($data);
    }
}