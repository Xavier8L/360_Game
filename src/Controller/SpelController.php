<?php

namespace App\Controller;


use App\Entity\Spel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SpelController extends AbstractController
{
    /**
     * @Route("/spel", name="spel")
     */
    public function Speltable()
    {
        $repository =$this->getDoctrine()->getRepository(Spel::class);
        $spels =$repository->findAll();
        return $this->render('spel/index.html.twig',['spels'=> $spels]);
    }


}
