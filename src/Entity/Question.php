<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository")
 */
class Question
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $question;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */

    private $point;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Answer", mappedBy="questions")
   */
    private $answer;



    public function __construct()
    {
        $this->answer = new ArrayCollection();
    }

    /**
     * @return ArrayCollection|Answer[]
     */
    public function getAnswer()
    {
        return $this->answer;
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getPoint(): ?int
    {
        return $this->point;
    }

    public function setPoint(?int $point): self
    {
        $this->point = $point;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTests()
    {
        return $this->tests;
    }

    /**
     * @param mixed $tests
     */
    public function setTests($tests): void
    {
        $this->tests = $tests;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tests", inversedBy="question")
     */
private $tests;






}
