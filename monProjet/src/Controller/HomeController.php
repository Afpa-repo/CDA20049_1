<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 * @method render(string $string, array $array)
 */
class HomeController extends AbstractController {
    /**
     * @Route("/", name="home")
     */
    pubic function index() :Response
    {
        // affichage de la page d'accueil
        return $this->render('home/index.html.twig');
    }
}
?>