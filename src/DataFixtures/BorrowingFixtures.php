<?php

namespace App\DataFixtures;

use App\Entity\Borrowing;
use App\DataFixtures\EquipmentFixtures;
use App\DataFixtures\UserFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BorrowingFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $chargeurs = $this->getReference(EquipmentFixtures::CHARGEUR);
        $ordis = $this->getReference(EquipmentFixtures::ORDI);

        $user1 = $this->getReference(UserFixtures::LEBERTNOEL);
        $user2 = $this->getReference(UserFixtures::MRLAMBDA);
        $user3 = $this->getReference(UserFixtures::USERNAME);

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

    public function getDependencies()
    {
        return [UserFixtures::class, EquipmentFixtures::class];
    }
}
