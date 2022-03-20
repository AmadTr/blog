<?php

namespace App\Controller;


use App\Entity\Article;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository; //crt alt i
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ArticleRepository $artRepo): Response
    {
        $articles = $artRepo->findAll();
        // dd($articles); // dump and die

        return $this->render('blog/index.html.twig', [
            'articles'=> $articles
        ]);
    }


    /**
     * @Route("blog/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('blog/contact.html.twig');
    }



    /**
     * @Route("/article/{id}", name="art-detail")
     */
    public function artDetail(Article $article): Response{

        return $this->render('blog/artDetail.html.twig', [
            'article'=>$article
        ]);
    }
}
