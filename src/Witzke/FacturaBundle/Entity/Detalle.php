<?php

namespace Witzke\FacturaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Detalle
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Witzke\FacturaBundle\Entity\Repository\DetalleRepository")
 */
class Detalle
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
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;
   
    /**
     * @ORM\ManyToOne(targetEntity="Factura", inversedBy="detalle")
     * @ORM\JoinColumn(name="factura_id", referencedColumnName="id")
     */
    private $factura;
    
     /**
     * @ORM\ManyToOne(targetEntity="Producto", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="producto_id", referencedColumnName="id")
     */
    private $producto;
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
     * Set cantidad
     *
     * @param integer $cantidad
     * @return Detalle
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }
    
    public function __toString() {
        return (string) $this->producto;
    }

    /**
     * Set factura
     *
     * @param \Witzke\FacturaBundle\Entity\Factura $factura
     * @return Detalle
     */
    public function setFactura(\Witzke\FacturaBundle\Entity\Factura $factura = null)
    {
        $this->factura = $factura;
        return $this;
    }

    /**
     * Get factura
     *
     * @return \Witzke\FacturaBundle\Entity\Factura 
     */
    public function getFactura()
    {
        return $this->factura;
    }

    /**
     * Set producto
     *
     * @param \Witzke\FacturaBundle\Entity\Producto $producto
     * @return Detalle
     */
    public function setProducto(\Witzke\FacturaBundle\Entity\Producto $producto = null)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return \Witzke\FacturaBundle\Entity\Producto 
     */
    public function getProducto()
    {
        return $this->producto;
    }
}
