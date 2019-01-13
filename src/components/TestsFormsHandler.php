<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 09.10.2018
 * Time: 22:02
 */

namespace App\components;


class TestsFormsHandler
{

 static function addFormsToBD($test)

 {
     $questions = $test->getQuestion();
     $questionArray = array();
     foreach ($questions as $question)
     {   $countAnswer = 0;

         $arrayTest = array();
         $questionTitle = $question->getQuestion();
         $questionPoint = $question->getPoint();
         $arrayAnswers = $question->getAnswer();
         dump($arrayAnswers);
         $arrayTest["question"] = $questionTitle;
         $arrayTest["questionPoint"] = $questionPoint;

         foreach ($arrayAnswers as $answes)
         {
             $arrays = array();
             $answerTitle = $answes->getAnswer();
             $answerCorrect = $answes->getCorrect();
             $answerID = $answes->getId();
             $arrayTest["answers"]["answer".$countAnswer][] = $answerTitle;
             $arrayTest["answers"]["answer".$countAnswer][] = $answerCorrect;
             $arrayTest["answers"]["answer".$countAnswer][] = $answerID;
             $countAnswer++;


         }
         $questionArray[] = $arrayTest;

     }
     return $questionArray;

 }


}