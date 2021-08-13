<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
//     * @Route("/show-category/{id}", name="showCategory")
     * @Route("/show-category/{alias}", name="showCategory")
     */

    public function showCategory(Category $category, CategoryRepository $categoryRepository)
    {
//        $children = $category->getChild();
//        dd($children);
        return $this->render('category/show-category.html.twig', [
            'category' => $category

//            'subcategories' => $categoryRepository->findByParent($category)
//            'categories' => $categoryRepository->findAllRootCategories(),
        ]);
    }

//    /**
//     * @Route("/category", name="category")
//     */
//
//    public function index(CategoryRepository $categoryRepository): Response
//    {
//        return $this->render('category/show-product.html.twig', [
////            'categories' => $categoryRepository->findAllRootCategories(),
//        ]);
//    }

}

//    public function indexCategory(EntityManagerInterface $em_Category)
//    {
//        $categories = $em_Category->getRepository(Category::class)->findBy([], ['id'=>'ASC']);
//        dd($categories);
//    }

//    /**
//     * @Route("/", name="category_index", methods={"GET"})
//     */
//    public function index(CategoryRepository $categoryRepository): Response
//    {
//        return $this->render('category/show-product.html.twig', [
//            'categories' => $categoryRepository->findAll(),
//        ]);
//    }


//    /**
//     * @Route("/add-category", name="addCategory")
//     */
//    public function addCategory(EntityManagerInterface $en_man_Category)
//    {
//        $category = new Category();
//        $category->setName('Laser Printers');
//        $category->setParent(3);
//
//        $en_man_Category->persist($category);
//        $en_man_Category->flush();
//
//        return new Response('Category added');
//    }

//    /**
//     * @Route("/{id}", name="category_show", methods={"GET"})
//     */
//    public function show(Category $category): Response
//    {
//        return $this->render('category/show.html.twig', [
//            'category' => $category,
//        ]);
//    }




//
//    public function showCategory(Category $category)
//    {
//        dd($category);
//    }
// the same, but longer
//    public function showCategory($id, EntityManagerInterface $en_man_Category)
//    {
//        $repository = $en_man_Category->getRepository(Category::class);
//        $category = $repository->find($id);
//        if(!$category) {
//            throw $this->createNotFoundException(sprintf('Category not found'));
//        }
//
//        dd($category);
//    }


