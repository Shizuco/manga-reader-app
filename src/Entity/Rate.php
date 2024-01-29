<?php

namespace App\Entity;

use App\Repository\RateRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RateRepository::class)]
class Rate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $rate = null;

    #[ORM\Column]
    private ?int $count_of_voters = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRate(): ?string
    {
        return $this->rate;
    }

    public function setRate(string $rate): static
    {
        $this->rate = $rate;

        return $this;
    }

    public function getCountOfVoters(): ?int
    {
        return $this->count_of_voters;
    }

    public function setCountOfVoters(int $count_of_voters): static
    {
        $this->count_of_voters = $count_of_voters;

        return $this;
    }
}
