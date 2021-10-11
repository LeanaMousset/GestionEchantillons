<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

    /**
     * Class Adresse
     * @ORM\Entity()
     * @ORM\Table(name="BDD")
     * @ApiResource()
     */

class Adresse
{
    /**
     * @ORM\Id()
     * @ORM\Column(name="adresse_id", type="integer")
     */
    private $adresse_id;

    /**
     * @ORM\Column(name="voie", type="string")
     */
    private $voie;

    /**
     * @ORM\Column(name="code_postal", type="integer")
     */
    private $code_postal;

    /**
     * @ORM\Column(name="ville", type="string")
     */
    private $ville;

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
    public function getVoie()
    {
        return $this->getVoie();
    }

    /**
     * @param mixed $voie
     */
    public function setVoie($voie): void
    {
        $this->voie = $voie;
    }

    /**
     * @return mixed
     */
    public function getCodePostal()
    {
        return $this->code_postal;
    }

    /**
     * @param mixed $code_postal
     */
    public function setCodePostal($code_postal): void
    {
        $this->code_postale = $code_postal;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville): void
    {
        $this->ville = $ville;
    }
}