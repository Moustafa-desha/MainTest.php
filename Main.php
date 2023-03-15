<?php
/**
 * Класс основной для фрукты
 */
abstract class fruit{
    // Статическая переменая для хранения ключа
    static $id = 1;
    // number of fruit

    public $idFruit = 0;

    // сколько дает
    public abstract function getProduct();

    // вернуть
    public function getNameOfClass()
    {
        return static::class;
    }
}

/**
 * Класс яблоки
 */
class apple extends fruit {

    function __construct() {
        // Задаем уникальный номер
        $this->idFruit = parent::$id++;
        //Задаем уникальный номер
        // print "apple id-".$this->idFruit." \n";
    }
    // сколько может дать яблоки
    public function getProduct(){
        return rand(40,50);
    }

}

/**
 * Класс груш
 */
class pears extends fruit {
    // коснтруктор класса, задаем уникальный номер
    function __construct() {
        // задаем номер уникальный
        $this->idFruit = parent::$id++;
        // print "Конструктор класса pears". $this->idFruit." \n";
    }

    // сколько может дать груш
    public function getProduct(){
        return rand(0, 20);
    }
}

/**
 * Создание фрукты (Паттерн - Абстрактная фабрика)
 */
class ConcreteFactory
{
    // Регистриурем яблоки
    public function createApple(): apple
    {
        return new apple();
    }
    // Регистрируем груш
    public function createPears(): pears
    {
        return new pears;
    }
}


// Абстрактная фабрика для регистрации фабрика
$factory = new ConcreteFactory();
// Хлев (где все фабрика )
$a = array();

// регистрируем 10 яблоки
for($i=1 ; $i<=10 ; $i++){
    $a[] = $factory->createApple();
}
// регистрируем 15 груш
for($i=1 ; $i<=15 ; $i++){
    $a[] = $factory->createPears();
}

// обнуляем корзину
$apple = 0;
$pear = 0;
// обходим и собераем продукцию
foreach ($a as $value){
    // в зависемости от животного слаживаем проудкцию
    switch ($value->getNameOfClass()) {
        case "apple":
            $apple +=$value->getProduct();
            break;
        case "pear":
            $pear +=$value->getProduct();
            break;
    }
    //echo $value->getProduct();
}
echo "Apple-".$apple."\n";
echo "Egg-".$pear."\n";
