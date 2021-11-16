<?php


namespace App\Service;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class CartManagerService
 * @package App\Service
 */
class CartManagerService
{
    /**
     * @var CartSessionStorageService
     */
    private $cartSessionStorage;

    /**
     * @var OrderFactoryService
     */
    private $cartFactory;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * CartManagerService constructor.
     *
     * @param CartSessionStorageService $cartStorage
     * @param OrderFactoryService $orderFactory
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        CartSessionStorageService $cartStorage,
        OrderFactoryService       $orderFactory,
        EntityManagerInterface    $entityManager
    )
    {
        $this->cartSessionStorage = $cartStorage;
        $this->cartFactory = $orderFactory;
        $this->entityManager = $entityManager;
    }

    /**
     * Gets the current cart.
     *
     * @return Order
     */
    public function getCurrentCart(): Order
    {
        $cart = $this->cartSessionStorage->getCart();

        if (!$cart) {
            $cart = $this->cartFactory->create();
        }

        return $cart;
    }

    /**
     * Persists the cart in database and session.
     *
     * @param Order $cart
     */
    public function save(Order $cart): void
    {
        // Persist in database
        $this->entityManager->persist($cart);
        $this->entityManager->flush();
        // Persist in session
        $this->cartSessionStorage->setCart($cart);
    }

}