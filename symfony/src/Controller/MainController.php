<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\User;
use App\Repository\CategoryRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController

{
    /**
     * @Route("/main", name="main")
     */
    public function index(): Response
    {
//        dump($this->getUser());
//        die;
        return $this->render('main/index.html.twig', [
//            'categories' => $categoryRepository->findAllRootCategories()
//            'userRole' => $userRepository->findOneBy()
//            'controller_name' => 'MainController',
        ]);
    }

//    public function index(UserRepository $userRepository, Category $category, CategoryRepository $categoryRepository)
//    {
//        return $this->render('main/index.html.twig', [
//            'categories' => $categoryRepository->findAllRootCategories(),
//            'category' => $category,
//            'subcategories' => $categoryRepository->findByParent($category)
//        ]);
//    }

//    public function index(CategoryRepository $categoryRepository): Response
//    {
//        return $this->render('category/show-product.html.twig', [
//            'categories' => $categoryRepository->findAll(),
//        ]);
//    }
}
