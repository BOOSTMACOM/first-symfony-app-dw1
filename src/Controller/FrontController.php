<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findAll();

        return $this->render('front/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/a-propos", name="app_aboutpage")
     */
    public function about(): Response
    {
        return $this->render('front/about.html.twig', [
            'title' => 'À propos'
        ]);
    }
}
