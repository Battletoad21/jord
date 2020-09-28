 <?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminHikeController extends AbstractController {

    public function index() :Response
    {
        $repository = $this->getDoctrine()->getRepository(Hike::class);

        $hikes = $repository->findAll();

        return $this->render('hike/index.html.twig', [
            'hikes' => $hikes,
        ]);
    }

}