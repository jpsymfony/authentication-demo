<?php

namespace AppBundle\User\Registration;

use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Entity\User;

class Registration
{
    /**
     * @Assert\NotBlank()
     */
    private $username;

    /**
     * @Assert\NotBlank()
     */
    private $password;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        $user = new User();
        $user->setUsername($this->username);
        $user->setEmail($this->email);
        $user->setPlainPassword($this->password);
        $user->setIsActive(true);

        return $user;
    }
}
