<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $surname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $testingSystems = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $reportingSystems = null;

    #[ORM\Column(nullable: true)]
    private ?bool $knowsSelenium = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $ideEnvironments = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $programmingLanguages = null;

    #[ORM\Column(nullable: true)]
    private ?bool $knowsMySQL = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $projectMethodologies = null;

    #[ORM\Column(nullable: true)]
    private ?bool $knowsScrum = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $login = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $standpoint = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): static
    {
        $this->surname = $surname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getTestingSystems(): ?string
    {
        return $this->testingSystems;
    }

    public function setTestingSystems(?string $testingSystems): static
    {
        $this->testingSystems = $testingSystems;

        return $this;
    }

    public function getReportingSystems(): ?string
    {
        return $this->reportingSystems;
    }

    public function setReportingSystems(?string $reportingSystems): static
    {
        $this->reportingSystems = $reportingSystems;

        return $this;
    }

    public function isKnowsSelenium(): ?bool
    {
        return $this->knowsSelenium;
    }

    public function setKnowsSelenium(?bool $knowsSelenium): static
    {
        $this->knowsSelenium = $knowsSelenium;

        return $this;
    }

    public function getIdeEnvironments(): ?string
    {
        return $this->ideEnvironments;
    }

    public function setIdeEnvironments(?string $ideEnvironments): static
    {
        $this->ideEnvironments = $ideEnvironments;

        return $this;
    }

    public function getProgrammingLanguages(): ?string
    {
        return $this->programmingLanguages;
    }

    public function setProgrammingLanguages(?string $programmingLanguages): static
    {
        $this->programmingLanguages = $programmingLanguages;

        return $this;
    }

    public function isKnowsMySQL(): ?bool
    {
        return $this->knowsMySQL;
    }

    public function setKnowsMySQL(?bool $knowsMySQL): static
    {
        $this->knowsMySQL = $knowsMySQL;

        return $this;
    }

    public function getProjectMethodologies(): ?string
    {
        return $this->projectMethodologies;
    }

    public function setProjectMethodologies(?string $projectMethodologies): static
    {
        $this->projectMethodologies = $projectMethodologies;

        return $this;
    }

    public function getKnowsScrum(): ?bool
    {
        return $this->knowsScrum;
    }

    public function setKnowsScrum(?bool $knowsScrum): static
    {
        $this->knowsScrum = $knowsScrum;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(?string $login): static
    {
        $this->login = $login;

        return $this;
    }

    public function getStandpoint(): ?string
    {
        return $this->standpoint;
    }

    public function setStandpoint(?string $standpoint): static
    {
        $this->standpoint = $standpoint;

        return $this;
    }
   
}
