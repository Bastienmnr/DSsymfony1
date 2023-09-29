<?php

namespace App\Controller;

use App\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcceuilController extends AbstractController
{
    #[Route('/acceuil', name: 'app_acceuil')]
    public function index(FilmRepository $filmRepository): Response
    {
        $films= $filmRepository->findAll();
        
        return $this->render('acceuil/index.html.twig', [
            'controller_name' => 'AcceuilController',
            'films'=> $films,
        ]);
    }

    #[Route('/film/{id}', name: 'app_film')]
    public function film(int $id,FilmRepository $filmRepository){
        $film = $filmRepository->find($id);
        $projections = $film->getProjections();

        return $this->render('film/film.html.twig', [
            'film' => $film,
            'projection' => $projections
        ]);
        
    }
}