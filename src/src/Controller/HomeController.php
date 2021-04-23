<?php

namespace App\Controller;

use App\Entity\Veiculo;
use App\Repository\VeiculoRepository;
use App\Form\VeiculoType;
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
        $form = $this->createForm(VeiculoType::class);
        
        return $this->render('home/index.html.twig', [
            "veiculos" => $veiculos,
            "formVeiculo" => $form->createView()
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request, VeiculoRepository $veiculoRepository){
        $form = $this->createForm(VeiculoType::class);
        $form->handleRequest($request);
        $veiculo = $form->getData();
        
        $veiculoRepository->create($veiculo);
        $this->addFlash("message", "Veículo cadastrado com sucesso!");
        return $this->redirectToRoute("home");
    }

    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit(Veiculo $veiculo): Response
    {
        $form = $this->createForm(VeiculoType::class, $veiculo);
        
        return $this->render("home/form.html.twig", [
        "veiculo" => $veiculo,
        "formVeiculo" => $form->createView()
    ]);
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(int $id, Veiculo $veiculo, VeiculoRepository $veiculoRepository): Response
    {
        $veiculo = $veiculoRepository->findOneBy(['id' => $id]);
        
        $veiculoRepository->delete($veiculo);

        $this->addFlash("message", "Veículo deletado!");
        return $this->redirectToRoute("home");
    }

    /**
     * @Route("/update/{id}", name="update")
     */
    public function update(Veiculo $veiculo, Request $request, VeiculoRepository $veiculoRepository): Response
    {
        $form = $this->createForm(VeiculoType::class, $veiculo);
        $form->handleRequest($request);
        $veiculo = $form->getData();
        $veiculoRepository->update($veiculo);

        $this->addFlash("message", "Veículo modificado com sucesso!");
        return $this->redirectToRoute("home");
    }
}