<?php

namespace App\DataFixtures;
use App\Entity\Client;
use App\Entity\CompteClient;
use App\Entity\Adresse;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ClientFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr_FR');

        for ($p = 0; $p < 10; $p++) {
            $Client = new Client;
            $Client->setNom($faker->lastName);
            $Client->setPrenom($faker->firstName);
            $Client->setDatenaissance($faker->dateTimeThisCentury($max = 'now', $timezone = null));
            $Client->setTel('0661582396');
            $Client->setDate($faker->dateTimeThisDecade($max = 'now', $timezone = null));


            $compteClient=new CompteClient;
            $compteClient->setEmail($faker->safeEmail);
            $compteClient->setPassword($this->passwordEncoder->encodePassword($compteClient,'alexandra'));
            if(($p % 2)==1)
                 $compteClient->setRoles(['ROLE_ADMIN']);
            $Client->setCompteclient($compteClient);
           

            for ($c = 0; $c < mt_rand(1, 5); $c++) {
                $adresse = new Adresse;
                $adresse->setNumero($faker->buildingNumber);
                $adresse->setRue($faker->streetName);
                $adresse->setVille($faker->city);
                $adresse->setCodepostal($faker->postcode);
                $adresse->setPays('France');
                $Client->addAdresse($adresse);
            }

        $manager->persist($Client);     
        }   
     $manager->flush();
      
       
    }
}
