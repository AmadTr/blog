<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BlogFixtures extends Fixture{

    public function load(ObjectManager $manager): void{

        $faker= \Faker\Factory::create('fr-FR');
        // Generation de categories
        // ************************
        for ($c=0; $c < rand(1,3); $c++) { 

            $cat = new Category();
            $cat->setTitle($faker->word()); //nom de la cat = 1 mot
            $cat->setDescription($faker->sentence(5,true));
            $manager->persist($cat);
    
            // Génération des article
            // **********************
            for ($a=0; $a < rand(1,3); $a++) {   

                $art = new Article();
                $art->setTitle($faker->sentence(5,true));
                $art->setContent($faker->paragraph(4,true));
                $art->setCategory($cat);
                $manager->persist($art);
                
                //Génération des comments
                for ($i=0; $i < rand(1,3); $i++) {   

                    $com = new Comment();
                    $com->setArticle($art);
                    $com->setAuteur($faker->name());
                    $com->setRemark($faker->paragraph(4,true));
                    $manager->persist($com);
                }
            }   
        $manager->flush();
        }
    }
}    
        
