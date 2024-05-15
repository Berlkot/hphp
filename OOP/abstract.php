<?php

abstract class HumanAbstract
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function getGreetings(): string;
    abstract public function getMyNameIs(): string;

    public function introduceYourself(): string
    {
        return $this->getGreetings() . '! ' . $this->getMyNameIs() . ' ' . $this->getName() . '.';
    }
}
//наследование Human
class RussianHuman extends HumanAbstract
{
    //приветствие
    public function getGreetings(): string
    {
        return "Привет";
    }
    //имя
    public function getMyNameIs(): string
    {
        return "Меня зовут";
    }
}
//наследование Human
class EnglishHuman extends HumanAbstract
{
    //приветствие
    public function getGreetings(): string
    {
        return "Hi";
    }
    //имя
    public function getMyNameIs(): string
    {
        return "My name is";
    }
}
//создание объектов
$preson1 = new RussianHuman("Катя Мэнэган");
$preson2 = new EnglishHuman("Katita Managan");
//знакомство
echo $preson1->introduceYourself();
echo '<br>';
echo $preson2->introduceYourself();
