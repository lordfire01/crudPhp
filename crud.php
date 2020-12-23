<?php 
require_once 'vendor/autoload.php';
$db = new MysqliDb ('localhost', 'root', '', 'extra');
/*
** C => Create (crear)
** R => Read (leer)
** U => Update (Actualizar)
** D => Delete (Eliminar)
/**/

$rulesCreate = [
	'nombre' => ['required', 'min' => 3, 'max' =>25],
	'paterno' => ['required', 'min:3', 'max:25'],
	'materno' => ['min:3', 'max:25'],
	'fecha_nacimiento' => ['required', 'date'],
	'telefono' => ['required']
];

function validarDatos($post, $rules) {
	$exito = true;
	$mensaje = "";
	foreach ($rules as $key => $rule) {
		
	}

	//var_dump($exito, $mensaje);
	die();
}

if ($_POST) {
	$tipo = 'guardar';
} else {
	$tipo = $_GET['tipo'];
}

switch ($tipo) {
	case 'listado':
		$data = [];
		$records = $db->get('alumnos');
		foreach ($records as $r) {
			$data[] = [
				'nombre' => $r['nombre'],
				'paterno' => $r['paterno'],
				'materno' => $r['materno'],
				'fecha_nacimiento' => implode('-', array_reverse(explode('-', $r['fecha_nacimiento']))),
				'acciones' => '<button type="button" class="btn btn-info btn-sm" onclick="editar('.$r['id'].')"><i class="fas fa-edit"></i></button>'
			];
		}
		$result['data'] = $data;
		break;

	case 'show':
		$db->where('id', $_GET['id']);
		$row = $db->getOne('alumnos');
		if (!is_null($row)) {
			$result = ['exito' => true, 'row' => $row];
		} else {
			$result = ['exito' => false, 'mensaje' => 'No hay registro viculado'];
		}
		break;

	case 'guardar':
		$post = $_POST['row'];
		$id = $post['id'];
		unset($post['id']);
		if ($id == '') {
			# Vamos a guardar un nuevo registro
			$validar = validarDatos($post, $rulesCreate);
			$row =  $db->insert ('alumnos', $post);
			if ($row) {
				$result = ['exito' => true, 'mensaje' => 'Alumno registrado correctamente.'];
			} else {
				$result = ['exito' => false, 'mensaje' => 'Error al insertar, intente otra vez.', "errorsql" => $db->getLastError()];
			}
		} else {
			# Vamos a actualizar un registro
			$db->where('id', $id);
			if ($db->update('alumnos', $post)) {
				$result = ['exito' => true, 'mensaje' => 'Registro actualizado correctamente.'];
			} else {
				$result = ['exito' => false, 'mensaje' => 'Error al actualizar, '. $db->getLastError()];
			}
		}
		break;
	
	default:
		$result['data'] = [];
		break;
}

echo json_encode($result);
 ?>
