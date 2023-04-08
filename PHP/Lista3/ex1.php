<!-- Crie um script que gere um arquivo com o seu nome e a extensão “.txt”, abra-o e guarde 03 frases nele. Depois crie um script que imprima o conteúdo gravado nesse arquivo. -->

<?php 
$arquivo = fopen('martarelli.txt','w'); 
if ($arquivo !== false)  
{
    for ($i=1; $i <= 3 ; $i++) { 
        $frase = "Salvando frase ". $i."...\n";
        fwrite($arquivo, $frase);
    }
}
fclose($arquivo);

$arquivo = fopen('martarelli.txt','r'); 
while (!feof($arquivo)) {
    # code...
    echo fgets($arquivo)."<br/>";
}
fclose($arquivo);
?>