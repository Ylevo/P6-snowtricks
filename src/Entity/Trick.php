<?php

namespace App\Entity;

use App\Repository\TrickRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation\Slug;
use Gedmo\Mapping\Annotation\Timestampable;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;

#[ORM\Entity(repositoryClass: TrickRepository::class)]
class Trick
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank(['message' => 'The name is missing.'])]
    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[Assert\NotBlank(['message' => 'The description is missing.'])]
    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255, unique: true)]
    #[Slug(fields: ['name'])]
    private ?string $slug = null;

    #[Timestampable(on: 'create')]
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $creationDate = null;

    #[Timestampable(on: 'update')]
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $lastModified = null;

    #[Assert\NotBlank(['message' => 'The category is missing.'])]
    #[ORM\ManyToOne(inversedBy: 'tricks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TrickCategory $category = null;

    #[ORM\ManyToOne(inversedBy: 'tricks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'trick', targetEntity: Comment::class)]
    #[ORM\OrderBy(['creationDate' => "DESC"])]
    private Collection $comments;

    #[Assert\Valid]
    #[ORM\ManyToMany(targetEntity: Media::class, inversedBy: 'tricks', cascade: ['persist'])]
    private Collection $medias;

    #[Assert\Valid]
    private Collection $imageMedias;

    #[Assert\Valid]
    private Collection $videoMedias;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: true)]
    private ?Media $mediaCover = null;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->medias = new ArrayCollection();
        $this->imageMedias = new ArrayCollection();
        $this->videoMedias = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getLastModified(): ?\DateTimeInterface
    {
        return $this->lastModified;
    }

    public function setLastModified(\DateTimeInterface $lastModified): self
    {
        $this->lastModified = $lastModified;

        return $this;
    }

    public function getCategory(): ?TrickCategory
    {
        return $this->category;
    }

    public function setCategory(?TrickCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setTrick($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getTrick() === $this) {
                $comment->setTrick(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getMedias(): Collection
    {
        return $this->medias;
    }

    public function addMedia(Media $media): self
    {
        if (!$this->medias->contains($media)) {
            $this->medias->add($media);
        }

        return $this;
    }

    public function removeMedia(Media $media): self
    {
        $this->medias->removeElement($media);

        return $this;
    }

    public function getImageMedias(): Collection
    {
        if (!isset($this->imageMedias)) {
            $this->imageMedias = new ArrayCollection();
        }
        return $this->imageMedias;
    }

    public function addImageMedia(Media $media): self
    {
        if (!$this->imageMedias->contains($media)) {
            $this->imageMedias->add($media);
        }

        return $this;
    }

    public function removeImageMedia(Media $media): self
    {
        $this->imageMedias->removeElement($media);

        return $this;
    }

    public function getVideoMedias(): Collection
    {
        if (!isset($this->videoMedias)) {
            $this->videoMedias = new ArrayCollection();
        }
        return $this->videoMedias;
    }

    public function addVideoMedia(Media $media): self
    {
        if (!$this->videoMedias->contains($media)) {
            $this->videoMedias->add($media);
        }

        return $this;
    }

    public function removeVideoMedia(Media $media): self
    {
        $this->videoMedias->removeElement($media);

        return $this;
    }

    public function getMediaCover(): ?Media
    {
        return $this->mediaCover;
    }

    public function setMediaCover(?Media $mediaCover): self
    {
        $this->mediaCover = $mediaCover;

        return $this;
    }
}
