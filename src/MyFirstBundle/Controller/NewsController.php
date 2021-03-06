<?php

namespace MyFirstBundle\Controller;

use MyFirstBundle\Email\Email;
use MyFirstBundle\Entity\News;
use MyFirstBundle\Form\NewsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NewsController extends Controller
{
    /**
     * @Route("/", name="index")
     *
     * @Template()
     */
    public function indexAction()
    {
        //find all news
        $manager = $this->getDoctrine()->getManager();
        $repoNews = $manager->getRepository('MyFirstBundle:News');
        $news = $repoNews->findAll();

        return[

            'allNews' => $news,
        ];


    }

    /**
     * @Route("/editNews/{id}", name="editNews")
     *
     * @Template()
     */
    public function editNewsAction(Request $request, $id)
    {
        //get repository
        $manager = $this->getDoctrine()->getManager();
        $repository = $manager->getRepository('MyFirstBundle:News');
        $news = $repository->find($id);

        $form = $this->createForm(NewsType::class, $news);

        $form->handleRequest($request);

        if($form->isValid()){
            $news = $form->getData();
            $manager->persist($news);

            try{
                $manager->flush();
                return $this->redirect($this->generateUrl('index'));
            }
            catch(\Exception $e){
                var_dump($e->getMessage());die;
            }


        }

        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * @Route("deleteNews/{id}", name="deleteNews")
     * @param Request $request
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteNewsAction(Request $request, $id)
    {
        $manager = $this->getDoctrine()->getManager();
        $repository = $manager->getRepository('MyFirstBundle:News');

        $manager->remove($repository->find($id));

        try{
            $manager->flush();
            return  $this->redirect($this->generateUrl('index'));
        }
        catch(\Exception $e){
            var_dump($e);die;
        }

    }

    /**
     * @Route("/addNews", name="addNews")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Template()
     */
    public function addNewsAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();

        $form = $this->createForm(NewsType::class);

        $form->handleRequest($request);
        if($form->isValid()){
            $news = $form->getData();
            $manager->persist($news);

            try{
                $manager->flush();
            }
            catch(\Exception $e){
                var_dump($e->getMessage());
            }


            return $this->redirect($this->generateUrl('index'));
        }
        return [
            'form' =>$form->createView(),
        ];


    }

}
