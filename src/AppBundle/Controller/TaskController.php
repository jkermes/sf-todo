<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use AppBundle\Form\TaskType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("task")
 */
class TaskController extends Controller
{
    /**
     * @Route("/", name="get_tasks")
     */
    public function getTasksAction()
    {
        $em = $this->get('doctrine')->getManager();

        $tasks = $em->getRepository('AppBundle:Task')->findAll();

        return $this->render('task/tasks.html.twig', array(
            'tasks' => $tasks
        ));
    }

    /**
     * @Route("/add", name="add_task")
     * @param Request $request
     */
    public function addTaskAction(Request $request)
    {
        $form = $this->createForm(TaskType::class, new Task());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
        }

        return $this->render(':task:add.html.twig',
            array('form' => $form->createView())
        );
    }
}
