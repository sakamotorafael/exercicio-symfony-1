<?php


namespace App\Entity;

use App\Repository\VeiculoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VeiculoRepository::class)
 * @ORM\Table(name="veiculo")
 */
class Veiculo
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private int $id;
    /** @ORM\Column(type="string", nullable=false) */
    private string $nome;
    /** @ORM\Column(type="integer", nullable=false) */
    private int $qtdRodas;
    /** @ORM\Column(type="string", nullable=false) */
    private string $motorizado;
    /** @ORM\Column(type="string", nullable=false) */
    private string $tipoVia;

    /**
     * Veiculo constructor.
     * @param string $nome
     * @param int $qtdRodas;
     * @param string $motorizado;
     * @param string $tipoVia;
     */
    public function __construct(string $nome, int $qtdRodas, string $motorizado, string $tipoVia)
    {
        $this->nome = $nome;
        $this->qtdRodas = $qtdRodas;
        $this->motorizado = $motorizado;
        $this->tipoVia = $tipoVia;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return int
     */
    public function getQtdRodas(): int
    {
        return $this->qtdRodas;
    }

    /**
     * @param int $qtdRodas
     */
    public function setQtdRodas(int $qtdRodas): void
    {
        $this->qtdRodas = $qtdRodas;
    }

    /**
     * @return string
     */
    public function getMotorizado(): string
    {
        return $this->motorizado;
    }

    /**
     * @param string $motorizado
     */
    public function setMotorizado(string $motorizado): void
    {
        $this->motorizado = $motorizado;
    }

    /**
     * @return string
     */
    public function getTipoVia(): string
    {
        return $this->tipoVia;
    }

    /**
     * @param string $tipoVia
     */
    public function setTipoVia(string $tipoVia): void
    {
        $this->tipoVia = $tipoVia;
    }
}
