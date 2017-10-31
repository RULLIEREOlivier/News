<?php

namespace MyFirstBundle\Controller;

use MyFirstBundle\Entity\Travel;
use MyFirstBundle\Form\TravelType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TravelController extends Controller
{
    /**
     * @Route("/indexTravel", name="indexTravel")
     *
     * @Template()
     */
    public function indexTravelAction()
    {
        //find all Travel
        $manager = $this->getDoctrine()->getManager();
        $repoTravel = $manager->getRepository('MyFirstBundle:Travel');
        $travel = $repoTravel->findAll();

        return[
            'allTravel' => $travel,
        ];
    }

    /**
     * @Route("/editTravel/{id}", name="editTravel")
     *
     * @Template()
     */
    public function editTravelAction(Request $request, $id)
    {
        //get repository
        $manager = $this->getDoctrine()->getManager();
        $repository = $manager->getRepository('MyFirstBundle:Travel');
        $travel = $repository->find($id);

        $form = $this->createForm(TravelType::class, $travel);

        $form->handleRequest($request);

        if($form->isValid()){
            $travel = $form->getData();
            $manager->persist($travel);

            try{
                $manager->flush();
                return $this->redirect($this->generateUrl('indexTravel'));
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
     * @Route("/deleteTravel/{id}", name="deleteTravel")
     * @param Request $request
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteTravelAction(Request $request, $id)
    {
        $manager = $this->getDoctrine()->getManager();
        $repository = $manager->getRepository('MyFirstBundle:Travel');

        $manager->remove($repository->find($id));

        try{
            $manager->flush();
            return  $this->redirect($this->generateUrl('indexTravel'));
        }
        catch(\Exception $e){
            var_dump($e);die;
        }

    }

    /**
     * @Route("/addTravel", name="addTravel")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Template()
     */
    public function addTravelAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $form = $this->createForm(TravelType::class);

        $form->handleRequest($request);
        if($form->isValid()){
            $travel = $form->getData();
            $manager->persist($travel);

            try{
                $manager->flush();
            }
            catch(\Exception $e){
                var_dump($e->getMessage());
            }


            return $this->redirect($this->generateUrl('indexTravel'));
        }
        return [
            'form' =>$form->createView(),
        ];


    }
}