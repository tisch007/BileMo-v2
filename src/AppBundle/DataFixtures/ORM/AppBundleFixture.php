<?php

// src/DataFixtures/AppFixtures.php
namespace AppBundle\DataFixtures;

use AppBundle\Entity\Mobilephone;
use AppBundle\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 45; $i++) {
            $product = new Mobilephone();
            $product->setBrand('Samsung');
            $product->setModel('Galaxie S'.$i);
            $product->setDescription('Le meilleur du téléphone pour BileMo');
            $product->setColor('Black');
            $product->setCapacity('32 GO');
            $product->setPrice(mt_rand(250, 999));
            $manager->persist($product);
        }

        $userManager = $this->container->get('fos_user.user_manager');
        for ($i = 0; $i < 11; $i++) {

            $user = $userManager->createUser();
            $user->setUsername('User'.$i);
            $user->setEmail('user'.$i.'@gmail.com');
            $user->setEnabled(true);
            $user->setPlainPassword('azerty');
            $userManager->updateUser($user, true);
            $manager->persist($user);
        }

        $manager->flush();
    }
}