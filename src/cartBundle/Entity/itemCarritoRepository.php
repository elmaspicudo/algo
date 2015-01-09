<?php

namespace cartBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\DBAL\DriverManager;

class itemCarritoRepository extends EntityRepository
{
   public function findItemByCart($carrito) {
        $em = $this->getEntityManager();
        $dql = "select i.id,sum(i.cantidad) as cantidad,i.cantidadPeriodo,r.descripcion as renta,pr.descripcion as periodo, p.descripcion as producto, p.precio
            from cartBundle:itemCarrito i
            join i.producto p
            join i.renta r
            join i.periodo pr
            where i.carrito=:carrito
            ";//group by p.id

        $query = $em->createQuery($dql);
        $query->setParameter('carrito', $carrito);
        $articulos = $query->getResult();

        return $articulos;

   }
}
