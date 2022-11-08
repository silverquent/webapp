<?php

namespace App\Entity;

use App\Repository\ExercicesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExercicesRepository::class)]
class Exercices
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'exercice', targetEntity: Performances::class)]
    private Collection $performances;

    #[ORM\Column(length: 500)]
    private ?string $texte = null;

    #[ORM\Column(length: 255 , nullable: true)]
    private ?string $conseils = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $demo = null;

    #[ORM\OneToMany(mappedBy:'exercices', cascade: ['persist'], targetEntity: Images::class ),]
    private Collection $images;

    public function __construct()
    {
        $this->performances = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Performances>
     */
    public function getPerformances(): Collection
    {
        return $this->performances;
    }

    public function addPerformance(Performances $performance): self
    {
        if (!$this->performances->contains($performance)) {
            $this->performances->add($performance);
            $performance->setExercice($this);
        }

        return $this;
    }

    public function removePerformance(Performances $performance): self
    {
        if ($this->performances->removeElement($performance)) {
            // set the owning side to null (unless already changed)
            if ($performance->getExercice() === $this) {
                $performance->setExercice(null);
            }
        }

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }

    public function getConseils(): ?string
    {
        return $this->conseils;
    }

    public function setConseils(string $conseils): self
    {
        $this->conseils = $conseils;

        return $this;
    }

    public function getDemo(): ?string
    {
        return $this->demo;
    }

    public function setDemo(?string $demo): self
    {
        $this->demo = $demo;

        return $this;
    }

    /**
     * @return Collection<int, Images>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setExercices($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getExercices() === $this) {
                $image->setExercices(null);
            }
        }

        return $this;
    }
}
