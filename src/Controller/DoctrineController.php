<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 *
 * @Route("/doctrine")
 */
class DoctrineController extends AbstractController
{
    /**
     * @Route("/doctrine")
     */
    public function index()
    {
        return $this->render('doctrine/index.html.twig', [
            'controller_name' => 'DoctrineController',
        ]);
    }

    /**
     * localehost:8000/doctrine/user/2
     * @Route("/user/{id}", requirements={"id": "\d+"})
     */
    public function getOneUser(UserRepository $repository, $id)
    {
        $user = $repository->find($id);
        dump($user);
        return $this->render('doctrine/get_one_user.html.twig',
        [
            'user'=>$user
        ]
        );
    }

    /**
     * @Route("/users")
     */
    public function listUsers(UserRepository $repository)
    {
        $users=$repository->findAll();
        dump($users);
        return $this->render(
            'doctrine/list_users.html.twig',
            [
                'users'=>$users
            ]
        );
    }

    /**
     * @Route("/search-email")
     */
    public function searchEmail(Request $request, UserRepository $repository)
    {
        $twigVariables = [];
        if ($request->query->has('email')){
           $user =  $repository->findOneBy([
                'email'=>$request->query->get('email')
            ]);
           $twigVariables['user'] = $user;
        }
    return $this->render('doctrine/search_email.html.twig',
        $twigVariables

    );
    }
}
