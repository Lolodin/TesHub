<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 02.12.2018
 * Time: 16:01
 */

namespace App\components;
use App\Entity\Answer;
use App\Entity\Question;
use App\Entity\Tests;

$array =[
  "question0" => "Вопрос654yry7",
  "0answer0" => "Ответry7r7",
  "0answer1" => "ответryry",
  "question1" => "Вопросryry",
  "1answer0" => "Ответryry"
];

function addFormstoBD($posts)
{$newTest = new Tests();
    $newTest ->setNameTest('TestsForms');
    $newTest->setTitle('Тестируем добавление с формы');
    foreach ($posts as $post=>$value)
    {

        if (preg_match('/question([0-9])/', $post))
        {
           $newQuestion = new Question();
           $newQuestion->setQuestion($value);
           $newQuestion->setTests($newTest);
        }
        else
        {
            $newAnswer = new Answer();
            $newAnswer->setAnswer($value);
            $newAnswer->setQuestions($newQuestion);
    }
    }
}
class TestForms
{
    public function addFormstoBD($manager, $posts)
    {
        $testArray = array();
        $newTest = new Tests();
        $newTest ->setNameTest('TestsForms');
        $newTest->setTitle('Тестируем добавление с формы');
        $manager->persist($newTest);
        $questionTumbler = null;
        //________________________________________________



        foreach ($posts as $post=>$value)
        {


            if (preg_match('/question([0-9])/', $post))
            {
                $newQuestion = new Question();
                $newQuestion->setQuestion($value);
                $newQuestion->setTests($newTest);
                $newQuestion->setPoint(10);
                 $manager->persist($newQuestion);
            }
            else
            {
                $newAnswer = new Answer();
                $newAnswer->setAnswer($value);
                $newAnswer->setCorrect(true);
                $newAnswer->setQuestions($newQuestion);
                $manager->persist($newAnswer);




                           }


                $manager->flush();


        }

    }
}