function validar(){ nome=document.contato.nome;
if(nome.value.length==0){ alert('Digite seu nome');
nome.focus();
return false;}
email=document.contato.email;
if(email.value.length==0){ alert('Digite seu e-mail');
email.focus(); 
return false;}
if(email.value.indexOf('@', 0) == -1 ||email.value.indexOf('.', 0) == -1) { alert('E-mail inválido');
email.focus(); 
return false;}
mensagem=document.contato.mensagem;
if(mensagem.value.length==0){ alert('Digite sua Mensagem');
mensagem.focus();
return false;}}
