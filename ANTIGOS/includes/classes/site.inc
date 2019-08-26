<?php /** *Recursos de interface e funções para sites
* @version 1.0
* @date 06/04/2006
* @author Valmir <valmir@w4studio.com.br
* @author Walter <walter@w4studio.com.br */
class site{
var $site; // array contendo dados personalizados
var $site_paginas; // resource contendo query de todos os registros da tabela site_paginas
var $site_links; // resource contendo todos os registros da tabela site_links
var $site_banners; // resource contendo todos os registros da tabela site_banners
var $site_medias; // resource contendo todos os registros da tabela site_medias
var $mysql_tabela; // tabela do MySQL
function site($pagina=false,$formulario=false){
mysql_conexao();
$this->site=mysql_fetch_array(mysql_query("select *,site_usuario.nome as usuario_nome from site, site_usuario where site.id=1 and site_usuario.id=1"),MYSQL_ASSOC);
$this->site_paginas=mysql_query("select * from site_paginas where publicar=1 order by ordem") or mysql_erro(__file__,__line__,__class__,__method__);
if($pagina): 
while($paginas=mysql_fetch_array($this->site_paginas)) $this->site[$paginas[id]]=$paginas;
mysql_data_seek($this->site_paginas,0);
endif;
$this->site_links=mysql_query("select * from site_links order by id") or mysql_erro(__file__,__line__,__class__,__method__);
$this->site_banners=mysql_query("select * from site_banners order by id") or mysql_erro(__file__,__line__,__class__,__method__);
$this->site_medias=mysql_query("select * from site_medias order by id") or mysql_erro(__file__,__line__,__class__,__method__);
if($pagina=='contato') $this->mysql_tabela='site_contatos';
if($formulario[acao]=='adicionarcontato') $this->contato_adicionar($formulario);
}
    function paginas() {
        $sql = mysql_query("select * from site_paginas where publicar = 1 order by ordem") or print(mysql_error());
        while ($rows = mysql_fetch_assoc($sql)) $paginas[$rows[id]] = $rows;
        return $paginas;
    }
function tag_title($pagina){
if ($_GET[secao] == 'produtos'):
foreach (submenu() as $id => $nome):
$str = "produtos: ";
if ($_GET[subsecao] == $id):
$str .= $nome;
break;
endif;
endforeach;
$str .= " :: " . $this->site[tag_title];
echo "<title>" . $str . "</title>";
return;
endif;
echo "<title>".$this->site[tag_title];
while($paginas=mysql_fetch_array($this->site_paginas)):
if($pagina==$paginas[id]) ECHO " - ".$paginas[nome];
endwhile;
mysql_data_seek($this->site_paginas,0);
echo "</title>";
}
function tags_meta($pagina){
echo "<meta name='TITLE' content='".$this->site[tag_meta_title]."'/>".
"<meta name='SUBJECT' content='".$this->site[tag_meta_subject]."'/>".
"<meta name='DESCRIPTION' content='".$this->site[tag_meta_description]."'/>".
"<meta name='KEYWORDS' content='".$this->site[tag_meta_keywords]."'/>".
"<meta name='RATING' content='GENERAL'/>".
"<meta name='REVISIT-AFTER' content='15 days'/>".
"<meta name='LANGUAGE' content='Portuguese'/>".
"<meta name='ROBOTS' content='index, follow'/>".
"<meta name='GOOGLEBOT' content='INDEX, FOLLOW'/>".
"<meta name='audience' content='all'/>".
"<meta name='AUTHOR' content='W4Studio Webdesign - http://www.w4studio.com.br'/>".
"<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'/>".
"<meta http-equiv='Pragma' content='no-cache'/>";
}
function header(){
echo "<img src='images/".$this->site[site_logotipo]."' alt='".$this->site[site_nome]." (logotipo)' title='".$this->site[site_nome]." (logotipo)' border='0' />".
"<img src='images/".$this->site[site_banner]."' alt='".$this->site[site_nome]." - banner' border='0' />";
}
function barra_nav(){
echo "<a href='mailto:".$this->site[email]."'><img src='images/bullet_1.gif' border='0' alt='".$this->site[email]."' />&nbsp;&nbsp;E-mail: ".$this->site[email]."</a>".
"<a><img src='images/bullet_1.gif' alt='Telefone' />&nbsp;&nbsp;Telefone: ".strtelefone($this->site[telefone])."</a>".
"<a><img src='images/bullet_1.gif' alt='data' />&nbsp;&nbsp;".str_data()."</a>";
}
function menu($pagina,$posicao='superior'){
echo "<ul id='navlist'>";
while($link=mysql_fetch_array($this->site_paginas)): echo "<li>";
if($posicao=='inferior') echo "&nbsp;";
echo "<a href='index.php?secao=".$link[id]."'";
if(($pagina==$link[id])and($posicao=='superior')) echo " class='active'";
echo ">".$link[nome]."</a>";
if($posicao=='inferior') echo "&nbsp;&nbsp;|";
echo "</li>";
endwhile;
mysql_data_seek($this->site_paginas,0);
if($posicao=='inferior') echo "<li>&nbsp;<a href='#top'>Topo</a></li>";
echo "</ul>";
}
function links(){
while($link=mysql_fetch_array($this->site_links)): echo "<p><a href='".$link[url]."' target='_blank'>".$link[nome]."</a>";
if($link[descricao]) echo " ".$link[descricao];
echo "</p>";
endwhile;
mysql_data_seek($this->site_links,0);
}
function banners(){
if(mysql_num_rows($this->site_banners)):
while($banner=mysql_fetch_array($this->site_banners)) echo "<a class='banner' href='".$banner[url]."' target='_blank'><img src='images/".$banner[imagem]."' alt='".$banner[nome]."' border='0' /></a>";
endif;
}
function medias(){
if(mysql_num_rows($this->site_medias)):
while($media=mysql_fetch_array($this->site_medias)) echo "<a class='media' href='".$media[url]."' target='_blank'><img src='images/".$media[imagem]."' border='0' alt='".$media[nome]."' border='0' /></a>";
endif;
}
function media_main($data,$alt=false,$width=562,$height=180){
echo "<p class='media_main'>".
"<object type='application/x-shockwave-flash' data='".$data."' width='".$width."' height='".$height."'>".
"<param name='movie' value='".$data."' />".
"<img src='".$alt."' width='".$width."' height='".$height."' alt='".$alt."' /></object></p>";
}
function conteudo($pagina,$acao){
if(!$pagina) $pagina = 'principal';
//        if ($_GET[secao] == 'produtos'):
//            include($_GET[subsecao] . '.php');
//            return;
//        endif;
while($site_paginas=mysql_fetch_array($this->site_paginas)):
if($pagina==$site_paginas[id]): 
if($acao=='confirmar'): include(str_replace('.','.confirmar.',$site_paginas[arquivo]));
else: include($site_paginas[arquivo]);
endif;
elseif((!$pagina)and($site_paginas[ordem]==1)): include($site_paginas[arquivo]);
endif;
endwhile;
mysql_data_seek($this->site_paginas,0);
}
function footer($credencial=false){
echo "<p>";
if($this->site[razao_social]) echo $this->site[razao_social];
else echo $this->site[site_nome];
if($credencial) echo " - CRECI ".$this->site[credencial];
echo " - ".$this->site[endereco].", ".$this->site[num];
if($this->site[compl]) echo " ".$this->site[compl];
echo " - ".$this->site[bairro]." - CEP ".$this->site[cep]." - ".$this->site[cidade]." - ".$this->site[estado]." <br/><b>Telefone: ".strtelefone($this->site[telefone])."</b></p>";
echo "<p>Desenvolvimento: <b>W4Studio Webdevelopment</b></p>";
}
function contato_adicionar($formulario){
$this->contato_validar($formulario);
mysql_query("insert into ".$this->mysql_tabela." values (
'',
'".str_replace("'","\\'",str_replace("drop database","",$formulario[nome]))."',
'".str_replace("'","\\'",str_replace("drop database","",$formulario[empresa]))."',
'".str_replace("'","\\'",str_replace("drop database","",$formulario[telefone_ddd]."-".$formulario[telefone]))."',
'".str_replace("'","\\'",str_replace("drop database","",$formulario[email]))."',
'".str_replace("'","\\'",str_replace("drop database","",$formulario[assunto]))."',
'".str_replace("'","\\'",str_replace("drop database","",$formulario[mensagem]))."',
'".$_SERVER[REMOTE_ADDR]."',
now())") or mysql_erro(__file__,__line__,__class__,__method__);
$this->contato_email($formulario);
$this->redirecionar('index.php?secao=contato&acao=confirmar');
}
function contato_validar($formulario){
foreach($formulario as $name=>$value):
if(!$value):
if($name=='nome'): $this->erro('Digite seu nome',$name);
elseif($name=='email'): $this->erro('Digite seu e-mail',$name);
elseif($name=='mensagem'): $this->erro('Digite a mensagem',$name);
endif;
endif;
endforeach;
}
function contato_email($formulario){
$message=$this->site[site_dominio]." - Contato\n\n".
"Mensagem enviada em ".date("d/m/Y")." às ".date("H:i:s")."\n\n".
"NOME: ".$formulario[nome]."\n";
if(isset($formulario[empresa])) $message.="Enpresa: ".$formulario[empresa]."\n";
$message.="TELEFONE: ".$formulario[telefone_ddd]." ".$formulario[telefone]."\n".
"E-MAIL: ".$formulario[email]."\n\n";
if(isset($formulario[assunto])) $message.="Assunto: ".$formulario[assunto]."\n";
$message.="Mensagem: ".$formulario[mensagem]."\n\n".
"IP: ".$_SERVER[REMOTE_ADDR];
//$this->site[email]='valmir@w4studio.com.br';
if(!$formulario[assunto]) $formulario[assunto]='Contato';
if(mail($this->site[email],'['.dominio_nome($this->site[site_dominio]).'] '.$formulario[assunto],$message,
"from: ".$formulario[email]." <".$formulario[email].">\n".
"reply-to: ".$formulario[email]." <".$formulario[email].">\n")) return;
else $this->erro('Desculpe, sua mensagem não pode ser enviada. Por favor, tente mais tarde');
}
function erro($mensagem,$campo=false){
echo "<script> alert('".$mensagem."');".
"document.location='index.php?secao=".$_REQUEST[secao]."&campo=".$campo."';</script>";
exit;
}
function redirecionar($uri){
echo "<script type='text/javascript'> document.location='".$uri."'</script>";
}
} ?>
