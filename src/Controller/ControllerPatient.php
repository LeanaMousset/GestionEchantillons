<?php

namespace App\Controller;

use App\Entity\Patient;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ControllerPatient extends abstractController
{
    /**
     * @return Response
     * @Route(path="/AffichePatient")
     */
    public function AffichePatient(EntityManagerInterface $entityManager)
    {
        $patient = $entityManager->getRepository(Patient::class)->findAll();
        return $this->render('affichePatient.json.twig',['data'=>$patient]);
    }
}