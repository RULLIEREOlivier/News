<?php

namespace MyFirstBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vehicule
 *
 * @ORM\Table(name="vehicule")
 * @ORM\Entity(repositoryClass="MyFirstBundle\Repository\VehiculeRepository")
 */
class Vehicule
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="typeVehicule", type="string", length=255)
     */
    private $typeVehicule;

    /**
     * @var int
     *
     * @ORM\Column(name="avaliable", type="boolean")
     */
    private $avaliable;

    /**
     * @var int
     *
     * @ORM\Column(name="placeNumber", type="integer")
     */
    private $placeNumber;

//Les getters/setters
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set typeVehicule
     *
     * @param string $typeVehicule
     *
     * @return Vehicule
     */
    public function setTypeVehicule($typeVehicule)
    {
        $this->typeVehicule = $typeVehicule;

        return $this;
    }
    /**
     * Get typeVehicule
     *
     * @return string
     */
    public function getTypeVehicule()
    {
        return $this->typeVehicule;
    }

    /**
     * Set avaliable
     *
     * @param boolean $avaliable
     *
     * @return Vehicule
     */
    public function setAvaliable($avaliable)
    {
        $this->avaliable = $avaliable;

        return $this;
    }
    /**
     * Get avaliable
     *
     * @return boolean
     */
    public function getAvaliable()
    {
        return $this->avaliable;
    }

    /**
     * Set placeNumber
     *
     * @param int $placeNumber
     *
     * @return Vehicule
     */
    public function setPlaceNumber($placeNumber)
    {
        $this->placeNumber = $placeNumber;

        return $this;
    }

    /**
     * Get placeNumber
     *
     * @return int
     */
    public function getPlaceNumber()
    {
        return $this->placeNumber;
    }

}
