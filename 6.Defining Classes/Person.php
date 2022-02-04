<?php

class Person 
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;


    /**
     * Person constructor
     * @param string $name
     * @param int age
     */
    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

}


class Family 
{
    /**
     * @var Person[]
     */
    private $members;

    /**
     * @var Person
     */
    private $oldestMember;


   
    public function __construct()
    {
        $this->members = [];
        $this->oldestMember = null;
    }


    public function addMember(Person $person): void
    {
        if(null === $this->oldestMember || $this->oldestMember->getAge() < $person->getAge()){
            $this->oldestMember = $person;
        }
        $this->members[] = $person;
    }

    public function getOldestMember(Person $person): Person
    {
        return $this->oldestMember;
    }

}