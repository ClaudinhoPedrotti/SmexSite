<?php /*** Template Menu Horizontal - 1
* @copyright Copyright © 2006 W4Studio Ltda.-ME
* @date 05/07/2006
* @author Walter França <walter@w4studio.com.br> */
include_once('includes/config.php');
include_once(DIR_FUNCTIONS.'mysql.php');
include_once(DIR_FUNCTIONS.'global.php');
include_once(DIR_FUNCTIONS.'rochaconvitesespeciais.php');
include_once(DIR_CLASSES.'site.inc');
session_start();
$site=new site(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $site->tag_title($_GET[secao]);
$site->tags_meta($_GET[secao]); ?>
<link rel="Shortcut Icon" type="image/ico" href="favicon.ico" />
<link rel="stylesheet" type="text/css" href="tmh-1.css" />
<script type='text/javascript'>
<!--
function imagem(codigo) {
window.open('catalogo.imagem.php?codigo='+codigo,null,"toolbar=0,location=0,directories=0,status=1,menubar=0,scrollbars=1,resizeble=1,width=490px,height=360px,top=100,left=312");
}
// -->
</script>
</head>
<body bgcolor='efece0'>
<a href='javascript:close()'><font color='#996600' face='Arial, Helvetica, sans-serif' size='1'>
<?php mysql_conexao();
$imagem=mysql_fetch_assoc(mysql_query("select imagem from site_catalogo where codigo = " . $_REQUEST[codigo])); ?>
<center>
<img src='images/<?php echo $imagem[imagem] ?>' alt='' border='0'/><br/>

[FECHAR]</font></a>
</center>
</body>
</html>
