<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Marque;
use App\Entity\Modele;
use App\Entity\Voiture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $marque1 = new Marque();
        $marque1->setLibelle("Citroën");
        $manager->persist($marque1);

        $marque2 = new Marque();
        $marque2->setLibelle("Ford");
        $manager->persist($marque2);

        $marque3 = new Marque();
        $marque3->setLibelle("Chevy");
        $manager->persist($marque3);

        $marque4 = new Marque();
        $marque4->setLibelle("Pontiac");
        $manager->persist($marque4);

        $modele1 = new Modele();
        $modele1->setLibelle("Traction 11")
                ->setImage("modele1.jpg")
                ->setprixMoyen(38000)
                ->setMarque($marque1);
        $manager->persist($modele1);

        $modele2 = new Modele();
        $modele2->setLibelle("T-RatRoad")
                ->setImage("modele2.jpg")
                ->setprixMoyen(32000)
                ->setMarque($marque2);
        $manager->persist($modele2);

        $modele3 = new Modele();
        $modele3->setLibelle("Cubana")
                ->setImage("modele3.jpg")
                ->setprixMoyen(27000)
                ->setMarque($marque3);
        $manager->persist($modele3);

        $modele4 = new Modele();
        $modele4->setLibelle("CV40")
                ->setImage("modele4.jpg")
                ->setprixMoyen(18700)
                ->setMarque($marque1);
        $manager->persist($modele4);

        $modele5 = new Modele();
        $modele5->setLibelle("Firebird Concept")
                ->setImage("modele5.jpg")
                ->setprixMoyen(22995)
                ->setMarque($marque4);
        $manager->persist($modele5);

        $modele6 = new Modele();
        $modele6->setLibelle("T14")
                ->setImage("modele6.jpg")
                ->setprixMoyen(72000)
                ->setMarque($marque1);
        $manager->persist($modele6);

        $modeles = [$modele1,$modele2,$modele3,$modele4,$modele5,$modele6];

        $faker = \Faker\Factory::create('fr_FR');
        foreach($modeles as $m) {
            $rand = rand(2,3);
            for($i=1; $i <= $rand; $i++) {
                $voiture = new Voiture();
                $voiture->setModele($m)
                        ->setImmatriculation($faker->regexify("[A-Z]{2}[0-9]{3,4}[A-Z]{2}"))
                        ->setNbPortes($faker->randomElement($array = array(2,3)))
                        ->setAnnee($faker->numberBetween($min = 1895, $max = 1980));
                $manager->persist($voiture);
            }
        }

        $manager->flush();
    }
}
