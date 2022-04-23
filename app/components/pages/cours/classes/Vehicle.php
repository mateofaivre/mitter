<?php

class Vehicle {
	private $name;
	private $motor;
	
	public function __construct($var1, $var2) {
		$this->name = $var1;
		$this->motor = $var2;
	}
	
	public function setMotor($motor) {
		$this->motor = $motor;
	}
	public function setName($name) {
		$this->name = $name;
	}
	
	public function getMotor() {
		return $this->motor;
	}
	public function getName() {
		return $this->name;
	}
}