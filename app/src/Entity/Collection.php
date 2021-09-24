<?php

namespace App\Entity;

class Collection
{
    private int $id;
    private string $name;
    private string $posterPath;
    private string $backdropPath;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Collection
     */
    public function setId(int $id): Collection
    {
        $this->id = $id;
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
     * @return Collection
     */
    public function setName(string $name): Collection
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getPosterPath(): string
    {
        return $this->posterPath;
    }

    /**
     * @param string $posterPath
     * @return Collection
     */
    public function setPosterPath(string $posterPath): Collection
    {
        $this->posterPath = $posterPath;
        return $this;
    }

    /**
     * @return string
     */
    public function getBackdropPath(): string
    {
        return $this->backdropPath;
    }

    /**
     * @param string $backdropPath
     * @return Collection
     */
    public function setBackdropPath(string $backdropPath): Collection
    {
        $this->backdropPath = $backdropPath;
        return $this;
    }
}
