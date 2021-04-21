<?php

namespace App\Controller;

use App\Entity\Veiculo;
use App\Repository\VeiculoRepository;
use Doctrine\Common\Annotations\Reader;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(VeiculoRepository $veiculoRepository): Response
    {
        
        $veiculos = $veiculoRepository->findAll();
        
        return $this->render('home/index.html.twig', [
            "veiculos" => $veiculos
        ]);
    }

    /**
     * @Route("/adicionar", name="create")
     */
    public function create(Request $request, VeiculoRepository $veiculoRepository){
        $nome = $request->get("veiculo");
        $qtdRodas = $request->get("qtdRodas");
        $motorizado = $request->get("motorizado");
        $tipoVia = $request->get("tipoVia");

        $veiculo = new Veiculo($nome, $qtdRodas, $motorizado, $tipoVia);
        $veiculoRepository->create($veiculo);

        $this->addFlash("message", "Veículo cadastrado com sucesso!");
        return $this->redirectToRoute("home");
    }

    /**
     * @Route("/editar/{id}", name="edit")
     */
    public function edit(int $id, Veiculo $veiculo, VeiculoRepository $veiculoRepository): Response
    {
        $veiculo = $veiculoRepository->findOneBy(['id' => $id]);
        return $this->render("home/form.html.twig", [
        "veiculo" => $veiculo
    ]);
    }

    /**
     * @Route("/deletar/{id}", name="deletar")
     */
    public function deletar(int $id, Veiculo $veiculo, VeiculoRepository $veiculoRepository): Response
    {
        $veiculo = $veiculoRepository->findOneBy(['id' => $id]);
        
        $veiculoRepository->delete($veiculo);

        $this->addFlash("message", "Veículo deletado!");
        return $this->redirectToRoute("home");
    }

    /**
     * @Route("/editar/salvar/{id}", name="update")
     */
    public function update(int $id, Request $request, VeiculoRepository $veiculoRepository): Response
    {
        $nome = $request->get("veiculo");
        $qtdRodas = $request->get("qtdRodas");
        $motorizado = $request->get("motorizado");
        $tipoVia = $request->get("tipoVia");

        $veiculoRepository->update($id, $nome, $qtdRodas, $motorizado, $tipoVia);

        $this->addFlash("message", "Veículo modificado com sucesso!");
        return $this->redirectToRoute("home");
    }
}