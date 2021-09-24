<?php

namespace App\Service\Repository;

use App\Entity\Movie;
use App\Entity\TmdbListResponse;
use App\Entity\Video;
use Doctrine\Common\Annotations\AnnotationReader;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MovieRepository
{
    public function __construct(private LoggerInterface $logger, private HttpClientInterface $tmdbClient, private SerializerInterface $serializer)
    {
    }

    public function getMovie(int $id): Movie
    {
        try {
            $response = $this->tmdbClient->request(Request::METHOD_GET, sprintf('movie/%d', $id));
            return $this->serializer->deserialize($response->getContent(), Movie::class, 'json');
        } catch (\Exception $e) {
            $this->logger->error('An error occured during deserialization' . $e->getMessage());
            return new Movie();
        }
    }

    /**
     * @param int $id
     * @return Video[]
     */
    public function getMovieVideos(int $id): array
    {
        try {
            $response = $this->tmdbClient->request(Request::METHOD_GET, sprintf('movie/%d/videos', $id));
            $data = json_decode($response->getContent(), true);
            return $this->serializer->deserialize(json_encode($data['results']), Video::class . '[]', 'json');
        } catch (\Exception $e) {
            $this->logger->error('An error occured during deserialization' . $e->getMessage());
            return [];
        }
    }

    public function getMoviesByGenres(array $genres = [], int $page = 1): TmdbListResponse
    {
        return $this->getPage(Request::METHOD_GET, 'discover/movie', [
            'query' => [
                'with_genres' => implode(',', $genres),
                'page' => $page,
                'sort_by' => 'vote_count.desc'
            ]
        ]);
    }

    public function getMoviesByName(string $name = '', int $page = 1): TmdbListResponse
    {
        return $this->getPage(Request::METHOD_GET, 'search/movie', [
            'query' => [
                'query' => $name,
                'page' => $page,
                'sort_by' => 'vote_average.desc'
            ]
        ]);
    }

    public function getTopRatedMovie() {
        $page = $this->getTopRatedMovies(1);

        $movie = $page->getResults()[0];

        return $movie;
    }

    public function getTopRatedMovies(int $page = 1): TmdbListResponse {
        return $this->getPage(Request::METHOD_GET, 'movie/top_rated', [
            'query' => [
                'page' => $page
            ]
        ]);
    }

    private function getPage($method, $url, $options = null): TmdbListResponse {
        try {
            $response = $this->tmdbClient->request($method, $url, $options);
            return $this->serializer->deserialize($response->getContent(true), TmdbListResponse::class, 'json');
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            return new TmdbListResponse();
        }
    }
}
