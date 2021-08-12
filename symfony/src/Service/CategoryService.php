<?php

namespace App\Service;

use App\Repository\CategoryRepository;

class CategoryService
{
    private CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllRootCategories()
    {
        return $this->repository->findAllRootCategories();
    }
}