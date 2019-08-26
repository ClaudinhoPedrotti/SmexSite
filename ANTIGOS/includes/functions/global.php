<?php /** * funções para aplicações diversas
* @copy Copyright ©2006 Valmir França da Silva <valmir@w4studio.com.br>
* @date 12/06/2006
* @version 0.6
* @author Valmir França da Silva <valmir@w4studio.com.br. */
/** converte formatos de telefone do mysql
* @param string $telefone telefone do mysql
* @param string $formato formato do mysql
* @return string
* @date 18/03/2006 {@source} */
function strtelefone($telefone,$formato='99-9999-9999'){
if($formato=='9999999999') return "55 ".substr($telefone,0,2)." ".substr($telefone,2,4)."-".substr($telefone,6,4); // conversão do formato 9999999999
elseif($formato=='99-9999-9999') return "55 ".substr($telefone,0,2)." ".substr($telefone,3); // conversão do formato 99-9999-9999
}
/* * exibe a data do servidor
* @param string $timestamp formato timestamp fornecido pelo mysql
* @return string 
* @date 10/03/2006 {@source} */
function str_data(){
if(date("l")=="Monday"): $l="Segunda-feira";
elseif(date("l")=="Tuesday"): $l="Terça-feira";
elseif(date("l")=="Wednesday"): $l="Quarta-feira";
elseif(date("l")=="Thursday"): $l="Quinta-feira";
elseif(date("l")=="Friday"): $l="Sexta-feira";
elseif(date("l")=="Saturday"): $l="Sábado";
elseif(date("l")=="Sunday"): $l="Domingo";
endif;
if(date("F")=="January"): $F="Janeiro";
elseif(date("F")=="February"): $F="Fevereiro";
elseif(date("F")=="March"): $F="Março";
elseif(date("F")=="April"): $F="Abril";
elseif(date("F")=="May"): $F="Maio";
elseif(date("F")=="June"): $F="Junho";
elseif(date("F")=="July"): $F="Julho";
elseif(date("F")=="August"): $F="Agosto";
elseif(date("F")=="September"): $F="Setembro";
elseif(date("F")=="October"): $F="Outubro";
elseif(date("F")=="November"): $F="Novembro";
elseif(date("F")=="December"): $F="Dezembro";
endif;
return $l.', '.date('j').' de '.$F.' de '.date('Y');
}
/** * mensagem padrão de erro
* @param
* @return string
* @staticvar {@source} */
function erro($msg,$arquivo,$linha,$funcao=false,$classe=false,$metodo=false){
$string_erro='Erro: '.$msg.' em '.$arquivo.' na linha '.$linha.'<br/>';
if($funcao) $string_erro.='função '.$funcao;
if($classe) $string_erro.='classe '.$classe;
if($metodo) $string_erro.=' método '.$metodo;
die($string_erro);
}
function imoblink_titulo_imovel($item,$indice=null){
if(isset($indice)): $tituloitem=mysql_result($item,$indice,imovel_cidade);
if(mysql_result($item,$indice,imovel_condominio)) $tituloitem.=" ".mysql_result($item,$indice,imovel_condominio);
return $tituloitem.=" ".mysql_result($item,$indice,imovel_categoria);
else: $tituloitem=$item[imovel_cidade];
if($item[imovel_condominio]) $tituloitem.=" ".$item[imovel_condominio];
return $tituloitem.=" ".$item[imovel_categoria];
endif;
}
function valor_expresso($valor){
$valor_partes=explode('.',number_format($valor,2,'.',''));
$unidade_expressa=array('um','dois','três','quatro','cinco','seis','sete','oito','nove');
$dezena_expressa=array(20=>'vinte',30=>'trinta',40=>'quarenta',50=>'cinqüenta',60=>'secenta',70=>'setenta',80=>'oitenta',90=>'noventa');
for($dezena=20;$dezena<91;$dezena+=10):
if($valor_partes[0]==$dezena) $valor_expresso=$dezena_expressa[$dezena];
for($unidade=1;$unidade<10;$unidade++):
if($valor_partes[0]==($dezena+$unidade)) $valor_expresso=$dezena_expressa[$dezena].' e '.$unidade_expressa[($unidade-1)];
endfor;
endfor;
$valor_expresso.=' reais';
return $valor_expresso;
}
function timestamp_extenso($timestamp){
$timestamp_extenso=substr($timestamp,6,2).' de ';
if(substr($timestamp,4,2)==1) $timestamp_extenso.='Janeiro';
elseif(substr($timestamp,4,2)==2) $timestamp_extenso.='Fevereiro';
elseif(substr($timestamp,4,2)==3) $timestamp_extenso.='Março';
elseif(substr($timestamp,4,2)==4) $timestamp_extenso.='Abril';
elseif(substr($timestamp,4,2)==5) $timestamp_extenso.='Maio';
elseif(substr($timestamp,4,2)==6) $timestamp_extenso.='Junho';
elseif(substr($timestamp,4,2)==7) $timestamp_extenso.='Julho';
elseif(substr($timestamp,4,2)==8) $timestamp_extenso.='Agosto';
elseif(substr($timestamp,4,2)==9) $timestamp_extenso.='Setembro';
elseif(substr($timestamp,4,2)==10) $timestamp_extenso.='Outubro';
elseif(substr($timestamp,4,2)==11) $timestamp_extenso.='Novembro';
elseif(substr($timestamp,4,2)==12) $timestamp_extenso.='Dezembro';
return $timestamp_extenso.=' de '.substr($timestamp,0,4);
}
function _date($date){
return substr($date,8,2).'/'.substr($date,5,2).'/'.substr($date,0,4);
}
function datetime_extenso($datetime){
$datetime_extenso=substr($datetime,8,2).' de ';
if(substr($datetime,5,2)==1) $datetime_extenso.='Janeiro';
elseif(substr($datetime,5,2)==2) $datetime_extenso.='Fevereiro';
elseif(substr($datetime,5,2)==3) $datetime_extenso.='Março';
elseif(substr($datetime,5,2)==4) $datetime_extenso.='Abril';
elseif(substr($datetime,5,2)==5) $datetime_extenso.='Maio';
elseif(substr($datetime,5,2)==6) $datetime_extenso.='Junho';
elseif(substr($datetime,5,2)==7) $datetime_extenso.='Julho';
elseif(substr($datetime,5,2)==8) $datetime_extenso.='Agosto';
elseif(substr($datetime,5,2)==9) $datetime_extenso.='Setembro';
elseif(substr($datetime,5,2)==10) $datetime_extenso.='Outubro';
elseif(substr($datetime,5,2)==11) $datetime_extenso.='Novembro';
elseif(substr($datetime,5,2)==12) $datetime_extenso.='Dezembro';
return $datetime_extenso.=' de '.substr($datetime,0,4);
}
function prazo($date=null,$meses=12){
if(!isset($date)) return date("d/m/Y",mktime(0,0,0,(date("m")+$meses)));
return date("d/m/Y",mktime(0,0,0,(substr($date,5,2)+$meses),substr($date,8,2),substr($date,0,4)));
}
/** *conversão de nome de domínio em nome de um site para constar no assunto de e-mails
* @date 12/06/2006
* @version 0.0
* @package global */
function dominio_nome($dominio){
$extensoes=array('.com','.net','.org','.nom','.imb','.br');
return ucfirst(str_replace($extensoes,'',$dominio));
}
/** *conversão de nome de domínio em nome de usuário
* @date 12/06/2006
* @version 0.0
* @package global */
function dominio_usuario($dominio){
$extensoes=array('.com','.net','.org','.nom','.imb','.br');
return str_replace($extensoes,'',$dominio);
}
?>