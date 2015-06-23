<?php

namespace AppBundle\User\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\AppEvents;
use AppBundle\Entity\UserInterface;
use AppBundle\User\Manager\UserManagerInterface;
use AppBundle\Event\UserDataEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class UserManager implements UserManagerInterface
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @var EncoderFactoryInterface
     */
    protected $encoderFactory;

    /**
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    /**
     * @param ObjectManager            $manager
     * @param EncoderFactoryInterface  $encoderFactory
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(
        ObjectManager $manager,
        EncoderFactoryInterface $encoderFactory,
        EventDispatcherInterface $dispatcher
    ) {
        $this->objectManager = $manager;
        $this->encoderFactory = $encoderFactory;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param UserInterface $user
     *
     * @return UserInterface
     */
    public function createUser(UserInterface $user)
    {
        $user->encodePassword($this->encoderFactory->getEncoder($user));

        $this->persistAndFlushUser($user);

        $this->dispatcher->dispatch(
            AppEvents::NEW_ACCOUNT_CREATED,
            new UserDataEvent($user)
        );
    }

    /**
     * @param UserInterface $user
     */
    private function persistAndFlushUser(UserInterface $user)
    {
        $this->objectManager->persist($user);
        $this->objectManager->flush();
    }
} 
