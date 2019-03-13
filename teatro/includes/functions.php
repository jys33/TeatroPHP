<?php

function test_input($data) {
	$data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function style ($value) {
    if ($value == 'V'){
        $css = 'color: #f63d4d; ';
    }
    else if ($value == 'R'){
        $css = 'color: #E5CC36;';
    }
    else if ($value == 'L'){
        $css = 'color: #2AD8A2;';
    }
    else {
        $css = 'color: #2AD8A2;';
    }
    return $css;
}

function createTableRows ($array) {
	$count = 1;
	foreach ($array as $key => $datos) {
	    print '<tr>';

	    print '<th>' . $count . '</th>';

	    foreach ($datos as $key => $value) {

	        $css = style($value);
	        
	        print '<td style="' . $css . '">' . $value . '</td>';
	    }
	    
	    print '</tr>';

	    $count ++;
	}
}

function actions ($row, $col, $action, $dataTable) {

	if ($dataTable[$row-1][$col-1] == 'L' && $action == 'L')
	{
		
	    echo '<div class="alert alert-warning text-center" role="alert">La ubicación está disponible!</div>';
	}
	
	else if ($dataTable[$row-1][$col-1] == 'L')
	{
		$dataTable[$row-1][$col-1] = $action;

		if ($action == 'V') {
			echo '<div class="alert alert-success text-center" role="alert">La compra se realizó correctamente.</div>';
		}

		if ($action == 'R'){
			echo '<div class="alert alert-success text-center" role="alert">La ubicación se reservó correctamente.</div>';	
		}
	}

	else if ($dataTable[$row-1][$col-1] == 'V')
	{

		if ($action == "L") {
		    $txt = " No se puede liberar.";
		} else if ($action == "R") {
		    $txt = " No se puede reservar.";
		} else if ($action == "V") {
		    $txt = " No se puede volver a vender.";
		}
	    echo '<div class="alert alert-danger text-center" role="alert">La ubicación ya está vendida! '. $txt .'</div>';
	}

	else if ($dataTable[$row-1][$col-1] == 'R' && $action == 'R'){
		echo '<div class="alert alert-warning text-center" role="alert">La ubicación ya está reservada! No se puede volver a reservar.</div>';
	}

	else if ($dataTable[$row-1][$col-1] == 'R' && $action != 'R'){
		
		
		$dataTable[$row-1][$col-1] = $action;
		
		if ($action == 'L') {
			echo '<div class="alert alert-success text-center" role="alert">La ubicación se liberó correctamente.</div>';
		}
		else
		{
			echo '<div class="alert alert-success text-center" role="alert">La compra se realizó correctamente.</div>';
		}
	}

	return $dataTable;
}

/* La funcion recibe un string y la dimension del array M * N de salida */ 
function strToArray ($str, $M, $N) {

	$start = 0;
	$dataTable = [];

	for ($i = 0; $i < $M; $i++){
		for ($j = 0; $j < $N; $j++){
			$start = (5 * $i) + $j;
			$dataTable[$i][$j] = substr($str, $start, 1);
		}
		$start = 0;
	}
	return $dataTable;
}