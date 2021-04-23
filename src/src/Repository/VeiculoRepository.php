<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository as RepositoryServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Veiculo;

class VeiculoRepository extends RepositoryServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Veiculo::class);
    }

    public function create(Veiculo $veiculo)
    {
        $em = $this->getEntityManager();
        $em->beginTransaction();
        $em->persist($veiculo);
        $em->commit();
        $em->flush();
    }

    //receber $veiculo
    public function update(Veiculo $veiculo){
        $em = $this->getEntityManager();
        $em->beginTransaction();
        $em->persist($veiculo);
        $em->commit();
        $em->flush();
    }
        

    public function delete(Veiculo $veiculo)
    {
        $em = $this->getEntityManager();
        $em->beginTransaction();
        $em->remove($veiculo);
        $em->commit();
        $em->flush();
    }
}
