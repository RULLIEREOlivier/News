<?php

namespace MyFirstBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Travel
 *
 * @ORM\Table(name="travel")
 * @ORM\Entity(repositoryClass="MyFirstBundle\Repository\TravelRepository")
 */
class Travel
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
     * @ORM\Column(name="travelFrom", type="string", length=255)
     */
    private $travelFrom;

    /**
     * @var string
     *
     * @ORM\Column(name="travelTo", type="string", length=10000)
     */
    private $travelTo;

    /**
     * @var string
     *
     * @ORM\Column(name="participantNumber", type="string", length=10000)
     */
    private $participantNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateStart", type="datetime")
     */
    private $dateStart;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEnd", type="datetime")
     */
    private $dateEnd;

    public function __construct()
    {
        $this->dateStart = new \DateTime();
        $this->dateEnd = new \DateTime();
    }

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
     * Set travelFrom
     *
     * @param datetime $travelFrom
     *
     * @return Travel
     */
    public function setTravelFrom($travelFrom)
    {
        $this->travelFrom = $travelFrom;

        return $this;
    }

    /**
     * Get travelFrom
     *
     * @return datetime
     */
    public function getTravelFrom()
    {
        return $this->travelFrom;
    }

    /**
     * Set travelTo
     *
     * @param datetime $travelTo
     *
     * @return Travel
     */
    public function setTravelTo($travelTo)
    {
        $this->travelTo = $travelTo;

        return $this;
    }

    /**
     * Get travelTo
     *
     * @return datetime
     */
    public function getTravelTo()
    {
        return $this->travelTo;
    }

    /**
     * Set participantNumber
     *
     * @param integer $participantNumber
     *
     * @return Travel
     */
    public function setParticipantNumber($participantNumber)
    {
        $this->participantNumber = $participantNumber;

        return $this;
    }

    /**
     * Get participantNumber
     *
     * @return integer
     */
    public function getParticipantNumber()
    {
        return $this ->participantNumber;
    }

    /**
     * Set dateStart
     *
     * @param datetime $dateStart
     *
     * @return Travel
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return datetime
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateEnd
     *
     * @param datetime $dateEnd
     *
     * @return Travel
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return datetime
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

}
