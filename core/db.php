<?php
/**
* Простой класс для установки соединения с базой данных, реализованый на шаблоне singletone
*/
class DataBase
{

	private static $_instance;

	private function __construct() { }
	private function __clone() { }

	public static function getInstance() {
		if(!self::$_instance)
			self::$_instance = new PDO('mysql:host=localhost;dbname=meganews2','homestead','secret');
		return self::$_instance;
	}
}