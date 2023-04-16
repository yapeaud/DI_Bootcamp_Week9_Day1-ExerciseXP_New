<?php

namespace App\Entity;

use App\Repository\GreetingEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GreetingEntityRepository::class)]
class GreetingEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $greet = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGreet(): ?string
    {
        return $this->greet;
    }

    public function setGreet(string $greet): self
    {
        $this->greet = $greet;

        return $this;
    }
}
