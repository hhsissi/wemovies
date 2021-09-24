<?php

namespace App\Controller;

use App\Entity\Configuration;
use App\Entity\Movie;
use App\Entity\Video;
use App\Form\SearchType;
use App\Service\Repository\MovieRepository;
use App\Service\Repository\TmdbRepository;
use Knp\Component\Pager\Event\Subscriber\Paginate\Callback\CallbackPagination;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    private Configuration $tmdbConfig;

    public function __construct(private MovieRepository $movieRepository, private TmdbRepository $tmdbRepository)
    {
    }

    /**
     * @Route(path="/movies/list", name="moviesList")
     */
    public function getMoviesList(RequestStack $requestStack, PaginatorInterface $paginator): Response
    {
        $request = $requestStack->getMainRequest();
        $this->tmdbConfig = $this->tmdbRepository->getConfiguration();
        $topRatedMovie = $this->movieRepository->getTopRatedMovie();

        $page = $requestStack->getMainRequest()->query->get('page', 1);

        $searchParams = $request->query->get('search');
        $genres = [];
        if (!empty($searchParams['genres'])) {
            $genres = $searchParams['genres'];
        }

        $resultsPage = $this->movieRepository->getMoviesByGenres($genres, $page);

        $count = fn() => $resultsPage->getTotalResults();
        $items = fn($offset, $limit) => $resultsPage->getResults();

        $target = new CallbackPagination($count, $items);

        $pagination = $paginator->paginate($target, $page, 20);

        return $this->render('movie/list.html.twig', [
            'page' => $page,
            'bestRatedMovie' => $topRatedMovie,
            'resultsPage' => $resultsPage,
            'pagination' => $pagination,
            'imgConfig' => $this->tmdbConfig->getImages(),
        ]);
    }

    /**
     * @ParamConverter(name="id", converter="MovieParamConverter", class="App\Entity\Movie")
     * @Route(path="/movies/{id}", name="movies")
     */
    public function getMovie(Movie $movie): Response
    {
        $this->tmdbConfig = $this->tmdbRepository->getConfiguration();
        $videos = $this->movieRepository->getMovieVideos($movie->getId());
        return $this->render('movie/detail.html.twig', [
            'movie' => $movie,
            'videos' => $videos,
            'mainVideos' => array_filter($videos, function ($video) {
                return strtolower($video->getSite()) === 'youtube';
            }),
            'imgConfig' => $this->tmdbConfig->getImages()
        ]);
    }
}
