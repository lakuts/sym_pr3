<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\AddToCartType;
use App\Service\CartManagerService;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{alias}", name="product")
     */
    public function showProduct(Product $product, Request $request, CartManagerService $cartManager): Response
    {
        $form = $this->createForm(AddToCartType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $item = $form->getData();
            $item->setProduct($product);

            $cart = $cartManager->getCurrentCart();
            $cart
                ->addItem($item)
                ->setUpdatedAt(new \DateTime());

            $cartManager->save($cart);

            return $this->redirectToRoute('product', ['alias' => $product->getAlias()]);
        }

        return $this->render('product/show-product.html.twig', [
            'product' => $product,
            'form' => $form->createView()
        ]);
    }
}

//public function showCategory(Category $category, CategoryRepository $categoryRepository)
//{
//    return $this->render('category/show-category.html.twig', [
//        'category' => $category
//    ]);
//}