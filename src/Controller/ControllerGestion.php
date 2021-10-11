<?php

namespace App\Controller;

use App\Entity\Adresse;
use App\Entity\Echantillon;
use App\Entity\TypeEchantillon;
use App\Entity\Patient;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\All;


class ControllerGestion extends abstractController
{
    # PATIENT
    /**
     * @Route(path="/ajoutPatient", methods:['GET'])
     * Ajoute un patient
     */
    public function ajoutPatient(EntityManagerInterface $entityManager)
    {
        //$entityManager = $this->getDoctrine()->getManager();
/*        $patient = new Patient();
        $patient->setPrenom('Vincent');
        $patient->setNom('Boutin');
        $patient->setDateNaissance('13/10/1951');
        $patient->setId(7);
        $entityManager->persist($patient);
        $entityManager->flush();*/
        $patient = $entityManager->getRepository(Patient::class)->findAll();
        //return $this->render('ajoutPatient.html.twig', ['data' => $patient]);
        return $this->render('ajoutPatient.json.twig', ['liste'=>$patient]);
    }

    /**
     * @Route(path="/addPatient/", methods:['GET'])
     * Ajoute toutes les donnees d'un patient
     */
    /* public function addPat(Request $request)
     {
         if (!empty($request->query->get("nom"))) {
             //Instance d'un patient et son adresse
             $patient = new Patient();
             $adresse = new Adresse();

             //Recupère les infos du patient
             $patient->setId($request->query->get("IdP"));
             $patient->setNom($request->query->get("Nom"));
             $patient->setPrenom($request->query->get("Prenom"));
             $patient->setDateNaissance($request->query->get("Date de naissance"));

             $adresse->setId($request->query->get("IdA"));
             $adresse->setVoie($request->query->get("Voie"));
             $adresse->setCodePostal($request->query->get("CodePostal"));
             $adresse->setVille($request->query->get("Ville"));
             $patient->setAdresse($adresse);

             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($adresse);
             $entityManager->persist($patient);
             $entityManager->flush();

             $patient = $entityManager->getRepository(Patient::class)->findAll();
             $adresse = $entityManager->getRepository(Adresse::class)->findAll();
             return $this->render('addPatient.json.twig', ['liste' => $patient, $adresse]);
         }

         return $this->render('addPatient.json.twig');
     }*/

    /**
     * @Route(path="/suppPatient", methods:['DELETE'])
     * Sypprime un patient
     */
    public function suppPatient(EntityManagerInterface $entityManager)
    {
        //$entityManager = $this->getDoctrine()->getManager();
        $patient = $entityManager->getRepository(Patient::class)->find(2);
        $entityManager->remove($patient);
        $entityManager->flush();
        $patient = $entityManager->getRepository(Patient::class)->findAll();
        return $this->render('suppPatient.json.twig', ['liste' => $patient]);
    }

    /**
     * @Route (path="/modifPatient", methods:['PUT'])
     * Modifie un patient
     */
    public function modifPatient(EntityManagerInterface $entityManager)
    {
        //$entityManager = $this->getDoctrine()->getManager();
        $patient = $entityManager->getRepository(Patient::class)->find(5);
        $patient->setNom('Giorgos');
        $entityManager->flush();
        $patient = $entityManager->getRepository(Patient::class)->findAll();
        return $this->render('modifPatient.json.twig', ['liste' => $patient]);
    }

    #ADRESSE
    /**
     * @Route(path="/ajoutAdresse", methods:['GET'])
     * Ajoute une adresse
     */
    public function ajoutAdresse(EntityManagerInterface $entityManager)
    {
        //$entityManager = $this->getDoctrine()->getManager();
        $adr = new Adresse();
        $adr->setVoie('45 route des palmiers');
        $adr->setCodePostal('06100');
        $adr->setVille('Nice');
        $adr->setId(7);
        $entityManager->persist($adr);
        $entityManager->flush();
        $adresse = $entityManager->getRepository(Adresse::class)->findAll();
        return $this->render('ajoutAdresse.json.twig', ['liste' => $adresse]);
    }

    /**
     * @Route(path="/suppAdresse", methods:['DELETE'])
     * Supprime une adresse
     */
    public function suppAdresse(EntityManagerInterface $entityManager)
    {
        //$entityManager = $this->getDoctrine()->getManager();
        $patient = $entityManager->getRepository(Patient::class)->find(29);
        $liste = $entityManager->getRepository(Patient::class)->findBy(['adresse' => $patient->getAdresse()]);
        $nbr = $liste->count();
        if ($nbr == 1) {
            $entityManager->remove($patient);
            $entityManager->flush();
            $patient = $entityManager->getRepository(Patient::class)->findAll();
            return $this->render('suppAdresse.json.twig', ['liste' => $patient]);
        }
        return new Response ($liste);
    }

    /**
     * @Route(path="/suppAllPatient", methods:['DELETE'])
     * Supprime tous les patients
     */
    public function suppAll(EntityManagerInterface $entityManager)
    {
        //$entityManager = $this->getDoctrine()->getManager();
        $patient = $entityManager->getRepository(Patient::class)->findAll();
        $entityManager->remove($patient);
        $entityManager->flush();
        $patient = $entityManager->getRepository(Patient::class)->findAll();
        return $this->render('suppAllPatient.json.twig', ['liste' => $patient]);
    }

    #ECHANTILLON
    /**
     * @Route(path="/afficheEchantillon")
     * Affiche un echantillon
     */
    public function Echantillon(EntityManagerInterface $entityManager)
    {
        //$entityManager = $this->getDoctrine()->getManager();
        $patient = $entityManager->getRepository(Patient::class)->findAll();
        return $this->render('afficheEchantillon.json.twig', ['liste' => $patient]);
    }

    /**
     * @Route(path="/ajoutEchantillon", methods:['GET'])
     * Ajoute un echantillon
     */
    public function ajoutEchantillon(EntityManagerInterface $entityManager)
    {
        //$entityManager = $this->getDoctrine()->getManager();
        $ech = new Echantillon();
        $ech->setNombreEchantillon('23');
        $ech->setId(6);
        $entityManager->persist($ech);
        $entityManager->flush();
        $echantillon = $entityManager->getRepository(Echantillon::class)->findAll();
        return $this->render('ajoutEchantillon.json.twig', ['liste' => $echantillon]);
    }

    /**
     * @Route(path="/suppEchantillon", methods:['DELETE'])
     * Supprime un echantillon
     */
    public function suppEchantillon(EntityManagerInterface $entityManager)
    {
        //$entityManager = $this->getDoctrine()->getManager();
        $echantillon = $entityManager->getRepository(Echantillon::class)->find(29);
        $liste = $entityManager->getRepository(Echantillon::class)->findBy(['echantillon' => $echantillon->getId()]);
        $nbr = $liste->count();
        if ($nbr == 1) {
            $entityManager->remove($echantillon);
            $entityManager->flush();
            $echantillon = $entityManager->getRepository(Echantillon::class)->findAll();
            return $this->render('suppEchantillon.json.twig', ['liste' => $echantillon]);
        }
    }

    /**
     * @Route (path="/modifPatient, methods:['PUT']")
     * Modifie un patient
     */
    public function modifEchantillon(EntityManagerInterface $entityManager){
        //$entityManager = $this->getDoctrine()->getManager();
        $echantillon = $entityManager->getRepository(Echantillon::class)->find(5);
        $echantillon->setnombre_echantillon('24');
        $entityManager->flush();
        $patient = $entityManager->getRepository(Echantillon::class)->findAll();
        return $this->render('modifEchantillon.json.twig',['liste'=>$echantillon]);
    }

    #TYPE D'ECHANTILLON
    /**
     * @Route(path="/ajoutTypeEchantillon", methods:['GET'])
     * Ajoute un type d'echantillon
     */
    public function ajoutTypeEchantillon(EntityManagerInterface $entityManager)
    {
        //$entityManager = $this->getDoctrine()->getManager();
        $typ = new TypeEchantillon();
        $typ->setType('Sanguin');
        $typ->setId(51);
        $entityManager->persist($typ);
        $entityManager->flush();
        $type = $entityManager->getRepository(TypeEchantillon::class)->findAll();
        return $this->render('ajoutType.json.twig', ['liste' => $type]);
    }

    /**
     * @Route(path="/suppTypeEchantillon", methods:['DELETE'])
     * Supprime un type d'echantillon
     */
    public function suppTypeEchantillon(EntityManagerInterface $entityManager)
    {
        //$entityManager = $this->getDoctrine()->getManager();
        $type = $entityManager->getRepository(TypeEchantillon::class)->find(51);
        $entityManager->remove($type);
        $entityManager->flush();
        $type = $entityManager->getRepository(TypeEchantillon::class)->findAll();
        return $this->render('suppType.json.twig', ['liste' => $type]);
    }
}
