<?php

namespace App\DataFixtures;

use App\Entity\Equipment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EquipmentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $ordis = new Equipment();
        $ordis->setName("Ordinateurs");
        $ordis->setQuantity(10);
        $ordis->setDescription("Mac ou Windows, ou même un ordi sous linux.");
        $ordis->setAvailableStock(7);
        $ordis->setAllowedDays(7);
        $ordis->setUid("Turing");
        $manager->persist($ordis);

        $chargeurs = new Equipment();
        $chargeurs->setUid("OnEstBranché");
        $chargeurs->setAllowedDays(1);
        $chargeurs->setAvailableStock(9);
        $chargeurs->setDescription("De quoi charger tous les types de téléphones");
        $chargeurs->setQuantity(20);
        $chargeurs->setName("Chargeurs de téléphone");
        $manager->persist($chargeurs);

        $manager->flush();
    }
}
