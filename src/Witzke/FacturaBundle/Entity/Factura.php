<?php

namespace Witzke\FacturaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     */
    private $iva;
    
    /**
     * @ORM\ManyToOne(targetEntity="CondicionPago")
     * @ORM\JoinColumn(name="condicionPago_id", referencedColumnName="id")
     */
    private $condicionPago;
    
    /**
     * @ORM\ManyToOne(targetEntity="Localidad")
     * @ORM\JoinColumn(name="localidad_id", referencedColumnName="id")
     */
    private $localidad;


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
}
