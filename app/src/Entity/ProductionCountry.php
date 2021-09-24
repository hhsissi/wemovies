<?php

namespace App\Entity;

class ProductionCountry {
    private string $iso_3166_1;
    private string $name;

    /**
     * @return string
     */
    public function getIso31661(): string
    {
        return $this->iso_3166_1;
    }

    /**
     * @param string $iso_3166_1
     * @return ProductionCountry
     */
    public function setIso31661(string $iso_3166_1): ProductionCountry
    {
        $this->iso_3166_1 = $iso_3166_1;
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
     * @return ProductionCountry
     */
    public function setName(string $name): ProductionCountry
    {
        $this->name = $name;
        return $this;
    }
}
