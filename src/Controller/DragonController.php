<?php

namespace App\Controller;

use App\Form\UpdateType;
use App\Entity\IdCreature;
use App\Repository\IdCreatureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class DragonController extends AbstractController
{
    /**
     * @Route("/", name="app_dragon_index")
     */
    public function index(IdCreatureRepository $repository): Response
    {
        $dragons = $repository->findAll();
    
        return $this->render('dragon/index.html.twig', [
            'dragons' => $dragons,
        ]);
    }
    /**
     * @Route("/iddragon/{id}", name="app_dragon_iddragon", requirements={"id"="\d+"})
     */
    public function iddragon(IdCreature $iddragon): Response
    {
        return $this->render('dragon/iddragon.html.twig', [
            'iddragon' => $iddragon
        ]);
    }
    /**
     * @Route("/iddragon/add", name="app_dragon_add")
     * @Route("/iddragon/edit/{id}", name="app_dragon_edit", requirements={"id"="\d+"})
     */
    public function edit(IdCreature $creature = null, Request $request, EntityManagerInterface $entityManager): Response
    {
        if(!$creature)
        {
            $creature = new IdCreature();
        }
        $form = $this->createForm(UpdateType::class, $creature);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($creature);
            $entityManager->flush();
            return $this->redirectToRoute("app_dragon_index");
        }

        return $this->render('dragon/edit.html.twig', [
            'creature' => $creature,
            'form' =>$form->createView(),
            'isModification'=> $creature->getId() !== null,
        ]);
    }

}