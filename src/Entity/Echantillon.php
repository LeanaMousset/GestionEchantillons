<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Patient
 * @ORM\Entity()
 * @ORM\Table(name="BDD")
 * @ApiResource()
 */
class Echantillon
{
    /**
     * @ORM\Id()
     * @ORM\Column(name="echantillon_id", type="integer")
     */
    private $echantillon_id;

    /**
     * @ORM\Column(name="nombre_echantillon", type="integer")
     */
    private $nombre_echantillon;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->echantillon_id;
    }

    /**
     * @param mixed $echantillon_id
     */
    public function setId($echantillon_id): void
    {
        $this->echantillon_id = $echantillon_id;
    }

    /**
     * @return mixed
     */
    public function getNombreEchantillon()
    {
        return $this->nombre_echantillon;
    }

    /**
     * @return mixed
     */
    public function setNombreEchantillon($nombre_echantillon)
    {
        return $this->nombre_echantillon;
    }
}