<?php

namespace App\DataFixtures;

use App\Entity\Rubrique;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RubriqueFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $rubrique1 = new Rubrique();
        $rubrique1->setRubriqueName("Guitares et Basses")
            ->setRubriquePicture("CATEGORIES guitare.png");

        $rubrique2 = new Rubrique();
        $rubrique2->setRubriqueName("Micros")
            ->setRubriquePicture("CATEGORIES micro.png");

        $rubrique3 = new Rubrique();
        $rubrique3->setRubriqueName("Pianos")
            ->setRubriquePicture("CATEGORIES piano.png");

        $rubrique4 = new Rubrique();
        $rubrique4->setRubriqueName("Batteries")
            ->setRubriquePicture("CATEGORIES batterie.png");

        $rubrique5 = new Rubrique();
        $rubrique5->setRubriqueName("Saxophones")
            ->setRubriquePicture("CATEGORIES saxo.png");

        $rubrique6 = new Rubrique();
        $rubrique6->setRubriqueName("Cables")
            ->setRubriquePicture("CATEGORIES cable.png");

        $rubrique7 = new Rubrique();
        $rubrique7->setRubriqueName("Cases")
            ->setRubriquePicture("CATEGORIES cases.png");

        $rubrique8 = new Rubrique();
        $rubrique8->setRubriqueName("Sono")
            ->setRubriquePicture("CATEGORIES sono.png");

        $manager->persist($rubrique1);
        $manager->persist($rubrique2);
        $manager->persist($rubrique3);
        $manager->persist($rubrique4);
        $manager->persist($rubrique5);
        $manager->persist($rubrique6);
        $manager->persist($rubrique7);
        $manager->persist($rubrique8);

        $manager->flush();
    }
}
