<?php

namespace App\Controller;

use App\Entity\Speler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SpelerController extends AbstractController
{
    /**
     * @Route("/speler", name="speler")
     */
    public function Speltable()
    {
        $repository =$this->getDoctrine()->getRepository(Speler::class);
        $spelers =$repository->findAll();
        return $this->render('speler/index.html.twig',['spelers'=> $spelers]);
    }

}
