<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\Article;

#[ORM\Entity]
class Comment
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "text")]
    private string $content;

        #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "comments")]
    #[ORM\JoinColumn(name: 'userId', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private User $userId;

        #[ORM\ManyToOne(targetEntity: Article::class, inversedBy: "comments")]
    #[ORM\JoinColumn(name: 'articleId', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Article $articleId;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $publishDate;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($value)
    {
        $this->content = $value;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($value)
    {
        $this->userId = $value;
    }

    public function getArticleId()
    {
        return $this->articleId;
    }

    public function setArticleId($value)
    {
        $this->articleId = $value;
    }

    public function getPublishDate()
    {
        return $this->publishDate;
    }

    public function setPublishDate($value)
    {
        $this->publishDate = $value;
    }
}
