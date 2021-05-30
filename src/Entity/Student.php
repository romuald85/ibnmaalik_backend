<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\StudentRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le nom de l'élève est obligatoire")
     * @Assert\Length(min=2, minMessage="Le nom doit faire deux caractères minimum", max=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le prénom de l'élève est obligatoire")
     * @Assert\Length(min=3, minMessage="Le prénom doit faire trois caractères minimum", max=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="L'âge est obligatoire")
     * @Assert\Length(min=1, minMessage="L'âge doit faire un caractère minimum", max=2, maxMessage="L'âge doit faire deux caractères maximum")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le numéro de téléphone est obligatoire")
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="L'email est obligatoire")
     * @Assert\Email(message="Le format de l'email doit être valide")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le pays est obligatoire")
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le support est obligatoire")
     */
    private $support;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le type de session est obligatoire")
     */
    private $typeOfSession;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="La fréquence de cours est obligatoire")
     */
    private $hoursPerWeek;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ce champs est obligatoire")
     */
    private $prof;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ce champs est obligatoire")
     */
    private $findOurWebsite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getSupport(): ?string
    {
        return $this->support;
    }

    public function setSupport(string $support): self
    {
        $this->support = $support;

        return $this;
    }

    public function getTypeOfSession(): ?string
    {
        return $this->typeOfSession;
    }

    public function setTypeOfSession(string $typeOfSession): self
    {
        $this->typeOfSession = $typeOfSession;

        return $this;
    }

    public function getHoursPerWeek(): ?string
    {
        return $this->hoursPerWeek;
    }

    public function setHoursPerWeek(string $hoursPerWeek): self
    {
        $this->hoursPerWeek = $hoursPerWeek;

        return $this;
    }

    public function getProf(): ?string
    {
        return $this->prof;
    }

    public function setProf(string $prof): self
    {
        $this->prof = $prof;

        return $this;
    }

    public function getFindOurWebsite(): ?string
    {
        return $this->findOurWebsite;
    }

    public function setFindOurWebsite(string $findOurWebsite): self
    {
        $this->findOurWebsite = $findOurWebsite;

        return $this;
    }
}
