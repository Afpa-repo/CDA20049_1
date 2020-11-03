<?php

namespace App\DataFixtures;

use App\Entity\Employee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class EmployeeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        // on crée 4 employee avec noms "aléatoires" en français
        $employees = Array();
        for ($i = 0; $i < 4; $i++) {
            $employees[$i] = new Employee();
            $employees[$i]->setEmployeeName($faker->lastName);

            $manager->persist($employees[$i]);
        }
        $manager->flush();
    }
}
