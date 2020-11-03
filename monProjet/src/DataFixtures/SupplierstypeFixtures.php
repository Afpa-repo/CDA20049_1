<?php

namespace App\DataFixtures;

use App\Entity\Supplierstype;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SupplierstypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $type1 = new Supplierstype();
        $type1->setSupplierstypeName("Constructeur");
        $type2 = new Supplierstype();
        $type2->setSupplierstypeName("Importateur");

        $manager->persist($type1);
        $manager->persist($type2);

        $manager->flush();
    }
}
