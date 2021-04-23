<?php


namespace App\Entity;

use App\Repository\VeiculoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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

    /** 
     * @ORM\Column(type="string", nullable=false) 
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "This field must be at least {{ limit }} characters long",
     *      maxMessage = "This field name cannot be longer than {{ limit }} characters"
     * )
     * /**
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="This field cannot contain a number"
     * )
     */
    private string $nome;

    /** 
     * @ORM\Column(type="integer", nullable=false) 
     * @Assert\NotBlank
     * @Assert\PositiveOrZero
     * */
    private int $qtdRodas;

    /** 
     * @ORM\Column(type="integer")
     * */
    private bool $motorizado;

    /** 
     * @ORM\Column(type="string", nullable=false) 
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "This field must be at least {{ limit }} characters long",
     *      maxMessage = "This field name cannot be longer than {{ limit }} characters"
     * )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="This field cannot contain a number"
     * )
     * */
    private string $tipoVia;


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
     * @return bool
     */
    public function getMotorizado(): bool
    {
        return $this->motorizado;
    }

    /**
     * @param bool $motorizado
     */
    public function setMotorizado(bool $motorizado): void
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
