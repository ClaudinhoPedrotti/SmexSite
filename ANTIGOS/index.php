<?php /*** Template Menu Horizontal - 1
* @copyright Copyright © 2006 W4Studio Ltda.-ME
* @date 15/11/2006
* @author Walter França da Silva <walter@w4studio.com.br>
* @author Valmir França da Silva <valmir@w4studio.com.br> */
include_once('includes/config.php');
include_once(DIR_FUNCTIONS.'mysql.php');
include_once(DIR_FUNCTIONS.'global.php');
include_once(DIR_FUNCTIONS.'smex.php');
include_once(DIR_CLASSES.'site.inc');
session_start();
if(!@$_SESSION['VIU_ANIMACAO']){
	header('location:/ini');
	exit;
}
$site=new site(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="title" content="Smex Compostos Plásticos">
<meta name="url" content="http://www.smex.com.br">
<meta name="description" content="A SMEX é uma empresa com atuação no mercado de Termoplásticos, Concentrados de Cores e Aditivos.">
<meta name="keywords" content="Masterbatch, Aditivos, plástico, Termoplásticos.">
<meta name="charset" content="ISO-8859-1">
<meta name="company" content="Smex Compostos Plásticos">
<meta name="revisit-after" content="1">
<meta name="ROBOTS" content="index, follow"/>
<meta name="GOOGLEBOT" content="INDEX, FOLLOW"/>
<meta name="audience" content="all"/>
<link rev=made href="mailto:vendas@smex.com.br">

<?php $site->tag_title($_GET[secao]);
$site->tags_meta($_GET[secao]); ?>
<link rel="Shortcut Icon" type="image/ico" href="favicon.ico" />
<link rel="stylesheet" type="text/css" href="tmh-1.css?x=1" />
<script type='text/javascript'>
<!--
function imagem(codigo) {
window.open('catalogo.imagem.php?codigo='+codigo,null,"toolbar=0,location=0,directories=0,status=1,menubar=0,scrollbars=1,resizeble=1,width=490px,height=360px,top=100,left=312");
}
// -->
</script>
</head>
<body>

<div id="container">
<div class="barra_nav">
<p>
e-mail:<?php echo "<a href='mailto:".$site->site[email]."'>".$site->site[email]."</a>"; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo str_data() ?>
</p>
</div>
	<ul id="menu_img">
<?php foreach ($site->paginas() as $id => $pagina): ?><li><a id="<?php echo $id ?>" href="index.php?secao=<?php echo $id ?>"><?php echo strtoupper($pagina[nome]) ?></a></li><?php endforeach ?>
</ul>
<div id="top">
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="864" height="109" title="smex compostos pl&aacute;sticos">
    <param name="movie" value="header.swf" />
    <param name="quality" value="high" />
    <embed src="header.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="864" height="109"></embed>
  </object>
</div>
<div id="wrapper">
<div id="rightnav">
<?php if (is_principal()): ?>
<p><img src="images/masterbatch.jpg" alt="Masterbatch" /><br/></p>
<!--h2 class="wine">Informativos</h2>
<p><a href="informativo/Informativo_SMEX_Edicao_1.pdf" target="_blank">Informativo Smex - Edição 1</a></p-->
<?php endif; ?>
<?php
if ($_GET["secao"] == "qualidade"):
?>
<p><img src="images/img-qualidade.jpg" alt="Masterbatch" /><br/></p>
<?php
endif;
?>
<?php if (is_contato()): ?>
<p><img src="images/img-contato.jpg" alt="Masterbatch" /></p>
<p><strong>Endereço:</strong><br /><?php endereco() ?><br /></p>
<p><strong>Horário de atendimento:</strong><br/>De segunda a sexta das 8:00 as  18:00<br/>
<strong>Telefone:</strong><br />
<?php echo strtelefone($site->site[telefone]).""; ?>
<br /></p>
<p><strong>Email Gerencial:</strong><br />
<?php echo "<a href='mailto:airton@smex.com.br'>airton@smex.com.br</a>"; ?>
</p>
<p><strong>Email Vendas:</strong><br />
<?php echo "<a href='mailto:vendas@smex.com.br'>vendas@smex.com.br</a>"; ?>
</p>
<?php endif ?>
<?php if ((!is_contato() and (!is_principal()))):
foreach (Imagens_titulo() as $secao => $imagem): ?>
<?php if ($_GET[secao] == $secao): ?>
<p><img src="images/<?php echo imagem_titulo($secao, $imagem) ?>" alt="" /><br/></p>
<?php endif ?>
<?php endforeach;
endif; ?>
<?php if (is_servicos()): ?>
<p><strong>Informações Comerciais:</strong><br />
<a href="mailto:carmen.comercial@smex.com.br">carmen.comercial@smex.com.br</a><br/>
<a href="mailto:vendas@smex.com.br">vendas@smex.com.br</a><br/>
</p>
<p><strong>Informações Técnicas:</strong><br />
<a href="mailto:robsonlaboratorio@smex.com.br">robsonlaboratorio@smex.com.br</a><br/>
</p>
<?php endif; ?>
</div>

  <div id="content">
<?php $site->conteudo($_REQUEST[secao], $_REQUEST[acao]); ?>
</div>
</div><div id="footer">
<p>
<strong><?php echo $site->site[razao_social] ?></strong><br/>
<?php endereco() ?><br/>
<strong>Telefone: <?php echo strtelefone($site->site[telefone]).""; ?></strong>
</p>
</div>
<p align="center"><font color="#CCCCCC">&nbsp;</font><br/><a href="#" target="_blank">&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;</p>
<!-- <p align="center"><font color="#CCCCCC">Desenvolvimento e Hospedagem</font><br/><a href="http://www.w4studio.com.br" target="_blank"><img src="images/w4studio.jpg" border="0" alt="w4studio" /></a>&nbsp;&nbsp;&nbsp;&nbsp;</p> -->
</div>
</body>
</html>