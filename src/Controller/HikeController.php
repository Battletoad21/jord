<?php

namespace App\Controller;

use App\Entity\Hike;
use App\Entity\HikeSearch;
use App\Form\HikeSearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class HikeController extends AbstractController
{
    /**
     * @Route("/hikes", name="hike_index")
     * @return Response
    */
    public function index(Request $request) :Response
    {
        $search = new HikeSearch();
        $form = $this->createForm(HikeSearchType::class, $search);
        $form->handleRequest($request);

        $repository = $this->getDoctrine()->getRepository(Hike::class);
        $hikes = $repository->findAll();

        if($form->isSubmitted() && $form->isValid()){
            $repository = $this->getDoctrine()->getRepository(Hike::class);
            $hikes = $repository->findSearchedHike($search);
        }

        return $this->render('hike/index.html.twig', [
            'hikes' => $hikes,
            'form'  => $form->createView()
        ]);
    }

    /**
     * @Route("/hikes/{id}", name="hike_show")
     * @return Response
    */
    public function show($id): Response
    {
        $repository = $this->getDoctrine()->getRepository(Hike::class);

        $hike = $repository->find($id);

        return $this->render('hike/show.html.twig', [
            'hike' => $hike,
        ]);
    }

}