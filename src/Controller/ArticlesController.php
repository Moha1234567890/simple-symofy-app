<?php

namespace App\Controller;

 use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;

  use App\Entity\Article;

  use Symfony\Component\Form\Extension\Core\Type\TextType;

  use Symfony\Component\Form\Extension\Core\Type\TextareaType;

  use Symfony\Component\Form\Extension\Core\Type\SubmitType;



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
	 *@Route("/article/new", name="create.new")
	 *
	 *@method({"Get","Post"})
	 */


	public function new(Request $request) {

		$article = new Article();

		$form = $this->createFormBuilder($article)
		 ->add('title', TextType::class, array('attr' => array('class' => 'form-control')))
		 ->add('body', TextareaType::class, array('required' => false,
		 	'attr' => array('class' => 'form-control')
		))

		 ->add('submit', SubmitType::class, array('label' => 'create',

		 	'attr' => array('class', 'btn btn-primary
		 	    mt-3'))

		)
		 ->getForm();

		 $form->handleRequest($request);

		 if($form->isSubmitted() && $form->isValid()) {

		 	$article = $form->getData();

		 	$entityManager = $this->getDoctrine()->getManager();

		 	$entityManager->persist($article);
		 	$entityManager->flush();

		 	return $this->redirectToRoute('home');



		 }

		 return $this->render('articles/new.html.twig', array('form' => $form->createView()));



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