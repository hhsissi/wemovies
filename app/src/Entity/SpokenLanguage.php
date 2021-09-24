<?php

namespace App\Entity;

class SpokenLanguage {
    private string $englishName;
    private string $iso_639_1;
    private string $name;

    /**
     * @return string
     */
    public function getEnglishName(): string
    {
        return $this->englishName;
    }

    /**
     * @param string $englishName
     * @return SpokenLanguage
     */
    public function setEnglishName(string $englishName): SpokenLanguage
    {
        $this->englishName = $englishName;
        return $this;
    }

    /**
     * @return string
     */
    public function getIso6391(): string
    {
        return $this->iso_639_1;
    }

    /**
     * @param string $iso_639_1
     * @return SpokenLanguage
     */
    public function setIso6391(string $iso_639_1): SpokenLanguage
    {
        $this->iso_639_1 = $iso_639_1;
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
     * @return SpokenLanguage
     */
    public function setName(string $name): SpokenLanguage
    {
        $this->name = $name;
        return $this;
    }
}
