<?php

interface CalculateSquare
{
    public function calculateSquare(): float;
}

class Rectangle implements CalculateSquare
{
    public function __construct(public $x, public $y) {}

    public function calculateSquare(): float
    {
        return $this->x * $this->y;
    }
}

class Circle implements CalculateSquare
{
    const PI = 3.14;
    public function __construct(public $r) {}

    public function calculateSquare(): float
    {
        return self::PI * ($this->r ** 2);
    }
}

class Square
{
    public function __construct(public $x) {}

    // public function calculateSquare(): float
    // {
    //     return $this->x * $this->x;
    // }
}

$lookup = [
    $rectangle = new Rectangle(2, 5),
    $circle = new Circle(10),
    $square = new Square(4)
];

foreach ($lookup as $i) {
    if ($i instanceof CalculateSquare) {
        $className = get_class($i);
        echo "Площадь объекта $className: " . $i->calculateSquare() . '<br>';
    } else {
        $className = get_class($i);
        echo "Объект $className не реализует интерфейс CalculateSquare." . '<br>';
    }
}
