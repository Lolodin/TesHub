<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 27.08.2018
 * Time: 19:13
 */


$a = 0.01; //начальная ставка
$procent = 1.09; //процент
$i=0;
$masterI = 113;//серия
$totalSumma = 0;
for ($i;$i<$masterI;$i++)
{
    if ($i == 112)
    {
        $a = $a*0.2;
    }
    if ($i==150)
    {
        $a = $a*0.8;
    }
    else
    {
        $a = $a*$procent;
        if($a>42000)
        {
            $a=42000;
        }
        $totalSumma +=  $a;
    }
}
echo'Серия: '.$masterI;
echo '<br>';
echo'Депо: '.$totalSumma;
echo '<br>';
echo 'Последняя ставка: '.$a;
echo '<br>';
echo 'Выигрыш: '.$a*3; //умножени, сложность 5% = х18