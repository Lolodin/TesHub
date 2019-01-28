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
        $score = 0;
       $validPostArray = array_intersect_key($post,$ssesions);


        foreach ($validPostArray as $key=>$value)
        {
            $checkArray =[];
            $sesionKey = $post[$key];

            $score = $ssesions[$key]['questionPoint'];
            for ($i=0;$i<count($sesionKey);$i++)
            {
                $checkArray[] = $ssesions[$key][$sesionKey[$i]];
            }

            if ($this->checkUP($checkArray))
            {
                $this->setScore($this->getScore() + $score);
            }
            else
            {
                $this->setScore($this->getScore() + 0);
            }

        }
    }
    }
