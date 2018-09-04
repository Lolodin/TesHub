<?php

namespace App\Entity;

use Doctrine\Common\Annotations\Annotation\Target;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorys", inversedBy="products")
     *
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", length=14, nullable=true)
     */
    private $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): Categorys
    {
        return $this->category;
    }

    public function setCategory(Categorys $category)
    {
        $this->category = $category;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }
}
