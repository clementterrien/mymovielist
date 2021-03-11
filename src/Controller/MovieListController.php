<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Entity\Movielist;
use App\Form\CreateMovieListType;
use App\Repository\UserRepository;
use App\Repository\MovieListRepository;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MovieListController extends AbstractController
{
    /**
     * @Route("/mylists", name="showmylists")
     */
    public function showMyLists(MovieListRepository $repo)
    {
        $user = $this->getUser();
        $user_lists = $repo->findAll();

        return $this->render('movie_lists/show-lists.html.twig', [
            'lists' => $user_lists
        ]);
    }

    /**
     * @Route("/newMovieList", name="newMovieList")
     */
    public function createMovieList(UserRepository $user, Request $request)
    {
        $movie_list = new MovieList();

        $manager = $this->getDoctrine()->getManager();

        $form = $this->createForm(CreateMovieListType::class, $movie_list);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $movie_list->setUser($user);

            $manager->persist($movie_list);
            $manager->flush();

            return $this->render('movie_lists/create-movie-list.html.twig', [
                'form' => $form->createView()
            ]);
        }

        return $this->render('list/newMovieList.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/mylist/{id}", name="showlist")
     */

    public function showList(MovielistRepository $repo, $id, request $http_request)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');


        $movie_list = $repo->findOneBy(['id' => $id]);
        $movies = $movie_list->getMovies();

        if (($http_request->isMethod('get') && $http_request->query->get('movie') !== null)) {
            $list = $this->getDoctrine()->getRepository(Movielist::class)->findOneBy(['id' => $http_request->query->get('list')]);
            $movie = $this->getDoctrine()->getRepository(Movie::class)->findOneBy(['id' => $http_request->query->get('movie')]);

            $list->removeMovie($movie);
            $manager = $this->getDoctrine()->getManager();

            $manager->persist($list);
            $manager->remove($movie);
            $manager->flush();

            return $this->redirectToRoute('showlist', ['id' => $id]);
        }


        return $this->render('list/showlist.html.twig', [
            'movies' => $movies,
            'list' => $movie_list
        ]);
    }

    /**
     * @Route("/mylist/remove/{id}", name="removelist")
     */
    public function removeFromList(request $request, $id)
    {
        dump('hello');

        $list_id = '';
        return $this->redirectToRoute('showlist', ['id' => $id]);
        dump($currentRoute);
    }
}
