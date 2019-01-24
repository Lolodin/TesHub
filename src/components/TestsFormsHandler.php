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
     $checkArray    = array();
     $testsAnswer = 0;
     foreach ($questions as $question)
     {   $countAnswer = 0;

         $arrayTest     = array();

         $supportArray  = array();
         $questionTitle = $question->getQuestion();
         $questionPoint = $question->getPoint();
         $arrayAnswers  = $question->getAnswer();

         $arrayTest["question"]      = $questionTitle;
         $arrayTest["questionPoint"] = $questionPoint;
         $arrayTest["questionID"]    = $question->getId();

         $supportArray['questionPoint']= $questionPoint;

         foreach ($arrayAnswers as $answes)
         {

             $answerTitle   = $answes->getAnswer();
             $answerCorrect = $answes->getCorrect();
             $answerID      = $answes->getId();



             $supportArray[$answerID]= $answerCorrect;


             $arrayTest["answers"]["answer".$countAnswer][] = $answerTitle;
             $arrayTest["answers"]["answer".$countAnswer][] = $answerCorrect;
             $arrayTest["answers"]["answer".$countAnswer][] = $answerID;
             $countAnswer++;


         }
         $questionArray[] = $arrayTest;
         $checkArray['question'.$testsAnswer]=$supportArray;

          $testsAnswer++;

     }

     $_SESSION['test'] = $checkArray ;
     return $questionArray;

 }


}