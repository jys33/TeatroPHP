<?php

require_once('includes/functions.php');

$data = [
	'row' => '',
	'col' => '',
	'action' => '',
	'rowError' => '',
	'colError' => '',
	'actionError' => ''
];

$dataTable = [
	['L', 'L', 'L', 'L', 'L'],
	['L', 'L', 'L', 'L', 'L'],
	['L', 'L', 'L', 'L', 'L'],
	['L', 'L', 'L', 'L', 'L'],
	['L', 'L', 'L', 'L', 'L']
];

$cssClassRow = '';
$cssClassCol = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

	$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

	$options = [
		'options' => [
			'min_range' => 1,
			'max_range' => 5
		]
	];

	if( empty( $_POST['row'] ) )
	{
		$data['rowError'] = "Se requiere la fila";
	}
	else
	{
		$data['row'] = test_input( $_POST['row'] );

		if (filter_var($data['row'], FILTER_VALIDATE_INT, $options) === FALSE) {
			$data['rowError'] = 'No es un valor válido';
		}
	}

	if( empty( $_POST['col'] ) )
	{
		$data['colError'] = "Se requiere el puesto";
	}
	else 
	{
		$data['col'] = test_input( $_POST['col'] );

		if (filter_var($data['col'], FILTER_VALIDATE_INT, $options) === FALSE) {
			$data['colError'] = 'No es un valor válido';

		}
	}

	if ( !isset($_POST['action']) ){

		$data['actionError'] = 'Seleccione una acción';
	}

	// Clases css
    $cssClassRow = empty($data['rowError']) ? '': 'is-invalid';
    $cssClassCol = empty($data['colError']) ? '': 'is-invalid';

    // Extraemos las dimensiones del array cuadrado M * N multidimensional
    $M = count($dataTable);
    $N = count($dataTable[0]);

    $dataTable = strToArray( test_input( $_POST['hidden'] ), $M, $N );

	if (
		empty($data['rowError']) &&
		empty($data['colError']) &&
		empty($data['actionError']))
	{

		$row = $data['row'];
		$col = $data['col'];
		$action = test_input($_POST['action']);

		$dataTable = actions($row, $col, $action, $dataTable);
	}
}

require_once ('view/inc/header.php');

require_once ('view/pages/escenario.php');

require_once ('view/inc/footer.php');