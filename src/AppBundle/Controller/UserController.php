<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ChangePassword;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/account")
 */
class UserController extends Controller
{
    /**
     * @Route("/dashboard", name="user_dashboard")
     * @Method("GET|POST")
     */
    public function dashboardAction()
    {
        return $this->render('user/dashboard.html.twig');
    }

    /**
     * @Route("/change-password", name="change_password")
     * @Method("GET|POST")
     */
    public function changePasswordAction(Request $request)
    {
//        $data = new ChangePassword($this->getUser());
//        $form = $this->createForm('change_password', $data);
//        $form->handleRequest($request);
//
//        if ($form->isValid()) {
//            $handler = $this->get('app.credentials');
//            $handler->updateCredentials($data->getUser(), $data->getNewPassword());
//            $manager = $this->getDoctrine()->getManager();
//            $manager->flush();
//            $this->addFlash('success', 'Password has been changed successfully.');
//
//            return $this->redirectToRoute('change_password');
//        }
//
//        return $this->render('user/password.html.twig', [
//            'form' => $form->createView(),
//        ]);
    }
}
