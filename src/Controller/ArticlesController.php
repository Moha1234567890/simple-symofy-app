<?php

namespace App\Controller;

 use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class ArticlesController extends Controller{

	/**
	 *@Route("/")
	 *
	 *@method({"Get"})
	 */

	/*if you delete the second
	 * in the first line, it will give an error */

	public function index() {

		

		return $this->render('articles/articles.html.twig');
	}
}