<?php

namespace Witzke\FacturaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Factura
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Witzke\FacturaBundle\Entity\Repository\FacturaRepository")
 */
class Factura
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
     * @var integer
     *
     * @ORM\Column(name="numeroFactura", type="integer")
     * @Assert\NotBlank()
     */
    private $numeroFactura;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var float
     *
     * @ORM\Column(name="total", type="float")
     */
    private $total;
    
    /**
     * @ORM\ManyToOne(targetEntity="Iva")
     * @ORM\JoinColumn(name="iva_id", referencedColumnName="id")
     * 
     */
    private $iva;
    
    /**
     * @ORM\ManyToOne(targetEntity="CondicionPago")
     * @ORM\JoinColumn(name="condicionPago_id", referencedColumnName="id")
     * 
     */
    private $condicionPago;
    
    /**
     * @ORM\ManyToOne(targetEntity="Localidad")
     * @ORM\JoinColumn(name="localidad_id", referencedColumnName="id")
     * 
     */
    private $localidad;

    
    /**
     * @ORM\OneToMany(targetEntity="Detalle", mappedBy="factura" ,cascade={"persist", "remove"})
      
     */
    private $detalles;
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
     * Set numeroFactura
     *
     * @param integer $numeroFactura
     * @return Factura
     */
    public function setNumeroFactura($numeroFactura)
    {
        $this->numeroFactura = $numeroFactura;

        return $this;
    }

    /**
     * Get numeroFactura
     *
     * @return integer 
     */
    public function getNumeroFactura()
    {
        return $this->numeroFactura;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Factura
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set total
     *
     * @param float $total
     * @return Factura
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set iva
     *
     * @param \Witzke\FacturaBundle\Entity\Iva $iva
     * @return Factura
     */
    public function setIva(\Witzke\FacturaBundle\Entity\Iva $iva = null)
    {
        $this->iva = $iva;

        return $this;
    }

    /**
     * Get iva
     *
     * @return \Witzke\FacturaBundle\Entity\Iva 
     */
    public function getIva()
    {
        return $this->iva;
    }

    /**
     * Set condicionPago
     *
     * @param \Witzke\FacturaBundle\Entity\CondicionPago $condicionPago
     * @return Factura
     */
    public function setCondicionPago(\Witzke\FacturaBundle\Entity\CondicionPago $condicionPago = null)
    {
        $this->condicionPago = $condicionPago;

        return $this;
    }

    /**
     * Get condicionPago
     *
     * @return \Witzke\FacturaBundle\Entity\CondicionPago 
     */
    public function getCondicionPago()
    {
        return $this->condicionPago;
    }

    /**
     * Set localidad
     *
     * @param \Witzke\FacturaBundle\Entity\Localidad $localidad
     * @return Factura
     */
    public function setLocalidad(\Witzke\FacturaBundle\Entity\Localidad $localidad = null)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Get localidad
     *
     * @return \Witzke\FacturaBundle\Entity\Localidad 
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }
    
    public function __toString() {
        return (string) $this->numeroFactura;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->detallesz = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add detalles
     *
     * @param \Witzke\FacturaBundle\Entity\Detalle $detalles
     * @return Factura
     */
    public function addDetalle(\Witzke\FacturaBundle\Entity\Detalle $detalles)
    {
        $this->detalles[] = $detalles;
        $detalles->setFactura($this);
        return $this;
    }

    /**
     * Remove detalles
     *
     * @param \Witzke\FacturaBundle\Entity\Detalle $detalles
     */
    public function removeDetalle(\Witzke\FacturaBundle\Entity\Detalle $detalles)
    {
        $this->detalles->removeElement($detalles);
    }

    /**
     * Get detalles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDetalles()
    {
        return $this->detalles;
    }
}
