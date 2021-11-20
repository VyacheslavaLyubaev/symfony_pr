<?php

namespace App\Entity;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RequestRepository")
 */
class Request
{
    /**
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private ?int $id;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $title;
    /**
     * @ORM\Column(type="text")
     */
    private string $message;
    /**
     * @ORM\Column(type="smallint", options={"default" : 0})
     */
    private int $status = 0;
    /**
     * @ORM\Column(type="datetime")
     */
    private DateTime $createAt;

    public function __construct(string $title, string $message)
    {
        $this->title=$title;
        $this->message=$message;
        $this->createAt= new DateTime();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getCreateAt(): DateTime
    {
        return $this->createAt;
    }
}