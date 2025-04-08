<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\Collection;
use App\Entity\Reclamation;

#[ORM\Entity]
class User
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 100)]
    private string $firstname;

    #[ORM\Column(type: "string", length: 100)]
    private string $lastname;

    #[ORM\Column(type: "string", length: 255)]
    private string $email;

    #[ORM\Column(type: "string", length: 255)]
    private string $password;

    #[ORM\Column(name: "joinDate", type: "date")]
    private \DateTimeInterface $joinDate;

    #[ORM\Column(type: "string", length: 255)]
    private string $avatar;

    #[ORM\Column(type: "string", length: 10)]
    private string $role;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($value)
    {
        $this->firstname = $value;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($value)
    {
        $this->lastname = $value;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($value)
    {
        $this->email = $value;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($value)
    {
        $this->password = $value;
    }

    public function getJoinDate()
    {
        return $this->joinDate;
    }

    public function setJoinDate($value)
    {
        $this->joinDate = $value;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($value)
    {
        $this->avatar = $value;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($value)
    {
        $this->role = $value;
    }

    #[ORM\OneToMany(mappedBy: "id", targetEntity: Admin::class)]
    private Collection $admins;

        public function getAdmins(): Collection
        {
            return $this->admins;
        }
    
        public function addAdmin(Admin $admin): self
        {
            if (!$this->admins->contains($admin)) {
                $this->admins[] = $admin;
                $admin->setId($this);
            }
    
            return $this;
        }
    
        public function removeAdmin(Admin $admin): self
        {
            if ($this->admins->removeElement($admin)) {
                // set the owning side to null (unless already changed)
                if ($admin->getId() === $this) {
                    $admin->setId(null);
                }
            }
    
            return $this;
        }

    #[ORM\OneToMany(mappedBy: "authorId", targetEntity: Article::class)]
    private Collection $articles;

        public function getArticles(): Collection
        {
            return $this->articles;
        }
    
        public function addArticle(Article $article): self
        {
            if (!$this->articles->contains($article)) {
                $this->articles[] = $article;
                $article->setAuthorId($this);
            }
    
            return $this;
        }
    
        public function removeArticle(Article $article): self
        {
            if ($this->articles->removeElement($article)) {
                // set the owning side to null (unless already changed)
                if ($article->getAuthorId() === $this) {
                    $article->setAuthorId(null);
                }
            }
    
            return $this;
        }

    #[ORM\OneToMany(mappedBy: "id", targetEntity: Client::class)]
    private Collection $clients;

    #[ORM\OneToMany(mappedBy: "user_id", targetEntity: Notification::class)]
    private Collection $notifications;

        public function getNotifications(): Collection
        {
            return $this->notifications;
        }
    
        public function addNotification(Notification $notification): self
        {
            if (!$this->notifications->contains($notification)) {
                $this->notifications[] = $notification;
                $notification->setUser_id($this);
            }
    
            return $this;
        }
    
        public function removeNotification(Notification $notification): self
        {
            if ($this->notifications->removeElement($notification)) {
                // set the owning side to null (unless already changed)
                if ($notification->getUser_id() === $this) {
                    $notification->setUser_id(null);
                }
            }
    
            return $this;
        }

    #[ORM\OneToMany(mappedBy: "id", targetEntity: Partner::class)]
    private Collection $partners;

    #[ORM\OneToMany(mappedBy: "userId", targetEntity: Comment::class)]
    private Collection $comments;

        public function getComments(): Collection
        {
            return $this->comments;
        }
    
        public function addComment(Comment $comment): self
        {
            if (!$this->comments->contains($comment)) {
                $this->comments[] = $comment;
                $comment->setUserId($this);
            }
    
            return $this;
        }
    
        public function removeComment(Comment $comment): self
        {
            if ($this->comments->removeElement($comment)) {
                // set the owning side to null (unless already changed)
                if ($comment->getUserId() === $this) {
                    $comment->setUserId(null);
                }
            }
    
            return $this;
        }

    #[ORM\OneToMany(mappedBy: "participantId", targetEntity: Participant::class)]
    private Collection $participants;

        public function getParticipants(): Collection
        {
            return $this->participants;
        }
    
        public function addParticipant(Participant $participant): self
        {
            if (!$this->participants->contains($participant)) {
                $this->participants[] = $participant;
                $participant->setParticipantId($this);
            }
    
            return $this;
        }
    
        public function removeParticipant(Participant $participant): self
        {
            if ($this->participants->removeElement($participant)) {
                // set the owning side to null (unless already changed)
                if ($participant->getParticipantId() === $this) {
                    $participant->setParticipantId(null);
                }
            }
    
            return $this;
        }

    #[ORM\OneToMany(mappedBy: "user_id", targetEntity: Reclamation::class)]
    private Collection $reclamations;
}
