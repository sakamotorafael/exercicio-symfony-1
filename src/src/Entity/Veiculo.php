<?php


namespace App\Entity;


class Veiculo
{
    private string $nome;
    private int $qtdRodas;
    private string $motorizado;
    private string $tipoVia;

    /**
     * Livro constructor.
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
    public function setMotorizado(float $motorizado): void
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
    public function setTipoVia(float $tipoVia): void
    {
        $this->tipoVia = $tipoVia;
    }

}