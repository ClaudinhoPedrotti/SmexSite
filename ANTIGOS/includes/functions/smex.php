<?php
/* array imagens()
$imagem = imagens(); */
mysql_conexao();
function imagens() {
    $sql = mysql_query("select sql_big_result distinct * from site_catalogo order by codigo asc") or die (mysql_error());
    while ($_imagem = mysql_fetch_array($sql)) $imagem[$_imagem[codigo]] = $_imagem;
    return $imagem;
}
function imagem_randomica($diretorio= 'images/random/') {
    include(DIR_CLASSES.'RandomImage.class.php');
    $randomImage = new RandomImage();
    echo $randomImage->getRandomImage($diretorio);
}
function endereco() {
$sql = mysql_query("select * from site_usuario limit 1") or mysql_erro();
$endereco = mysql_fetch_assoc($sql);
$str = $endereco[endereco] . ", " . $endereco[num];
if ($endereco[compl]) $str .= " " . $endereco[compl];
echo $str .= " - " . $endereco[bairro] . "<br/>CEP " . $endereco[cep] . " - " . $endereco[cidade] . " - " . $endereco[estado];
} 
function is_catalogo() {
    if ($_GET[secao] == 'catalogo') $boo = true;
    else $boo = false;
    return $boo;
} 
function submenu() {
    $arr = array(
'aplicacoes_metalurgicas' => 'Aplica��es metal�rgicas',
'aplicacoes_eletricas' => 'Aplica��es El�tricas',
'aplicacoes_mecanicas' => 'Aplica��es mec�nicas',
'aplicacoes_edm' => 'Aplica��es para EDM',
'aplicacoes_especiais' => 'Aplica��es especiais',
'aplicacoes_diversas' => 'Aplica��es diversas');
    return $arr;
}
function is_contato() {
if ($_GET[secao] == 'contato') return true;
else return false;
}
function imagens_titulo() {
$arr = array(
'quemsomos' => 'img-quemsomos.jpg', 
'produtos' => 'img-produtos.jpg', 
'servicos' => 'img-servicos.jpg');
return $arr;
}
function imagem_titulo($secao, $imagem) {
if ($_GET[secao] == $secao) return $imagem;
}
function is_servicos() {
if ($_GET[secao] == 'servicos') return true;
else return false;
}
function is_principal() {
if (($_GET[secao] == 'principal') or (!$_GET[secao])) return true;
else return false;
} 
?>