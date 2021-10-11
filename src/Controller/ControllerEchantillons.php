<?php

namespace App\Controller;

use App\Entity\Echantillon;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ControllerEchantillons extends abstractController
{
    /**
     * @Route(path="/afficheEchantillon")
     * Affiche un echantillon
     */
    public function AfficheEchantillon(EntityManagerInterface $entityManager)
    {
        $echantillon = $entityManager->getRepository(Echantillon::class)->findAll();
        return $this->render('afficheEchantillons.json.twig',['data'=>$echantillon]);
    }
}