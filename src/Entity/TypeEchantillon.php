<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
/**
 * Class Type Echantillon
 * @ORM\Entity()
 * @ORM\Table(name="BDD")
 * @ApiResource()
 */
class TypeEchantillon
{
    /**
     * @ORM\Id()
     * @ORM\Column(name="type_echantillon_id", type="integer")
     */
    private $type_echantillon_id;

    /**
     * @ORM\Column(name="type, type="integer")
     */
    private $type;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->type_echantillon_id;
    }

    /**
     * @param mixed $type_echantillon_id
     */
    public function setId($type_echantillon_id): void
    {
        $this->id = $type_echantillon_id;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function setType($type)
    {
        return $this->$type;
    }
}