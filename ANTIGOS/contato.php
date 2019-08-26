<?php $site=new site($_REQUEST[secao],$_REQUEST); ?>
<img src="images/title-contact.jpg" alt="Contato" /> 
 <p>Linha direta com o Cliente, atendimento on line  para "Dúvidas e Sugestões". Para 
    melhor atendê-lo, preencha o formulário abaixo ou ligue para: <strong><?php echo strtelefone($site->site[telefone]).""; ?></strong>
</p>
<script type='text/javascript' src='contato.js'></script>
<form id='ContactForm' name='contato' action='index.php?secao=contato' method='post' onsubmit='return validar()'>
<input type='hidden' name='acao' value='adicionarcontato'/>
<p><label for="formname">Nome: </label><br /><input id='formname' name='nome' /></p>
<p><label for="formmobile">Telefone: </label><br /><input id='formmobile' name='telefone' /></p>
<p><label for="formemail">Email: </label><br /><input id='formemail' name='email' /></p>
<p><label for="formmessage">Mensagem: </label><br /><textarea id='formmessage' name='mensagem' rows='6' cols='40'></textarea></p>
<input class='button' type='submit' value='ENVIAR' name='Submit' /> </form>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<script type='text/javascript'>
document.contato.nome.focus();
</script>
