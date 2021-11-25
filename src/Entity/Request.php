<?php

namespace App\Entity;

use App\DTO\RequestDTO;
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
     * @ORM\Column(type="string", length=255, name="title")
     */
    private string $title;
    /**
     * @ORM\Column(type="text", name="message")
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

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="requests")
     */
    private ?User $createBy;

    public function __construct(string $title, string $message)
    {
        $this->title = $title;
        $this->message = $message;
        $this->createAt = new DateTime();
    }

    public static function createFromDTO(RequestDTO $dto): self
    {
        return new self($dto->getTitle(), $dto->getMessage());
    }

    public function updateFromDTO(RequestDTO $dto): self
    {
        $this->setTitle($dto->getTitle());
        $this->setMessage($dto->getMessage());

        return $this;
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

    public function getCreateBy(): ?User
    {
        return $this->createBy;
    }

    public function setCreateBy(?User $createBy): void
    {
        $this->createBy = $createBy;
    }

}