<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\User;
use Doctrine\Common\Collections\Collection;
use App\Entity\Comment;

#[ORM\Entity]
class Article
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 255)]
    private string $title;

    #[ORM\Column(type: "text")]
    private string $description;

        #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "articles")]
    #[ORM\JoinColumn(name: 'authorId', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private User $authorId;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $publishDate;

    #[ORM\Column(type: "string", length: 255)]
    private string $image;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($value)
    {
        $this->title = $value;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($value)
    {
        $this->description = $value;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function setAuthorId($value)
    {
        $this->authorId = $value;
    }

    public function getPublishDate()
    {
        return $this->publishDate;
    }

    public function setPublishDate($value)
    {
        $this->publishDate = $value;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($value)
    {
        $this->image = $value;
    }

    #[ORM\OneToMany(mappedBy: "articleId", targetEntity: Comment::class)]
    private Collection $comments;

        public function getComments(): Collection
        {
            return $this->comments;
        }
    
        public function addComment(Comment $comment): self
        {
            if (!$this->comments->contains($comment)) {
                $this->comments[] = $comment;
                $comment->setArticleId($this);
            }
    
            return $this;
        }
    
        public function removeComment(Comment $comment): self
        {
            if ($this->comments->removeElement($comment)) {
                // set the owning side to null (unless already changed)
                if ($comment->getArticleId() === $this) {
                    $comment->setArticleId(null);
                }
            }
    
            return $this;
        }
}
