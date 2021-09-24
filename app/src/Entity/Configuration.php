<?php

namespace App\Entity;

class Configuration
{
    private ImageConfiguration $images;

    /**
     * @return ImageConfiguration
     */
    public function getImages(): ImageConfiguration
    {
        return $this->images;
    }

    /**
     * @param ImageConfiguration $images
     * @return Configuration
     */
    public function setImages(ImageConfiguration $images): Configuration
    {
        $this->images = $images;
        return $this;
    }
}

class ImageConfiguration
{
    private string $baseUrl = '';
    private string $secureBaseUrl = '';
    private array $backdropSizes = [];
    private array $logoSizes = [];
    private array $posterSizes = [];
    private array $profileSizes = [];
    private array $stillSizes = [];

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     * @return ImageConfiguration
     */
    public function setBaseUrl(string $baseUrl): ImageConfiguration
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getSecureBaseUrl(): string
    {
        return $this->secureBaseUrl;
    }

    /**
     * @param string $secureBaseUrl
     * @return ImageConfiguration
     */
    public function setSecureBaseUrl(string $secureBaseUrl): ImageConfiguration
    {
        $this->secureBaseUrl = $secureBaseUrl;
        return $this;
    }

    /**
     * @return array
     */
    public function getBackdropSizes(): array
    {
        return $this->backdropSizes;
    }

    /**
     * @param array $backdropSizes
     * @return ImageConfiguration
     */
    public function setBackdropSizes(array $backdropSizes): ImageConfiguration
    {
        $this->backdropSizes = $backdropSizes;
        return $this;
    }

    /**
     * @return array
     */
    public function getLogoSizes(): array
    {
        return $this->logoSizes;
    }

    /**
     * @param array $logoSizes
     * @return ImageConfiguration
     */
    public function setLogoSizes(array $logoSizes): ImageConfiguration
    {
        $this->logoSizes = $logoSizes;
        return $this;
    }

    /**
     * @return array
     */
    public function getPosterSizes(): array
    {
        return $this->posterSizes;
    }

    /**
     * @param array $posterSizes
     * @return ImageConfiguration
     */
    public function setPosterSizes(array $posterSizes): ImageConfiguration
    {
        $this->posterSizes = $posterSizes;
        return $this;
    }

    /**
     * @return array
     */
    public function getProfileSizes(): array
    {
        return $this->profileSizes;
    }

    /**
     * @param array $profileSizes
     * @return ImageConfiguration
     */
    public function setProfileSizes(array $profileSizes): ImageConfiguration
    {
        $this->profileSizes = $profileSizes;
        return $this;
    }

    /**
     * @return array
     */
    public function getStillSizes(): array
    {
        return $this->stillSizes;
    }

    /**
     * @param array $stillSizes
     * @return ImageConfiguration
     */
    public function setStillSizes(array $stillSizes): ImageConfiguration
    {
        $this->stillSizes = $stillSizes;
        return $this;
    }
}
