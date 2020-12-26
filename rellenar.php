<?php 
require_once 'vendor/autoload.php';
$db = new MysqliDb ('localhost', 'root', '', 'extra');

for ($i=0; $i < 500; $i++)
{
	$faker = Faker\Factory::create();
	$datos =
	[
		'nombre' => $faker->firstname,
		'paterno' => $faker->lastname,
		'materno' => $faker->lastname,
		'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = 'now'),
		'telefono' => $faker->tollFreePhoneNumber,
	];

	echo json_encode($datos);

	$db->insert('alumnos', $datos);
}
?>