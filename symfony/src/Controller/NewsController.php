<?php

namespace App\Controller;

use App\Form\TestFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @Route("/news", name="news")
     */
    public function index(Request $request): Response
    {
        $form = $this->createForm(TestFormType::class);
        dump($request->request->all());

        return $this->render('news/show-product.html.twig', [
            'form' => $form->createView()
        ]);
    }


}
