<?php

namespace App\DataFixtures;

use App\Entity\Borrowing;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BorrowingFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $userRepo = $this->getDoctrine()->getRository(User::class);
        $equipmentRepo = $this->getDoctrine()->getRepository(Equipment::class);

        $emprunt1 = new Borrowing();
        $emprunt1->setEquipment($equipmentRepo->findByName("Chargeurs de téléphone"));
        $emprunt1->setBorrowedBy($userRepo->findByUsername("MrLambda"));
        $emprunt1->setLendBy($userRepo->findByUsername("LeBertNoel"));
        $emprunt1->setAllowadDays(1);
        $emprunt1->setStartedOn(new \DateTime());
        $emprunt1->setEndedOn(new \DateTime());
        $manager->persist($emprunt1);

        $manager->flush();
    }
}
