<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Patient
 * @ORM\Entity()
 * @ORM\Table(name="BDD")
 */
class Patient
{
    /**
     * @ORM\Id()
     * @ORM\Column(name="patient_id", type="integer")
     */
    private $patient_id;

    /**
     * @ORM\Column(name="prenom", type="string")
     */
    private $prenom;

    /**
     * @ORM\Column(name="nom", type="string");
     */
    private $nom;

    /**
     * @ORM\Column(name="date_naissance", type="string")
     */
    private $date_naissance;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->date_naissance;
    }

    /**
     * @param mixed $date_naissance
     */
    public function setDateNaissance($date_naissance): void
    {
        $this->date_naissance = $date_naissance;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Adress", fetch="EAGER")
     * @ORM\JoinColumn(name="adresse_id", referencedColumnName="adresse_id")
     */
    private $adresse;

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse): void
    {
        $this->adresse = $adresse;
    }

    public function __toString()
    {
        return $this->prenom;
    }
}