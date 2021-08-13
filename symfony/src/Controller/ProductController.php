<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{alias}", name="product")
     */
    public function showProduct(Product $product): Response
    {
        return $this->render('product/show-product.html.twig', [
            'product' => $product
        ]);
    }
}

//public function showCategory(Category $category, CategoryRepository $categoryRepository)
//{
//    return $this->render('category/show-category.html.twig', [
//        'category' => $category
//    ]);
//}