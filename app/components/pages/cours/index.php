<?php

function my_autoloader( $class ) {
	require_once 'classes/' . $class . '.php';
}

spl_autoload_register( 'my_autoloader' );

$car = new Car( "2CV", "V12", 10 );

echo '<br> le nom de la voiture est ' . $car->getName();
echo '<br> ma voiture a un moteur ' . $car->getMotor();
$car->setName( "bolideur" );
$car->setMotor( "akrapovic" );
echo '<br> le nouveau nom de la voiture est ' . $car->getName();
echo '<br> ma voiture a un nouveau moteur ' . $car->getMotor();

$car = new Car( "toutou", "beng", 10 );

echo '<br> Le coffre de la voiture fait ' . $car->getCoffreSize();

$moto = new Moto( "Kawasaki", "Honda", "130CV" );

echo '<br>Moteur de la moto : ' . $moto->getMotor();
