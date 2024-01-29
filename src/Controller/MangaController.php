<?php

namespace App\Controller;

use App\Entity\Manga;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MangaController extends AbstractController
{

    private $em;
    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    #[Route('/manga', name: 'manga', methods: ["GET", "HEAD"])]
    public function index(): Response
    {
        $repository = $this->em->getRepository(Manga::class);
        $mangas = $repository->findAll();

        dd($mangas);

        return $this->json([
            "data" => []
        ]);
    }
}
