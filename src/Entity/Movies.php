<?php

namespace App\Entity;

use App\Repository\MoviesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MoviesRepository::class)
 */
class Movies
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $api_id;

    /**
     * @ORM\ManyToMany(targetEntity=MovieList::class, inversedBy="movies")
     */
    private $MovieList;

    public function __construct()
    {
        $this->MovieList = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getApiId(): ?int
    {
        return $this->api_id;
    }

    public function setApiId(int $api_id): self
    {
        $this->api_id = $api_id;

        return $this;
    }

    /**
     * @return Collection|MovieList[]
     */
    public function getMovieList(): Collection
    {
        return $this->MovieList;
    }

    public function addMovieList(MovieList $movieList): self
    {
        if (!$this->MovieList->contains($movieList)) {
            $this->MovieList[] = $movieList;
        }

        return $this;
    }

    public function removeMovieList(MovieList $movieList): self
    {
        $this->MovieList->removeElement($movieList);

        return $this;
    }
}
