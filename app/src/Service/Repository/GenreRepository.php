<?php

namespace App\Service\Repository;

use App\Entity\Genre;
use App\Entity\TmdbListResponse;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GenreRepository
{
    public function __construct(private LoggerInterface $logger, private HttpClientInterface $tmdbClient, private SerializerInterface $serializer)
    {
    }

    // FIXME There must be a better way to decode directly nested fields
    public function getGenresList(): array {
        try {
            $response = $this->tmdbClient->request(Request::METHOD_GET, sprintf('genre/movie/list'));
            $data = json_decode($response->getContent(), true);
            return $this->serializer->deserialize(json_encode($data['genres']), Genre::class . '[]', 'json');
        } catch (\Exception $e) {
            $this->logger->error('Could not retrieve genres list' . $e->getMessage());
            return [];
        }
    }
}