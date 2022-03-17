<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Article;

class BlogFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker= \Faker\Factory::create('fr-FR');

        for ($i=0; $i < 10; $i++) { 
            
            $art = new Article();
            $art->setTitle($faker->sentence(5,true));
            $art->setContent($faker->paragraph(4,true));

            $manager->persist($art);
            $manager->flush();
        }

        $manager->flush();
    }
}
