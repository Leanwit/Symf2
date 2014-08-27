<?php

namespace Witzke\FacturaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Localidad
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Witzke\FacturaBundle\Entity\Repository\LocalidadRepository")
 * @UniqueEntity("descripcion" , message="Ya existe la Localidad")
 */
class Localidad {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="codigoPostal", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $codigoPostal;

    /**
    * @var \Provincia
    *
    * @ORM\ManyToOne(targetEntity="Provincia", inversedBy="provincia", cascade={"remove"})
    * @ORM\JoinColumn(name="provincia", referencedColumnName="id")
    */
private $provincia;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Localidad
     */
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion() {
        return $this->descripcion;
    }

    /**
     * Set codigoPostal
     *
     * @param string $codigoPostal
     * @return Localidad
     */
    public function setCodigoPostal($codigoPostal) {
        $this->codigoPostal = $codigoPostal;

        return $this;
    }

    /**
     * Get codigoPostal
     *
     * @return string 
     */
    public function getCodigoPostal() {
        return $this->codigoPostal;
    }

    /**
     * Set provincia
     *
     * @param \Witzke\FacturaBundle\Entity\Provincia $provincia
     * @return Localidad
     */
    public function setProvincia(\Witzke\FacturaBundle\Entity\Provincia $provincia = null) {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get provincia
     *
     * @return \Witzke\FacturaBundle\Entity\Provincia 
     */
    public function getProvincia() {
        return $this->provincia;
    }

    public function __toString() {
        return (string) $this->descripcion;
    }

}
