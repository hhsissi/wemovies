<?php

namespace App\Request\ParamConverter;

use App\Entity\Movie;
use App\Service\Repository\MovieRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

class MovieParamConverter implements ParamConverterInterface
{
    public function __construct(private MovieRepository $movieRepository)
    {
    }

    public function apply(Request $request, ParamConverter $configuration)
    {
        $id = $request->get('id');
        $movie = $this->movieRepository->getMovie($id);
        $request->attributes->set('movie', $movie);

        return true;
    }

    public function supports(ParamConverter $configuration)
    {
        return $configuration->getClass() === Movie::class;
    }
}
