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


class TestForms
{
    public function addFormstoBD($manager, $posts)
    {
        if (empty($posts))
        {
            return false;
        }

       $newTest = new Tests();
       $newTest ->setNameTest($posts['TestName']);
       $newTest->setTitle($posts['title']);
       $manager->persist($newTest);

        //________________________________________________



        foreach ($posts as $post=>$value)
        {


            if (preg_match('/question([0-9])/', $post))
            {
                $newQuestion = new Question();
                $newQuestion->setQuestion($value);
                $newQuestion->setTests($newTest);
                $newQuestion->setPoint(10);

            }
            elseif (preg_match('/score([0-9])/', $post))
            {
                $newQuestion->setPoint($value);
                $manager->persist($newQuestion);
            }
            elseif(preg_match('/([0-9])answer([0-9])/', $post))
            {
                $newAnswer = new Answer();
                $newAnswer->setAnswer($value[0]);
                $newAnswer->setQuestions($newQuestion);
                if (empty($value[1]))
                {
                    $newAnswer->setCorrect(false);
                }
                else
                {
                    $newAnswer->setCorrect(true);
                }
                $manager->persist($newAnswer);

            }


                $manager->flush();


        }

    }
}