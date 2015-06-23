<?php

namespace AppBundle\User\Manager;

use AppBundle\Entity\UserInterface;

interface UserManagerInterface
{
    /**
     * @param UserInterface $user
     *
     * @return void
     */
    public function createUser(UserInterface $user);
} 
