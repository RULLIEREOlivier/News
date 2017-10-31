<?php

namespace MyFirstBundle\Controller;

use MyFirstBundle\Email\Email;
use MyFirstBundle\Entity\Vehicule;
use MyFirstBundle\Form\VehiculeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class VehiculeController extends Controller
{
    /**
     * @Route("/indexVehicule", name="indexVehicule")
     *
     * @Template()
     */
    public function indexVehiculeAction()
    {
        $manager = $this->getDoctrine()->getManager();
        $repoVehicule = $manager->getRepository('MyFirstBundle:Vehicule');
        $vehicule = $repoVehicule->findAll();

        return[
            'allVehicules' => $vehicule,
        ];
    }

    /**
     * @Route("/addVehicule", name="addVehicule")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Template()
     */
    public function addVehiculeAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $form = $this->createForm(VehiculeType::class);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $vehicule = $form->getData();
            $manager->persist($vehicule);

            try {
                $manager->flush();
            } catch (\Exception $e) {
                var_dump($e->getMessage());
            }


            return $this->redirect($this->generateUrl('indexVehicule'));
        }
        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * @Route("deleteVehicule/{id}", name="deleteVehicule")
     * @param Request $request
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteVehiculeAction(Request $request, $id)
    {
        $manager = $this->getDoctrine()->getManager();
        $repository = $manager->getRepository('MyFirstBundle:Vehicule');

        $manager->remove($repository->find($id));

        try{
            $manager->flush();
            return  $this->redirect($this->generateUrl('indexVehicule'));
        }
        catch(\Exception $e){
            var_dump($e);die;
        }

    }
}