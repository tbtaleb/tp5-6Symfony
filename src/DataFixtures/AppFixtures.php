<?php

namespace App\DataFixtures;
use App\Factory\EtudiantFactory;
use App\Factory\InstitueFactory;
use App\Factory\GroupeFactory;
use App\Factory\UtilisateurFactory;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        EtudiantFactory::createMany(10);
        InstitueFactory::createMany(10);
        GroupeFactory::createMany(10);
        UtilisateurFactory::createMany(10);
        $manager->flush();
    }
}
