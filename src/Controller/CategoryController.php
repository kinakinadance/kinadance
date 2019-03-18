<?php

namespace App\Controller;

use App\Entity\TblCategory;
use App\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Events;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Response;


/**
 *
 * @Route("/category")
 *
 * @author Sergej Böhm
 */
class CategoryController extends AbstractController
{


    /**
     *  * @Route("/", methods={"GET"}, name="category_show")
     */
    public function index()
    {
        $category = $this->getDoctrine()
            ->getRepository(TblCategory::class)
        ->findAll();

        /*$form = $this->createForm(CategoryType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $datensatz = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($datensatz);
            $em->flush();

            $event = new GenericEvent($datensatz);


            $eventDispatcher->dispatch(Events::COMMENT_CREATED, $event);
            $category = $this->getDoctrine()
                ->getRepository(TblCategory::class)
                ->findAll();
            $form = $this->createForm(CategoryType::class);
        }*/

        return $this->render('category/index.html.twig', [
            'category' => $category,
            //'form'=>$form->createView()
        ]);



    }

    /**
     * @Route("/new", methods={"POST","GET"}, name="category_new")
     */
    public function newCategory(Request $request, EventDispatcherInterface $eventDispatcher){

        $form = $this->createForm(CategoryType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $datensatz = $form->getData();
            //dump($datensatz);die;
            $em = $this->getDoctrine()->getManager();

            $em->persist($datensatz);
            $em->flush();
            $event = new GenericEvent($datensatz);
            $eventDispatcher->dispatch(Events::COMMENT_CREATED, $event);
            return $this->redirectToRoute('category_show');
        }

        return $this->render('category/new.html.twig', [
            'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("/{id}", methods={"GET"}, name="category_delete")
     */

    public function deleteCategory($id){

        $em = $this->getDoctrine()->getManager();
        $datasatz = $em->getRepository(TblCategory::class)->find($id);
        $em->remove($datasatz);
        $em->flush();
        return $this->redirectToRoute('category_show');
    }

    /**
     * @Route("/{id}/update", methods={"GET","POST"}, name="category_update")
     */

    public function updateCategory(Request $request,$id){
        $em = $this->getDoctrine()->getManager();
        $datasatz = $em->getRepository(TblCategory::class)->find($id);
        $form = $this->createForm(CategoryType::class,$datasatz);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $newData=$form->getData();
            //dump($newData);die;
            $datasatz->setCategory_name($newData->getCategory_name());
            $em->flush();
        }
        return $this->render('category/update.html.twig', [
            'form'=>$form->createView()
        ]);
    }
}
