<?php

namespace Miets\DoctrineBehaviors\Tests\Fixtures\Entity;

use ArrayAccess;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Miets\DoctrineBehaviors\Contract\Entity\TreeNodeInterface;
use Miets\DoctrineBehaviors\Model\Tree\TreeNodeTrait;
use Miets\DoctrineBehaviors\Tests\Fixtures\Repository\TreeNodeRepository;
use Stringable;

#[Entity(repositoryClass: TreeNodeRepository::class)]
class TreeNodeEntity implements TreeNodeInterface, ArrayAccess, Stringable
{
    use TreeNodeTrait;

    #[Id]
    #[Column(type: 'integer')]
    #[GeneratedValue(strategy: 'NONE')]
    private ?int $id = null;

    #[Column(type: 'string', length: 255, nullable: true)]
    private ?string $name = null;

    public function __toString(): string
    {
        return (string) $this->getName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
