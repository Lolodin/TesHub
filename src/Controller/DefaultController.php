<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 04.08.2018
 * Time: 16:53
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    /**
     * @\Sensio\Bundle\FrameworkExtraBundle\Configuration\Route("/news/{slug}")
     */

    public function show($slug)
    {
        return $this->render('standart/main.html.twig',
        [
            'title'=> ucwords(str_replace("_", " ", $slug)),
    ]);
    }

}