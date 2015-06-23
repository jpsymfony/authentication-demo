<?php

namespace AppBundle\User\Registration;

use AppBundle\Form\Handler\FormHandlerInterface;
use AppBundle\User\Manager\UserManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class RegistrationFormHandler implements FormHandlerInterface
{
    /**
     * @param UserManagerInterface $userManager
     */
    public function __construct(UserManagerInterface $userManager)
    {
        $this->usermanager = $userManager;
    }

    /**
     * @param FormInterface $form
     * @param Request       $request
     * @param array         $options
     *
     * @return bool
     */
    public function handle(FormInterface $form, Request $request, array $options = null)
    {
        $form->handleRequest($request);

        if (!$form->isValid()) {
            return false;
        }

        $this->usermanager->createUser($form->getData()->getUser());

        return true;
    }
} 
