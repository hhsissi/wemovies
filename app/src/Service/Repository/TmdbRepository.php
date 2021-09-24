<?php

namespace App\Service\Repository;

use App\Entity\Configuration;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TmdbRepository
{
    public function __construct(private HttpClientInterface $tmdbClient, private SerializerInterface $serializer)
    {
    }

    public function getConfiguration(): Configuration {
        $response = $this->tmdbClient->request(Request::METHOD_GET, 'configuration');

        return $this->serializer->deserialize($response->getContent(), Configuration::class, 'json');
    }
}
