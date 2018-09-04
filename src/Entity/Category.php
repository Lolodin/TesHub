<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *
     *@ORM\Column(type="string")
     *
     */
    private $category;



    /**
     * @return mixed
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
         $this->category = $category;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

}
