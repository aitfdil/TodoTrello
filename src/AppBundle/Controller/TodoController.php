<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Todolist;
use AppBundle\Form\todoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TodoController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        $boards = $this->get('doctrine.orm.entity_manager')->getRepository('AppBundle:Todolist')->findAll();

        return $this->render('todo/list.html.twig', [
            'todo' => $boards,
        ]);
    }

    /**
     * @Route("/todo/add", name="todo_add")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(todoType::class);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $board = $form->getData();

            $manager = $this->get('doctrine.orm.entity_manager');
            $manager->persist($board);
            $manager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('todo/add.html.twig', [
            'todo_form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/todo/{id}", name="todo_view", requirements={"id": "\d+"})
     *
     * @param Todolist $todo
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Todolist $todo, Request $request)
    {
        return $this->render('todo/view.html.twig', [
            'todo' => $todo,
        ]);
    }
}
