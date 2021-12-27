<?php

namespace App\DataFixtures;

use App\Entity\Borrowing;
use App\Entity\Equipment;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public const LEBERTNOEL = "leBertNoel";
    public const MRLAMBDA = "mrLambda";
    public const USERNAME = "username";

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
        $this->addReference(self::LEBERTNOEL, $user1);

        $user2 = new User();
        $user2->setUsername("MrLambda");
        $user2->setEmail("jdoe@gmail.fr");
        $user2->setPassword("LambdaCarré");
        $user2->setFirstName("John");
        $user2->setLastName("Doe");
        $user2->setRoles(["membre"]);
        $user2->setUid("91011121");
        $manager->persist($user2);
        $this->addReference(self::MRLAMBDA, $user2);

        $user3 = new User();
        $user3->setUsername("Username");
        $user3->setEmail("monemail@gmail.fr");
        $user3->setPassword("MeMyself&I");
        $user3->setFirstName("Assane");
        $user3->setLastName("Diouf");
        $user3->setRoles(["membre", "admin", "prêteur"]);
        $user3->setUid("31415161");
        $manager->persist($user3);
        $this->addReference(self::USERNAME, $user3);

        $manager->flush();
    }
}
