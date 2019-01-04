<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 04.08.2018
 * Time: 16:53
 */

namespace App\Controller;


use App\components\TestForms;
use App\components\TestsFormsHandler;
use App\Entity\Answer;
use App\Entity\Category;
use App\Entity\Categorys;
use App\Entity\Product;
use App\Entity\Question;
use App\Entity\Task;
use App\Entity\Tests;
use Doctrine\ORM\Query\Expr\Select;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\QuestionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TestsType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    /**
     * @\Sensio\Bundle\FrameworkExtraBundle\Configuration\Route("/news")
     */

    public function show()
    {


            return $this->render('standart/main.html.twig');




    }

    /**
     * @\Sensio\Bundle\FrameworkExtraBundle\Configuration\Route("/")
     */
    public function homePage()


    {


    }

    /**
     * @Route("/new")
     */
public function newtestform()
{

    dump($_POST);
   $manager = $this->getDoctrine()->getManager();
   $formHandler= new TestForms();
   $formHandler->addFormstoBD($manager, $_POST);
    return $this->render('standart/test.html.twig');

}


    /**
     * @Route("/tests")
     */
    public function Test()
    {
        $test = array();
        $repository = $this->getDoctrine()->getRepository(Tests::class);
        $test = $repository->findAll();
        
        return $this->render('standart/tets1.html.twig', ['tests'=> $test]);

    }
    /**
     * @Route("/tests/{id}")
     */
    public function TestID($id)
    {
        $repository = $this->getDoctrine()->getRepository(Tests::class);
        $test = $repository->find($id);


        dump($test);

      $arrrrr = TestsFormsHandler::addFormsToBD($test);
      dump($arrrrr);
       $arrrrA = json_encode($arrrrr, JSON_HEX_QUOT|JSON_HEX_APOS|JSON_HEX_AMP);
dump($arrrrA);

        return $this->render('standart/comesTest.html.twig',['test'=> $test, 'json'=>$arrrrA]);
    }

    /**
     * @Route("/mypage")
     */
    public function myPage()
    {
        return $this->render('standart/main.html.twig');
    }

}