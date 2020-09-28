<?php

namespace App\Controller;

use App\Entity\Hike;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HikeController extends AbstractController
{
    /**
     * @Route("/hikes", name="hike_index")
     * @return Response
    */
    public function index() :Response
    {
        $repository = $this->getDoctrine()->getRepository(Hike::class);

        $hikes = $repository->findAll();

        return $this->render('hike/index.html.twig', [
            'hikes' => $hikes,
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