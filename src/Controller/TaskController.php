<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Task;

// Je créé un préfixe de route : toutes les routes de ce contrôleur vont commencer par /task
#[Route('/task')]
final class TaskController extends AbstractController
{
    #[Route('/', name: 'app_task')]
    public function index(EntityManagerInterface $em): Response
    {
        $repo = $em->getRepository(Task::class);
        return $this->render('task/index.html.twig', [
            'tasks' => $repo->findAll()
        ]);
    }

    #[Route('/{id}', name: 'app_task_show')]
    public function show(int $id, EntityManagerInterface $em): Response
    {
        $repo = $em->getRepository(Task::class);
        return $this->render('task/show.html.twig', [
            'task' => $repo->find($id)
        ]);
    }


}
