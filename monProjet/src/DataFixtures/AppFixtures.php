<?php

namespace App\DataFixtures;

use App\Entity\Categorietva;
use App\Entity\Customers;
use App\Entity\Employee;
use App\Entity\Products;
use App\Entity\Rubrique;
use App\Entity\Suppliers;
use App\Entity\Supplierstype;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        //to use faker to fill database in with fake data :
        $faker = \Faker\Factory::create('fr_FR');

        //to create items of class supplierstype :

        $constructeur = new Supplierstype();
        $constructeur->setSupplierstypeName("Constructeur");
        $importateur = new Supplierstype();
        $importateur->setSupplierstypeName("Importateur");

        $manager->persist($constructeur);
        $manager->persist($importateur);

        //to create suppliers items : I make 5 suppliers for each supplierstype :
        for ($h=1; $h<6; $h++){
            $supplier = new Suppliers();
            $supplier->setSuppliersName($faker->company)
                ->setSuppliersAddress($faker->streetAddress)
                ->setSuppliersCity($faker->city)
                ->setSuppliersPhone($faker->phoneNumber)
                ->setSuppliersZipcode($faker->postcode)
                ->setSupplierstype($constructeur);
            $manager->persist($supplier);
        }
        for ($h=1; $h<6; $h++){
            $supplier = new Suppliers();
            $supplier->setSuppliersName($faker->company)
                ->setSuppliersAddress($faker->streetAddress)
                ->setSuppliersCity($faker->city)
                ->setSuppliersPhone($faker->phoneNumber)
                ->setSuppliersZipcode($faker->postcode)
                ->setSupplierstype($importateur);
            $manager->persist($supplier);
        }

        //to create items of class categorietva :
        $catparticulier = new Categorietva();
        $catparticulier->setCategorietvaCoefficient("0.20")
            ->setCategorietvaNom("Particuliers");

        $catpro = new Categorietva();
        $catpro->setCategorietvaCoefficient("0.10")
            ->setCategorietvaNom("Professionnels");

        $manager->persist($catparticulier);
        $manager->persist($catpro);

        //to create items of class employee : on crée 4 employee avec noms "aléatoires" en français

        for ($i = 0; $i < 4; $i++) {
            $employee = new Employee();
            $employee->setEmployeeName($faker->name);

            $manager->persist($employee);

            //for each employee I make 10 customers :
            for($g = 0; $g<10; $g++){
                $customer = new Customers();
                $customer->setCustomersName($faker->name)
                    ->setCustomersAddress($faker->streetAddress)
                    ->setCustomersCity($faker->city)
                    ->setCustomersZipcode($faker->postcode)
                    ->setCustomersPhone($faker->phoneNumber)
                    ->setCategorietva($catparticulier)
                    ->setEmployee($employee);
                $manager->persist($customer);
            }

        }

        //to create the main product rubriques :

        $guitare = new Rubrique();
        $guitare->setRubriqueName("Guitares et Basses")
            ->setRubriquePicture("CATEGORIES guitare.png");

        $micro = new Rubrique();
        $micro->setRubriqueName("Micros")
            ->setRubriquePicture("CATEGORIES micro.png");

        $piano = new Rubrique();
        $piano->setRubriqueName("Pianos")
            ->setRubriquePicture("CATEGORIES piano.png");

        $batterie = new Rubrique();
        $batterie->setRubriqueName("Batteries")
            ->setRubriquePicture("CATEGORIES batterie.png");

        $saxo = new Rubrique();
        $saxo->setRubriqueName("Saxophones")
            ->setRubriquePicture("CATEGORIES saxo.png");

        $cable = new Rubrique();
        $cable->setRubriqueName("Cables")
            ->setRubriquePicture("CATEGORIES cable.png");

        $case = new Rubrique();
        $case->setRubriqueName("Cases")
            ->setRubriquePicture("CATEGORIES cases.png");

        $sono = new Rubrique();
        $sono->setRubriqueName("Sono")
            ->setRubriquePicture("CATEGORIES sono.png");

        $manager->persist($guitare);
        $manager->persist($micro);
        $manager->persist($piano);
        $manager->persist($batterie);
        $manager->persist($saxo);
        $manager->persist($cable);
        $manager->persist($case);
        $manager->persist($sono);

        //pour les sous-rubriques de chaque rubrique principale : on veut 3 sous-rub pour chaque rubrique parent : voir comment factoriser pour éviter redondance?
        for ($j=1; $j<4; $j++){
            $sousrubrique = new Rubrique();
            $sousrubrique->setRubriqueName($faker->word())
                ->setRubriquePicture($faker->imageUrl())
                ->setParent($guitare);
            $manager->persist($sousrubrique);

            //to create 10 products in each sous- rubrique :
            for($m=1; $m<11; $m++){
                $product = new Products();
                $product->setProductsName('Produit n°'.$m)
                    ->setProductsDescription($faker->sentence())
                    ->setProductsStock($faker->randomNumber())
                    ->setProductsStatus($faker->boolean)
                    ->setProductsPrice($faker->numerify())
                    ->setProductsPicture($faker->imageUrl())
                    ->setRubrique($sousrubrique);
                $manager->persist($product);
            }
        }
        for ($k=1; $k<4; $k++){
            $sousrubrique = new Rubrique();
            $sousrubrique->setRubriqueName($faker->word())
                ->setRubriquePicture($faker->imageUrl())
                ->setParent($piano);
            $manager->persist($sousrubrique);

            //to create 10 products in each sous- rubrique :
            for($m=1; $m<11; $m++){
                $product = new Products();
                $product->setProductsName('Produit n°'.$m)
                    ->setProductsDescription($faker->sentence())
                    ->setProductsStock($faker->randomNumber())
                    ->setProductsStatus($faker->boolean)
                    ->setProductsPrice($faker->numerify())
                    ->setProductsPicture($faker->imageUrl())
                    ->setRubrique($sousrubrique);
                $manager->persist($product);
            }
        }
        for ($l=1; $l<4; $l++){
            $sousrubrique = new Rubrique();
            $sousrubrique->setRubriqueName($faker->word())
                ->setRubriquePicture($faker->imageUrl())
                ->setParent($saxo);
            $manager->persist($sousrubrique);

            //to create 10 products in each sous- rubrique :
            for($m=1; $m<11; $m++){
                $product = new Products();
                $product->setProductsName('Produit n°'.$m)
                    ->setProductsDescription($faker->sentence())
                    ->setProductsStock($faker->randomNumber())
                    ->setProductsStatus($faker->boolean)
                    ->setProductsPrice($faker->numerify())
                    ->setProductsPicture($faker->imageUrl())
                    ->setRubrique($sousrubrique);
                $manager->persist($product);
            }
        }

        //TODO 051120 :
        //purchases need suppliers and products
        //totalorder needs customers
        //orderdetail needs totalorder and products
        //delivery needs customers and orderdetail

        $manager->flush();
    }
}
