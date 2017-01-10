<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Advert;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


/**
 * Advert controller.
 *
 */
class AdvertController extends Controller
{
    /**
     * Lists all advert entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $adverts = $em->getRepository('AppBundle:Advert')->findAll();

        return $this->render('advert/index.html.twig', array(
            'adverts' => $adverts,
        ));
    }

    /**
     * Creates a new advert entity.
     *
     */
    public function newAction(Request $request)
    {
        $advert = new Advert();
        $form = $this->createForm('AppBundle\Form\AdvertType', $advert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($advert);
            $em->flush($advert);

            return $this->redirectToRoute('advert_show', array('id' => $advert->getId()));
        }

        return $this->render('advert/new.html.twig', array(
            'advert' => $advert,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a advert entity.
     *
     */
    public function showAction(Advert $advert)
    {
        $deleteForm = $this->createDeleteForm($advert);

        return $this->render('advert/show.html.twig', array(
            'advert' => $advert,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing advert entity.
     *
     */
    public function editAction(Request $request, Advert $advert)
    {
        $deleteForm = $this->createDeleteForm($advert);
        $editForm = $this->createForm('AppBundle\Form\AdvertType', $advert);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('advert_edit', array('id' => $advert->getId()));
        }

        return $this->render('advert/edit.html.twig', array(
            'advert' => $advert,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a advert entity.
     *
     */
    public function deleteAction(Advert $advert)
    {       
            $em = $this->getDoctrine()->getManager();
            $em->remove($advert);
            $em->flush($advert);
              
        return $this->redirectToRoute('advert_selectBrandsModels');
    }

    /**
     * Creates a form to delete a advert entity.
     *
     * @param Advert $advert The advert entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Advert $advert)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('advert_delete', array('id' => $advert->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    /**

   * @Security("has_role('ROLE_USER')")

   */
    public function advertsFiltersAction(Request $request) {
        
            
        
        // Réccupération de brand_id depuis l'URL, renvoie "false si non transmis
        $brand_id = $request->get('brand_id');        
        // Réccupération de model_id depuis l'URL, renvoie "false si non transmis
        $model_id = $request->get('model_id');
        // Prédéfinition de l'objet models comme null
        $models = null;
        // Prédefinition de l'objet advert comme null
        $adverts = null;
        // Réccupération de l'entity manager
        $em = $this->getdoctrine()->getManager();
        
        //Réccupération de la liste de tous les modèles depuis la bdd
        $brands = $em->getRepository('AppBundle:Brands')->findAll();
        
        
        if ($brand_id) {            // S'il y a un brand_id d'envoyer via l'URL
            if (!$model_id) {       // Si le modèle n'a pas encore été défini 
                $models = $em->getRepository('AppBundle:Models')->findBy(       //Va chercher la liste des la liste des modèles correspondant à la marque depuis la BDD                                                                               
                array('brand' => $brand_id)
                );
                $adverts = $em->getRepository('AppBundle:Advert')->advertsByBrand($brand_id);
            }
            else {                  // Si le modèle est présent : lance la recherche des annonces liée à la marque et au modèle
                $adverts = $em->getRepository('AppBundle:Advert')->advertsByModelAndBrand($model_id);
                $models = $em->getRepository('AppBundle:Models')->findBy(       //Va chercher la liste des la liste des modèles correspondant à la marque depuis la BDD                                                                               
                array('brand' => $brand_id)
                );
            }
        }
        else {
            $adverts = $em->getRepository('AppBundle:Advert')->findAll();
        }
        
        
        //Création du formulaire d'ajout d'une nouvelle annonce
            $advert = new Advert();
            $advert->setDate(new \Datetime());
            $form = $this->createForm('AppBundle\Form\AdvertType', $advert);          
            $form->handleRequest($request);               
                if ($form->isValid()) {
                     $em = $this->getDoctrine()->getManager();
                    $em->persist($advert);
                    $em->flush();                           
                    return $this->redirectToRoute('advert_showAdverts', array(
                        'id' => $advert->getId() 
                    ));
                }             
            
        
        // Retourne les valeurs vers Twig
        return $this->render('advert/advertsHomePage.html.twig', array (
            'brands' => $brands,
            'brand_id' => $brand_id,
            'models' => $models,
            'model_id' => $model_id,
            'adverts' => $adverts,
            'form' => $form->createView()
        ));
        
    }
    
    
    public function classByAction(Request $request) {
        //Création du formulaire d'ajout d'une nouvelle annonce
            $advert = new Advert();
            $advert->setDate(new \Datetime());
            $form = $this->createForm('AppBundle\Form\AdvertType', $advert);          
            $form->handleRequest($request);               
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($advert);
                    $em->flush();                    
                    return $this->redirectToRoute('advert_showAdverts', array(
                        'id' => $advert->getId() 
                    ));
                }        
        $classValue = $request->get('classValue');
        $brand_id = $request->get('brand_id');
        $model_id = $request->get('model_id');
        $em = $this->getdoctrine()->getManager();
        $brands = $em->getRepository('AppBundle:Brands')->findAll();
        $models = $em->getRepository('AppBundle:Models')->findBy(                                    
                array('brand' => $brand_id)
                );
        $AdvertsclassByPrize = $em->getRepository('AppBundle:Advert')->advertsClassBy($classValue, $model_id);
        
        return $this->render('advert/advertsHomePage.html.twig', array (            
            'adverts' => $AdvertsclassByPrize,
            'brand_id' => $brand_id,
            'model_id' => $model_id,
            'brands' => $brands,
            'models' => $models,
            'form' => $form->createView()
        ));
       
    }

     
    public function openAdvertWindowAction(Request $request){
        $advertId = $request->get('id');
        $userId = $request->get('userId');
        $em = $this->getDoctrine()->getManager();
        //Réccupère l'annonce dans la BDD
        $advert = $em->getRepository('AppBundle:Advert')->findOneBy(
                array('id' => $advertId)
                );
               
        // Réccupère les informations de propriétaire de l'annonce dans la BDD
        $userInformations = $em->getRepository('AppBundle:users')->findOneBy(
                array('id' => $userId)
                );
        
        
        

        return $this->render('advert/fullPageAdvert.html.twig', array(
            'advert' => $advert,
            'userInformations' => $userInformations
        ));
        
        
    }
    
    
}


