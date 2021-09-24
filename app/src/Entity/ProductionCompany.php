<?php

namespace App\Entity;

class ProductionCompany {
    private int $id;
    private null|string $logoPath;
    private string $name;
    private string $originCountry;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ProductionCompany
     */
    public function setId(int $id): ProductionCompany
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLogoPath(): null|string
    {
        return $this->logoPath;
    }

    /**
     * @param null|string $logoPath
     * @return ProductionCompany
     */
    public function setLogoPath(string|null $logoPath): ProductionCompany
    {
        $this->logoPath = $logoPath;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ProductionCompany
     */
    public function setName(string $name): ProductionCompany
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginCountry(): string
    {
        return $this->originCountry;
    }

    /**
     * @param string $originCountry
     * @return ProductionCompany
     */
    public function setOriginCountry(string $originCountry): ProductionCompany
    {
        $this->originCountry = $originCountry;
        return $this;
    }
}
