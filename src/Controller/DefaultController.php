<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 04.08.2018
 * Time: 16:53
 */

namespace App\Controller;


use App\components\CheckTests;
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
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class DefaultController extends AbstractController
{



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
        $test = [];
        $repository = $this->getDoctrine()->getRepository(Tests::class);
        $test = $repository->findAll();
        dump($test);
        return $this->render('standart/tets1.html.twig', ['tests'=> $test]);

    }
    /**
     * @Route("/tests/{id}")
     */
    public function TestID($id)
    {

        $repository = $this->getDoctrine()->getRepository(Tests::class);
        $test = $repository->find($id);



        session_start();
      $arrrrr = TestsFormsHandler::addFormsToBD($test);


      dump($_SESSION['test']);
       $arrrrA = json_encode($arrrrr, JSON_HEX_QUOT|JSON_HEX_APOS|JSON_HEX_AMP);


        return $this->render('standart/comesTest.html.twig',['test'=> $test, 'json'=>$arrrrA]);
    }

    /**
     * @Route("/")
     */
    public function myPage()
    {
        return $this->render('standart/main.html.twig');
    }

    /**
     * @Route("/testHandler")
     */
    public function testHandler()
    {

        session_start();

if (isset($_SESSION['test'])) {
    $a = $_SESSION['test'];
     $checkTest = new CheckTests();
    $checkTest->computedScore($_POST, $a);
    return new Response(json_encode($checkTest->getScore()));

}
else
    {

    return new Response(json_encode($_POST));
}
    }

    protected function createAccessDeniedException(string $message = 'Access Denied.', \Exception $previous = null): AccessDeniedException
    {
        return $this->render('@Twig/Exception/error.notFound.twig');
    }
}

