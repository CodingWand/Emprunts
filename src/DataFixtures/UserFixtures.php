<?php

namespace App\DataFixtures;

use App\Entity\Borrowing;
use App\Entity\Equipment;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public const USER0 = "0";
    public const USER1 = "1";
    public const USER2 = "2";

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }


    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create("fr_FR");

        //Utilisateurs

        for($i = 0; $i < 100; $i++) {
            $user = new User();
            $user->setUid($faker->uuid());
            $user->setEmail($faker->email());
            $user->setPassword($this->passwordEncoder->encodePassword($user, $faker->word()));
            $user->setUsername($faker->word());
            $user->setFirstName($faker->firstName());
            $user->setLastName($faker->lastName())
            ->setRoles(["ROLE_USER"]);

            $this->addReference("$i", $user);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
