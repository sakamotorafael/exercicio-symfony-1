<?php

namespace App\Controller;

use App\Entity\Veiculo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $carro = new Veiculo("Carro", 4, "sim", "asfalto");
        $bicicleta = new Veiculo("Bicicleta", 2, "nao", "acidentado");
        $snowboard = new Veiculo("Snow board", 0, "nao", "neve");
        $veiculos = [$carro, $bicicleta, $snowboard];

        return $this->render('home/index.html.twig', [
            "veiculos" => $veiculos
        ]);
    }
}