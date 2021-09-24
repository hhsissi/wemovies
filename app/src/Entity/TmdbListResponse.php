<?php

namespace App\Entity;

class TmdbListResponse
{
    private int $page = 0;

    /**
     * @var Movie[]
     */
    private array $results = [];
    private int $totalPages = 0;
    private int $totalResults = 0;

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return TmdbListResponse
     */
    public function setPage(int $page): TmdbListResponse
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @return Movie[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * @param Movie[] $results
     * @return TmdbListResponse
     */
    public function setResults(array $results): TmdbListResponse
    {
        $this->results = $results;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    /**
     * @param int $totalPages
     * @return TmdbListResponse
     */
    public function setTotalPages(int $totalPages): TmdbListResponse
    {
        $this->totalPages = $totalPages;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalResults(): int
    {
        return $this->totalResults;
    }

    /**
     * @param int $totalResults
     * @return TmdbListResponse
     */
    public function setTotalResults(int $totalResults): TmdbListResponse
    {
        $this->totalResults = $totalResults;
        return $this;
    }
}
