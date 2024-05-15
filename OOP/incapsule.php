<?php

class Cat
{
    private $name;
    private $color;

    public function __construct(string $name, string $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function sayHello(): string
    {
        return "Мяу! Я " . $this->name . " - " . $this->getColor() . " кошка.";
    }

    private function getColor(): string
    {
        return $this->color;
    }

}

$cat_my_belowed = new Cat("Варежка", "чёрно-рыжая");
$cat_my_belowed2 = new Cat("Плюшка", "бело-серая");

echo $cat_my_belowed->sayHello();
echo "<br>";
echo $cat_my_belowed2->sayHello();

