<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = ['DIY','Healthy','Food'];
        $persistedCategories = [];
        foreach($categories as $category)
        {
            $cat = (new Category())
            ->setLabel($category);

            $manager->persist($cat);

            $persistedCategories[] = $cat;
        }

        $manager->flush();

        for($i = 0;$i < 50;$i++)
        {
            $article = (new Article())
            ->setTitle('Article n°' . $i)
            ->setContent('lorem ipsum dolor sit amet')
            ->setCategory($persistedCategories[array_rand($persistedCategories)]);

            $manager->persist($article);
        }


        $manager->flush();
    }
}
