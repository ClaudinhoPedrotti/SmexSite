<?php //
// fun??es de banco de dados
//
$servidor = "localhost";
$usuario = "smex_smex";
$senha = "C3UQ3,PR)2oI";
$bd = "smex_smex";

function mysql_conexao()
{
global $servidor, $usuario, $senha, $bd;
$conms = mysql_connect($servidor,$usuario,$senha);
if(!$conms) return false;
$condb = mysql_select_db($bd);
if(!$condb) return false;
return true;
}
function mysql_erro($arquivo,$linha,$funcao=false,$classe=false,$metodo=false){
$str=$arquivo." linha ".$linha." ";
if($funcao) $str.=" fun??o ".$funcao;
if($classe) $str.=" objeto ".$class;
if($metodo) $str.=" m?todo ".$method;
die($str."<br />".mysql_error());
}

mysql_conexao();
?>