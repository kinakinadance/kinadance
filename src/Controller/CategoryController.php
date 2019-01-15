<?php

namespace App\Controller;

use App\Entity\TblCategory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{


    /**
     * @Route("/category", name="category")
     */
    public function index()
    {
        $category = $this->getDoctrine()
            ->getRepository(TblCategory::class)
        ->findAll();

        if (!$category) {
            throw $this->createNotFoundException(
                'Tabelle Category ist leer.'
            );
        }
        return $this->render('category/index.html.twig', [
            'category' => $category
        ]);
        //return new Response('Check out this great product: '.$product->getName());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }



}
