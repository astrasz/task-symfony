<?php

namespace App\Controller;

use App\Entity\User;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {
        $usersData = $this->getDoctrine()->getRepository(User::class)->findAll();
        
        $users = $paginator->paginate(
            $usersData,
            $request->query->getInt('page', 1),
            5
        );

        return $this->render('list/index.html.twig', [        
            'users' => $users,
        ]);
    }
}
