<?php

namespace App\Entity;

class Video
{
    private string $id;
    private string $iso_639_1;
    private string $iso_3166_1;
    private string $name;
    private string $key;
    private string $site;
    private int $size;
    private string $type;
    private bool $official;
    private \DateTime $publishedAt;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Video
     */
    public function setId(string $id): Video
    {
        $this->id = $id;
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
     * @return Video
     */
    public function setIso6391(string $iso_639_1): Video
    {
        $this->iso_639_1 = $iso_639_1;
        return $this;
    }

    /**
     * @return string
     */
    public function getIso31661(): string
    {
        return $this->iso_3166_1;
    }

    /**
     * @param string $iso_3166_1
     * @return Video
     */
    public function setIso31661(string $iso_3166_1): Video
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
     * @return Video
     */
    public function setName(string $name): Video
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return Video
     */
    public function setKey(string $key): Video
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return string
     */
    public function getSite(): string
    {
        return $this->site;
    }

    /**
     * @param string $site
     * @return Video
     */
    public function setSite(string $site): Video
    {
        $this->site = $site;
        return $this;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     * @return Video
     */
    public function setSize(int $size): Video
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Video
     */
    public function setType(string $type): Video
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return bool
     */
    public function isOfficial(): bool
    {
        return $this->official;
    }

    /**
     * @param bool $official
     * @return Video
     */
    public function setOfficial(bool $official): Video
    {
        $this->official = $official;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPublishedAt(): \DateTime
    {
        return $this->publishedAt;
    }

    /**
     * @param \DateTime $publishedAt
     * @return Video
     */
    public function setPublishedAt(\DateTime $publishedAt): Video
    {
        $this->publishedAt = $publishedAt;
        return $this;
    }
}
