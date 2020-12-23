<?php

namespace App\Controller;

 use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;

  use App\Entity\Article;



class ArticlesController extends Controller{

	/**
	 *@Route("/", name="home")
	 *
	 *@method({"Get"})
	 */

	/*if you delete the second
	 * in the first line, it will give an error */

	public function index() {

		$articles = $this->getDoctrine()->getRepository(Article::class)->findAll();

		return $this->render('articles/articles.html.twig', array('articles' => $articles));
	}


	/**
	 *@Route("/article/{id}", name="show")
	 *
	 *@method({"Get"})
	 */

	public function show($id) {
		$article = $this->getDoctrine()->getRepository(Article::class)->find($id);


		return $this->render('articles/article.html.twig', array('article' => $article));
	}
}