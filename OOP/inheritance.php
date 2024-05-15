<?php

class Post
{
    protected $title;
    protected $text;

    public function __construct(string $title, string $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getText(): string
    {
        return $this->text;
    }
}

class Lesson extends Post
{
    public $homeWork;

    public function __construct(string $title, string $text, string $homeWork)
    {
        parent::__construct($title, $text);
        $this->homeWork = $homeWork;
    }

    public function newText(string $text): void
    {
        $this->text = $text;
    }
}

class PaidLesson extends Lesson
{
    private $price;

    public function __construct(string $title, string $text, string $homeWork, float $price)
    {
        parent::__construct($title, $text, $homeWork);
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}

$object = new PaidLesson("PHP наследование", "Что такое наследование", "Вам это не сделать ХаХаХаХАХАХАХАХА", -99.00);

print_r($object);
