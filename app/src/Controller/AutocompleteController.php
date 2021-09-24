<?php

namespace App\Controller;

use App\Entity\TmdbListResponse;
use App\Service\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AutocompleteController extends AbstractController
{
    /**
     * @Route(path="/autocomplete", name="autocomplete")
     */
    public function index(Request $request, MovieRepository $movieRepository): Response
    {
        $page = new TmdbListResponse();
        if ($request->query->get('name')) {
            $page = $movieRepository->getMoviesByName($request->query->get('name'), 1);
        }

        return $this->render('autocomplete/index.html.twig', [
            'page' => $page,
        ]);
    }
}
