<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Hike;
use App\Form\HikeType;

class AdminHikeController extends AbstractController {

    /**
     * @Route("/admin/hikes", name="admin_hike_index")
     * @return Response
    */
    public function index() :Response
    {
        #Get all hikes
        $repository = $this->getDoctrine()->getRepository(Hike::class);
        $hikes = $repository->findAll();

        return $this->render('admin/index.html.twig', [
            'hikes' => $hikes,
        ]);
    }

    /**
     * @Route("/admin/hikes/create", name="admin_hike_new")
     * @return Response
    */
    public function new(Request $request)
    {
        $hike = new Hike();

        $form = $this->createForm(HikeType::class, $hike);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $newHike = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($newHike);
            $em->flush();
            $this->addFlash('success', 'Rando crée avec succès :)');

            return $this->redirectToRoute('admin_hike_index');
        }

        return $this->render('admin/new.html.twig', [
            'hike' => $hike,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/hikes/{id}", name="admin_hike_edit", methods={"GET", "POST"})
     * @return Response
    */
    public function edit($id, Request $request)
    {
        #Get Hike by Id
        $repository = $this->getDoctrine()->getRepository(Hike::class);
        $hike = $repository->find($id);

        $form = $this->createForm(HikeType::class, $hike);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $updatedHike = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($updatedHike);
            $em->flush();
            $this->addFlash('success', 'Rando modifié avec succès :)');

            return $this->redirectToRoute('admin_hike_index');
        }

        return $this->render('admin/edit.html.twig', [
            'hike' => $hike,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/hikes/{id}", name="admin_hike_delete", methods={"DELETE"})
     * @return Response
    */
    public function delete($id, Request $request){
        $repository = $this->getDoctrine()->getRepository(Hike::class);
        $hike = $repository->find($id);

        if($this->isCsrfTokenValid('delete' . $hike->getId(), $request->get('_token'))){
            $em = $this->getDoctrine()->getManager();
            $em->remove($hike);
            $em->flush();
            $this->addFlash('success', 'Rando suprimé avec succès :)');
        }

        return $this->redirectToRoute('admin_hike_index');
    }

}