<?php

namespace Witzke\FacturaBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * FacturaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FacturaRepository extends EntityRepository
{
    public function getAcFacturasFiltradas($filtrosArray){
        $qb = $this->createQueryBuilder('f');
        if($filtrosArray['numeroFactura']){
            $qb->where('f.numeroFactura = :nroFactura')
                    ->setParameter('nroFactura', $filtrosArray['numeroFactura']);
        }
        if($filtrosArray['iva']){
            $qb->where('f.iva = :iva')
                    ->setParameter('iva', $filtrosArray['iva']);
        }
        if($filtrosArray['condicionPago']){
            $qb->where('f.condicionPago = :condicionPago')
                    ->setParameter('condicionPago', $filtrosArray['condicionPago']);
        } 
        
       
        
        return $qb->getQuery()->getResult();
    }
    
}
