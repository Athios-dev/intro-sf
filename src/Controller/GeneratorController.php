<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GeneratorController extends AbstractController
{
    #[Route('/generator', name: 'app_generator')]
    public function index(): Response
    {
        $firstnames = ["toto", "tutu", "titi"];
        $randomFirstname = $firstnames[array_rand($firstnames)];
        return $this->json([ 'firstname' => $randomFirstname ]);
    }
}
