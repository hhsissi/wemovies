<?php

namespace App\Entity;

class Movie
{
    private bool $adult;

    /** @var $belongs_to_collection Collection */
    private Collection $belongsToCollection;

    private int $budget;

    /**
     * @var Genre[]
     */
    private array $genres;

    private string $homepage = '';
    private int $id;
    private string $imdbId = '';
    private string $originalLanguage = '';
    private string $originalTitle = '';
    private string $overview = '';
    private float $popularity = 0;
    private string $posterPath = '';
    private string $backdropPath = '';

    /** @var ProductionCompany[] */
    private $productionCompanies;

    /** @var ProductionCountry[] */
    private $productionCountries;

    /** @var \DateTime|null */
    private \DateTime|null $releaseDate = null;
    private int $revenue;
    private int $runtime;

    /** @var SpokenLanguage[] */
    private array $spokenLanguages = [];
    private string $status = '';
    private string $tagline = '';
    private string $title = '';
    private bool $video = false;
    private float $voteAverage = 0;
    private int $voteCount = 0;

    /**
     * @return bool
     */
    public function isAdult(): bool
    {
        return $this->adult;
    }

    /**
     * @param bool $adult
     * @return Movie
     */
    public function setAdult(bool $adult): Movie
    {
        $this->adult = $adult;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getBelongsToCollection(): Collection
    {
        return $this->belongsToCollection;
    }

    /**
     * @param Collection $belongsToCollection
     * @return Movie
     */
    public function setBelongsToCollection(Collection $belongsToCollection): Movie
    {
        $this->belongsToCollection = $belongsToCollection;
        return $this;
    }

    /**
     * @return int
     */
    public function getBudget(): int
    {
        return $this->budget;
    }

    /**
     * @param int $budget
     * @return Movie
     */
    public function setBudget(int $budget): Movie
    {
        $this->budget = $budget;
        return $this;
    }

    /**
     * @return Genre[]
     */
    public function getGenres(): array
    {
        return $this->genres;
    }

    /**
     * @param Genre[] $genres
     * @return Movie
     */
    public function setGenres(array $genres): Movie
    {
        $this->genres = $genres;
        return $this;
    }

    /**
     * @return string
     */
    public function getHomepage(): string
    {
        return $this->homepage;
    }

    /**
     * @param string $homepage
     * @return Movie
     */
    public function setHomepage(string $homepage): Movie
    {
        $this->homepage = $homepage;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Movie
     */
    public function setId(int $id): Movie
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getImdbId(): string
    {
        return $this->imdbId;
    }

    /**
     * @param string $imdbId
     * @return Movie
     */
    public function setImdbId(string $imdbId): Movie
    {
        $this->imdbId = $imdbId;
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalLanguage(): string
    {
        return $this->originalLanguage;
    }

    /**
     * @param string $originalLanguage
     * @return Movie
     */
    public function setOriginalLanguage(string $originalLanguage): Movie
    {
        $this->originalLanguage = $originalLanguage;
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalTitle(): string
    {
        return $this->originalTitle;
    }

    /**
     * @param string $originalTitle
     * @return Movie
     */
    public function setOriginalTitle(string $originalTitle): Movie
    {
        $this->originalTitle = $originalTitle;
        return $this;
    }

    /**
     * @return string
     */
    public function getOverview(): string
    {
        return $this->overview;
    }

    /**
     * @param string $overview
     * @return Movie
     */
    public function setOverview(string $overview): Movie
    {
        $this->overview = $overview;
        return $this;
    }

    /**
     * @return float
     */
    public function getPopularity(): float
    {
        return $this->popularity;
    }

    /**
     * @param float $popularity
     * @return Movie
     */
    public function setPopularity(float $popularity): Movie
    {
        $this->popularity = $popularity;
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
     * @return Movie
     */
    public function setPosterPath(string $posterPath): Movie
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
     * @return Movie
     */
    public function setBackdropPath(string $backdropPath): Movie
    {
        $this->backdropPath = $backdropPath;
        return $this;
    }

    /**
     * @return ProductionCompany[]
     */
    public function getProductionCompanies(): array
    {
        return $this->productionCompanies;
    }

    /**
     * @param ProductionCompany[] $productionCompanies
     * @return Movie
     */
    public function setProductionCompanies(array $productionCompanies): Movie
    {
        $this->productionCompanies = $productionCompanies;
        return $this;
    }

    /**
     * @return ProductionCountry[]
     */
    public function getProductionCountries(): array
    {
        return $this->productionCountries;
    }

    /**
     * @param ProductionCountry[] $productionCountries
     * @return Movie
     */
    public function setProductionCountries(array $productionCountries): Movie
    {
        $this->productionCountries = $productionCountries;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getReleaseDate(): \DateTime|null
    {
        return $this->releaseDate;
    }

    /**
     * @param \DateTime $releaseDate
     * @return Movie
     */
    public function setReleaseDate(\DateTime $releaseDate): Movie
    {
        $this->releaseDate = $releaseDate;
        return $this;
    }

    /**
     * @return int
     */
    public function getRevenue(): int
    {
        return $this->revenue;
    }

    /**
     * @param int $revenue
     * @return Movie
     */
    public function setRevenue(int $revenue): Movie
    {
        $this->revenue = $revenue;
        return $this;
    }

    /**
     * @return int
     */
    public function getRuntime(): int
    {
        return $this->runtime;
    }

    /**
     * @param int $runtime
     * @return Movie
     */
    public function setRuntime(int $runtime): Movie
    {
        $this->runtime = $runtime;
        return $this;
    }

    /**
     * @return SpokenLanguage[]
     */
    public function getSpokenLanguages(): array
    {
        return $this->spokenLanguages;
    }

    /**
     * @param SpokenLanguage[] $spokenLanguages
     * @return Movie
     */
    public function setSpokenLanguages(array $spokenLanguages): Movie
    {
        $this->spokenLanguages = $spokenLanguages;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Movie
     */
    public function setStatus(string $status): Movie
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getTagline(): string
    {
        return $this->tagline;
    }

    /**
     * @param string $tagline
     * @return Movie
     */
    public function setTagline(string $tagline): Movie
    {
        $this->tagline = $tagline;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Movie
     */
    public function setTitle(string $title): Movie
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return bool
     */
    public function isVideo(): bool
    {
        return $this->video;
    }

    /**
     * @param bool $video
     * @return Movie
     */
    public function setVideo(bool $video): Movie
    {
        $this->video = $video;
        return $this;
    }

    /**
     * @return float
     */
    public function getVoteAverage(): float
    {
        return $this->voteAverage;
    }

    /**
     * @param float $voteAverage
     * @return Movie
     */
    public function setVoteAverage(float $voteAverage): Movie
    {
        $this->voteAverage = $voteAverage;
        return $this;
    }

    /**
     * @return int
     */
    public function getVoteCount(): int
    {
        return $this->voteCount;
    }

    /**
     * @param int $voteCount
     * @return Movie
     */
    public function setVoteCount(int $voteCount): Movie
    {
        $this->voteCount = $voteCount;
        return $this;
    }
}
