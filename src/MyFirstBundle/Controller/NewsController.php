<?php

namespace MyFirstBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class NewsController extends Controller
{
    /**
     * @Route("/")
     *
     * @Template()
     */
    public function indexAction()
    {
        $manager = $this->getDoctrine()->getManager();
        $repoNews = $manager->getRepository('MyFirstBundle:News');
        $news = $repoNews->findAll();

        return[
            'allNews' => $news,
        ];
    }

    public function editNewsAction()
    {

    }

    public function deleteNewsAction()
    {

    }

    public function addNewsAction()
    {

    }
}
