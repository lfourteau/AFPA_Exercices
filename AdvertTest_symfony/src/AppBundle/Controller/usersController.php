<?php

namespace AppBundle\Controller;

use AppBundle\Entity\users;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


/**
 * Advert controller.
 *
 */
class usersController extends Controller
{
    public function loadUserFormAction(Request $request) {
        $user = new users();
        $user->setRoles(array('ROLE_USER'));
        
        $userform = $this->createForm('AppBundle\Form\usersType', $user);          
        $userform->handleRequest($request);               
            if ($userform->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();                           
                return $this->redirectToRoute('advert_listing', array(
                    'id' => $user->getId() 
                ));
            }
            
        return $this->render('userBundleView/registerPage.html.twig', array(
            'userForm' => $userform->createView()
        ));
    }
    
}