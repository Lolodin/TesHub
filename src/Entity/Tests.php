<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TestsRepository")
 *
 */
class Tests
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nameTest;

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
      */
    private $category_id;





    //Тест к вопросам, сохраняем вопросы в question - связь через ID
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Question", mappedBy="tests")
     *      */
    private $question;

   public function __construct()
   {
       $this->question = new ArrayCollection();
   }

    /**
     * @return ArrayCollection|Question[]
     */


    public function getQuestion()
    {
        return $this->question;
    }

    //Храним вопросы в коллеции
    //Только для OneToMany


    /**

     * @return mixed
     */
    public function getNameTest()
    {
        return $this->nameTest;
    }

    /**
     * @param mixed $nameTest
     */
    public function setNameTest($nameTest): void
    {
        $this->nameTest = $nameTest;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getCategoryID(): Category
    {

        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryID(Category $category_id): void
    {
        $this->category_id = $category_id;
    }



    public function getId(): ?int
    {
        return $this->id;
    }


}
