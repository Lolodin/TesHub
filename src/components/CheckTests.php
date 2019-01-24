<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 12.01.2019
 * Time: 14:05
 */

namespace App\components;


class CheckTests
{
    private $score;
    public function checkUP($checkedArray)
    {

        $a= (boolean)true;
        foreach ($checkedArray as $check)
        {
            $a = $a && $check;
        }
        return (boolean)$a;

    }
    public function setScore($score)
    {
        $this->score = $score;
    }

    public function getScore()
    {
        return $this->score;
    }

//$testArr = Отправлен с клиента; checkArr = Сохранен в Ссесии
    public function computedScore($post, $ssesions)
    {

        $questionID = 0;
foreach ($post as $item)
{


    $checkArray = array();
    if (empty($ssesions['question'.$questionID]['questionPoint'])===false) {
        $score = $ssesions['question'.$questionID]['questionPoint'];
    }
    for ($i=0;$i<count($item);$i++)
    {

        $a = $item[$i];
        $checkArray[]=$ssesions['question'.$questionID][$a];

    }
    unset($ssesions['question'.$questionID]['questionPoint']);
     $postSum    =   array_sum($checkArray);
     $ssesionSum =   array_sum($ssesions['question'.$questionID]);

     if ($this->checkUP($checkArray))
     {
         $this->setScore($this->getScore() + $score);
     }
     else
     {
         $this->setScore($this->getScore() + 0);
     }
     $questionID++;
}




        }
    }
