<?php

namespace App\DataFixtures;

use App\Entity\Borrowing;
use App\Entity\Equipment;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Utilisateurs
        $user1 = new User();
        $user1->setUsername("LeBertNoel");
        $user1->setEmail("leBertNoel@pole-nord.fr");
        $user1->setPassword("LoutreDuCoin");
        $user1->setFirstName("Nicolas");
        $user1->setLastName("Bert");
        $user1->setRoles(["membre", "prêteur"]);
        $user1->setUid("12365678");
        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername("MrLambda");
        $user2->setEmail("jdoe@gmail.fr");
        $user2->setPassword("LambdaCarré");
        $user2->setFirstName("John");
        $user2->setLastName("Doe");
        $user2->setRoles(["membre"]);
        $user2->setUid("91011121");
        $manager->persist($user2);

        $user3 = new User();
        $user3->setUsername("Username");
        $user3->setEmail("monemail@gmail.fr");
        $user3->setPassword("MeMyself&I");
        $user3->setFirstName("Assane");
        $user3->setLastName("Diouf");
        $user3->setRoles(["membre", "admin", "prêteur"]);
        $user3->setUid("31415161");
        $manager->persist($user3);

        //Equipement
        $ordis = new Equipment();
        $ordis->setName("Ordinateur");
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
        $chargeurs->setName("Chargeur de téléphone");
        $manager->persist($chargeurs);

        //Relations
        $emprunt1 = new Borrowing();
        $emprunt1->setEquipment($chargeurs)
                 ->setLendBy($user1)
                 ->setBorrowedBy($user2)
                 ->setStartedOn(new \DateTime())
                 ->setEndedOn(\DateTime::createFromFormat("d/m/Y", "28/12/2021"))
                 ->setRemarks("Chargeur USB-C")
                 ->setAllowedDays(1);
        $manager->persist($emprunt1);

        $emprunt2 = new Borrowing();
        $emprunt2->setEquipment($ordis)
            ->setLendBy($user3)
            ->setBorrowedBy($user2)
            ->setStartedOn(\DateTime::createFromFormat("d/m/Y", "25/12/2021"))
            ->setEndedOn(new \DateTime())
            ->setAllowedDays(2);
        $manager->persist($emprunt2);

        $manager->flush();
    }
}
