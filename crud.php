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
	'nombre' => ['required' => 'required', 'min' => 3, 'max' => 25],
	'paterno' => ['required' => 'required', 'min' => 3, 'max' => 25],
	'materno' => ['min' => 3, 'max' => 25],
	'fecha_nacimiento' => ['required' => 'required', 'date' => 'date'],
	'telefono' => ['required' => 'required']
];

$cambioCampo = 
[
	'nombre' => 'Nombres',
	'paterno' => 'Apellido paterno',
	'materno' => 'Apellido materno',
	'fecha_nacimiento' => 'Fecha de nacimiento',
	'telefono' => 'Telefono'
];

function validarDatos($post, $rules, $cambio) {
	$exito = true;
	$mensaje = [];
	foreach ($post as $key => $value) {
		foreach ($rules[$key] as $r => $rule) {
			if ($r === 'required')
			{
				if ($value == '' || is_null($value))
				{
					$exito = false;
					$mensaje[] = 'El campo '.$cambio[$key].' es obligatorio';
				}
			}
			if ($r === 'min')
			{
				if (strlen($value) < $rule && !($value == '' || is_null($value)))
				{
					$exito = false;
					$mensaje[] = 'El campo '.$cambio[$key].' debe contener almenos '.$rule.' caracteres';
				}
			}
			if ($r === 'max')
			{
				if (strlen($value) > $rule)
				{
					$exito = false;
					$mensaje[] = 'El campo '.$cambio[$key].' debe contener maximo '.$rule.' caracteres';
				}
			}
			if ($r === 'date') {
				if (strtotime('31-12-1899') > strtotime($value) && !($value == '' || is_null($value)))
				{
					$exito = false;
					$mensaje[] = 'La fecha de nacimiento no puede ser menor a 1900';
				}
				if (time() < strtotime($value))
				{
					$exito = false;
					$mensaje[] = 'La fecha de nacimiento no puede ser mayor a la actual';
				}
			}
		}
	}
	return array($exito, $mensaje);
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
				'acciones' => '<button type="button" class="btn btn-info btn-sm" onclick="editar('.$r['id'].')"><i class="fas fa-edit"></i></button>
								<button class="btn btn-danger" title="eliminar" onclick="eliminar('.$r['id'].')"><i class="fas fa-trash"></i></button>'
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
		$nombre = $post['nombre'];
		unset($post['id']);
		if ($id == '') {
			$validar = validarDatos($post, $rulesCreate,$cambioCampo);
			if ($validar[0])
			{
				$row =  $db->insert ('alumnos', $post);
				if ($row) {
					$result = ['exito' => true, 'mensaje' => 'Alumno registrado correctamente.'];
				} else {
					$result = ['exito' => false, 'mensaje' => 'Error al insertar, intente otra vez.', "errorsql" => $db->getLastError()];
				}
			}
			else
			{
				$result = ['exito' => false, 'mensaje' => $validar[1]];
			}

		} else {

			if ($nombre == 'eliminar')
			{
				$db->where('id', $id);
				if ($db->delete('alumnos', $id))
				{
					$result = ['exito' => true, 'mensaje' => 'Registro eliminado'];
				}
				else
				{
					$result = ['exito' => false, 'mensaje' => 'Registro no eliminado, vuelva a intentar'];
				}
			}
			else
			{
				# Vamos a actualizar un registro
				$db->where('id', $id);
				if ($db->update('alumnos', $post)) {
					$result = ['exito' => true, 'mensaje' => 'Registro actualizado correctamente.'];
				} else {
					$result = ['exito' => false, 'mensaje' => 'Error al actualizar, '. $db->getLastError()];
				}
			}
		}
		break;

	case 'eliminar':
		$db->where('id', $_GET['id']);
		$row = $db->getOne('alumnos');
		if (!is_null($row))
		{
			$result = ['exito' => true, 'row' => $row];
		}
		else
		{
			$result = ['exito' => false, 'mensaje' => 'no hay registro vinculado'];
		}
		break;

	default:
		$result['data'] = [];
		break;
}

echo json_encode($result);
 ?>
