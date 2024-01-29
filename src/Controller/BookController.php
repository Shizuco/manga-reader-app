<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\Book;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\EntityManagerInterface;

class BookController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    #[Route('/api/books', name: 'books')]
    public function index(PaginatorInterface $paginator, Request $request): Response
    {

        //pagination example
        $repository = $this->em->getRepository(Book::class);
        $query = $repository->createQueryBuilder('p')
            ->getQuery();
        $books = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            1 // it might be 9
        );
        return $this->render('book/index.html.twig', [
            'data' => $books,
            'controller_name' => 'BookController'
        ]);
    }
}
