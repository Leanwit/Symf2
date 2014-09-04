<?php

namespace Witzke\FacturaBundle\Services;

use Doctrine\ORM\EntityManager;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class BuscadorFactura{
    private $em;
    
    public function __construct(EntityManager $entityManager) {
        $this->em = $entityManager;
    }
    
    public function getAcFacturasFiltradas($arrayFiltros){
        $facturas = $this->em->getRepository('FacturaBundle:Factura')->getAcFacturasFiltradas($arrayFiltros);
        return $facturas;
    }
}
?>
