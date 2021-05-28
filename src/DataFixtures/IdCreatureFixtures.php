<?php

namespace App\DataFixtures;

use App\Entity\IdCreature;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class IdCreatureFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 4; $i++)
        {
            $creature = new IdCreature();
            $creature->setName('dragon '.$i);
            $creature->setDescription('Méchant Méchant');
            $creature->setImage('DragonBauxYB.jpg');
            $manager->persist($creature);
        }

        $manager->flush();
    }
}
