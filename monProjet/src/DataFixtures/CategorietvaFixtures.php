<?php

namespace App\DataFixtures;

use App\Entity\Categorietva;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategorietvaFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categorie1 = new Categorietva();
        $categorie1->setCategorietvaCoefficient("0.20")
            ->setCategorietvaNom("Particuliers");

        $categorie2 = new Categorietva();
        $categorie2->setCategorietvaCoefficient("0.10")
            ->setCategorietvaNom("Professionnels");

        $categorie3 = new Categorietva();
        $categorie3->setCategorietvaCoefficient("0.05")
            ->setCategorietvaNom("Réduit");

        $manager->persist($categorie1);
        $manager->persist($categorie2);
        $manager->persist($categorie3);

        $manager->flush();
    }
}
