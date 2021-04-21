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

    public function update(int $id, string $nome, int $qtdRodas, string $motorizado, string $tipoVia)
    {
        $em = $this->getEntityManager();

        $veiculo = $em->find(Veiculo::class, $id);
        $veiculo->setNome($nome);
        $veiculo->setQtdRodas($qtdRodas);
        $veiculo->setMotorizado($motorizado);
        $veiculo->setTipoVia($tipoVia);

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
