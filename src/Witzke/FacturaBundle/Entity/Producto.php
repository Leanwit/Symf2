<?php

namespace Witzke\FacturaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Producto
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Witzke\FacturaBundle\Entity\Repository\ProductoRepository")
 * @UniqueEntity("descripcion" , message="Ya existe este producto")
 */
class Producto
{
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
     * @var float
     *
     * @ORM\Column(name="precio", type="float")
     * @Assert\NotBlank()
     */
    private $precio;

    /**
     * @var float
     *
     * @ORM\Column(name="precioCosto", type="float")
     * @Assert\NotBlank()
     */
    private $precioCosto;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean")
     * 
     */
    private $activo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaAlta", type="date")
     * @Assert\NotBlank()
     */
    private $fechaAlta;
    
     /**
     * @ORM\ManyToOne(targetEntity="Proveedor")
     * @ORM\JoinColumn(name="proveedor_id", referencedColumnName="id")
     * @Assert\NotNull()
     */
    private $proveedor;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Producto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set precio
     *
     * @param float $precio
     * @return Producto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set precioCosto
     *
     * @param float $precioCosto
     * @return Producto
     */
    public function setPrecioCosto($precioCosto)
    {
        $this->precioCosto = $precioCosto;

        return $this;
    }

    /**
     * Get precioCosto
     *
     * @return float 
     */
    public function getPrecioCosto()
    {
        return $this->precioCosto;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return Producto
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean 
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     * @return Producto
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime 
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set proveedor
     *
     * @param \Witzke\FacturaBundle\Entity\Proveedor $proveedor
     * @return Producto
     */
    public function setProveedor(\Witzke\FacturaBundle\Entity\Proveedor $proveedor = null)
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    /**
     * Get proveedor
     *
     * @return \Witzke\FacturaBundle\Entity\Proveedor 
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }
    
    public function __toString() {
        return (string) $this->descripcion;
    }
}
