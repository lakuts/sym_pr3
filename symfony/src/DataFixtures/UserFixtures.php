<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
     private $passwordHasher;

     public function __construct(UserPasswordHasherInterface $passwordHasher)
     {
         $this->passwordHasher = $passwordHasher;
     }
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('lakuts@mail.ru');
        $user->setPassword($this->passwordHasher->hashPassword($user, '12345'));
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);
        $manager->flush();

        $user1 = new User();
        $user1->setEmail('user1@mail.ru');
        $user1->setPassword($this->passwordHasher->hashPassword($user, '12345'));
        $user1->setRoles(['ROLE_USER']);
        $manager->persist($user1);
        $manager->flush();
    }
}
