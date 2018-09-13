<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 04.08.2018
 * Time: 16:53
 */

namespace App\Controller;


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
     * @\Sensio\Bundle\FrameworkExtraBundle\Configuration\Route("/news/{slug}")
     */

    public function show($slug)
    {
        return $this->render('standart/main.html.twig',
        [
            'title'=> ucwords(str_replace("_", " ", $slug)),
    ]);

    }

    /**
     * @\Sensio\Bundle\FrameworkExtraBundle\Configuration\Route("/")
     */
    public function homePage()


    {
        $test = array();
        $repository = $this->getDoctrine()->getRepository(Tests::class);
        $test = $repository->findAll();

        dump($test);

        return $this->render('standart/home.html.twig', ['tests'=> $test]);

    }


    /**
     * @Route("/new")
     */

    public function testsForms(Request $request)
    {
        //  создаёт задачу и задаёт в ней фиктивные данные для этого примера
        $task = new Tests();
        $task->setNameTest('Write a name tests');
        $task->setTitle('Описание');
         $question = new Question();
        $question->setPoint(0);
        $question->setQuestion('Tests forms');
        $task->getQuestion()->add($question);
        $question->setTests($task);
        $answer = new Answer();
        $answer->setAnswer('Da');
        $answer->setCorrect(true);

        $answer2 = new Answer();
        $answer2->setCorrect(false);
        $answer2->getAnswer('Net');
        $question->getAnswer()->add($answer);
        $question->getAnswer()->add($answer2);
        $answer->setQuestions($question);
        $answer2->setQuestions($question);


        $form = $this->createForm(TestsType::class, $task);


        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
           $em = $this->getDoctrine()->getManager();
           $em->persist($answer2);
           $em->persist($answer);
           $em->persist($question);
           $em->persist($task);
           $em->flush();
        }

        return $this->render('standart/new.html.twig', array(
            'form' => $form->createView()

        ));

    }


    /**
     * @Route("/tests")
     */
    public function Test()
    {
//        $repository = $this->getDoctrine()->getRepository(Category::class);
////        $cat = $repository->find(4);
//       $testManager = $this->getDoctrine()->getManager();
//      $newTests = new Tests();
//      $newTests->setCategoryID($cat);
//      $newTests->setTitle('test');
//      $newTests->setNameTest('TESTSs');
//
////_____________________________________________________________
//       $newQuestion = new Question();
//       $newQuestion->setQuestion('Test?');
//       $newQuestion->setTests($newTests);
//       $newQuestion->setPoint(10);
//
////_____________________________________________________________
//        $newAnswer=new Answer();
//        $newAnswer->setCorrect(true);
//        $newAnswer->setAnswer('Da');
//        $newAnswer->setQuestions($newQuestion);
//
//        $newAnswer2 = new Answer();
//        $newAnswer2->setCorrect(false);
//        $newAnswer2->setAnswer('Net');
//        $newAnswer2->setQuestions($newQuestion);
//
//
//dump($newQuestion);
//dump($newTests);
//dump($newAnswer);
//        $testManager->persist($newTests);
//        $testManager->persist($newQuestion);
//        $testManager->persist($newAnswer);
//        $testManager->persist($newAnswer2);
//        $testManager->flush();

//_____________________________________________________________

$repository = $this->getDoctrine()->getRepository(Tests::class);
$tests= $repository->find(12);
$test = $tests->getQuestion()->getValues();
$answers = $test[0];
$a = $answers->getAnswer()->getValues();

dump($tests);
dump($test);
dump($answers);
dump($a);

    return new Response('Sohranili');

//       return $this->render('standart/tests.html.twig', ['tests'=>$tests]);


    }

}