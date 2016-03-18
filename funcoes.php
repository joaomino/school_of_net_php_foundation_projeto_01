<?php

function verifica_rotas($x)
{
	if($x==""){
		$page = "home.php";
	}else{
		if(file_exists($x.".php")){
			$page = $x.".php";
		}else{
			$page = "404.php";
			http_response_code(404);
		}
	}
    return $page;
}

/*
$numeros = [1, 2, 3, 10, 90];

array_walk($numeros, function($x){
	echo $x. "<br />";
	}
);


function somar($x, $y)
{
	echo "inicio da fun��o" . "<br />";
	return $x + $y;
	echo "isso nao aparece, pois a funcao acaba no return";
}

$valor = somar(10,20);

echo $valor;
*/
/* funcao anonima pra dentro da varial

$nome = "joaozin";

$exibe = function($x) use($nome){
	echo $x . " - " . $nome . "<br />";
	};

$numeros = [1, 2, 3, 10, 90];

array_walk($numeros, $exibe);
 */
?>