<?php

namespace App\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class RegistrationListener implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {

        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess',
        );

    }

    public static function onRegistrationSuccess(FormEvent $event)
    {

        $roles = array('ROLE_USER');
        $user = $event->getForm()->getData();
        $user->setRoles($roles);

    }

}
