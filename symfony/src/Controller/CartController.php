<?php

namespace App\Controller;

use App\Form\CartType;
use App\Service\CartManagerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     */
    public function showCart(CartManagerService $cartManager, Request $request): Response
    {
//        echo "CartController works \n";

        $cart = $cartManager->getCurrentCart();

        $form = $this->createForm(CartType::class, $cart);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cart->setUpdatedAt(new \DateTime());
            $cartManager->save($cart);

            return $this->redirectToRoute('cart');
        }

        return $this->render('cart/cart.html.twig', [
            'cart' => $cart,
            'form' => $form->createView()
        ]);
    }
}