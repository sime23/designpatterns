<?php

// Implementation interface
interface Color {
    public function fill();
}

// Concrete implementations
class RedColor implements Color {
    public function fill() {
        echo "Filling with red color\n";
    }
}

class BlueColor implements Color {
    public function fill() {
        echo "Filling with blue color\n";
    }
}

// Abstraction
abstract class Shape {
    protected Color $color;
    
    public function __construct(Color $color) {
        $this->color = $color;
    }
    
    abstract public function draw();
}

// Refined abstractions
class Circle extends Shape {
    public function draw() {
        echo "Drawing circle. ";
        $this->color->fill();
    }
}

class Square extends Shape {
    public function draw() {
        echo "Drawing square. ";
        $this->color->fill();
    }
}

// Usage
$redCircle = new Circle(new RedColor());
$redCircle->draw();

$blueSquare = new Square(new BlueColor());
$blueSquare->draw();
