<?php

namespace App\DataFixtures;

use App\Entity\Lodge;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LodgeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $lodge = new Lodge();
            //$lodge->setCities();
            $lodge->setTitle('lodge- '. $i);
            $lodge->setDescription('description- '. $i);
            $lodge->setPicture('http://picsum.photos/id/<numberBetween(360,1024)>/230/160');
            $lodge->setAnimal('false');
            $lodge->setAnimalCost(mt_rand(10, 100));
            $lodge->setHighSeasonPrice(mt_rand(10, 100));
            $lodge->setLowSeasonPrice(mt_rand(10, 100));
            $lodge->setLocation('location-'. $i);
            $lodge->setArea(mt_rand(10, 100));
            $lodge->setBed(mt_rand(10, 100));
            $lodge->setBedroom(mt_rand(10, 100));
            $manager->persist($lodge);
        }


        $manager->flush();
    }
}
