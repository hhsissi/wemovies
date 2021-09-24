<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Form\AutocompleteType;
use App\Form\SearchType;
use App\Service\Repository\GenreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function __construct(private GenreRepository $genreRepository)
    {
    }

    /**
     * @Route(path="/", name="home")
     */
    public function index(Request $request, $page=1): Response
    {
        $genres = $this->genreRepository->getGenresList();

        $searchParams = $request->query->get('search');
        $autocompleteForm = $this->createForm(AutocompleteType::class);
        $searchForm = $this->createForm(SearchType::class);
        if (!empty($searchParams['genres'])) {
            $data = [];
            foreach ($searchParams['genres'] as $genreId) {
                $matches = array_filter($genres, function(Genre $genre) use($genreId) {
                    return (int) $genreId === $genre->getId();
                });
                array_push($data, array_values($matches)[0]);
            }

            $searchForm->get('genres')->setData($data);
        }

        return $this->render('home/index.html.twig', [
            'page' => $page,
            'genres' => $genres,
            'searchForm' => $searchForm->createView(),
            'autocompleteForm' => $autocompleteForm->createView(),
        ]);
    }
}
