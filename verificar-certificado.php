
<?php

$caminho = 'C:/wamp64/bin/php/cacert.pem';

echo "<pre>";

echo "PHP: " . PHP_VERSION . "\n";
echo "Arquivo: " . $caminho . "\n";
echo "Existe: ";
var_dump(file_exists($caminho));

echo "É legível: ";
var_dump(is_readable($caminho));

echo "Tamanho: ";
var_dump(filesize($caminho));

echo "Realpath: ";
var_dump(realpath($caminho));

echo "Versão cURL:\n";
print_r(curl_version());

$ch = curl_init('https://api.openai.com/v1/models');

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CAINFO => $caminho,
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_SSL_VERIFYHOST => 2,
    CURLOPT_TIMEOUT => 20
]);

$resultado = curl_exec($ch);

echo "\nErro: ";
var_dump(curl_error($ch));

echo "Código: ";
var_dump(curl_errno($ch));

echo "HTTP: ";
var_dump(curl_getinfo($ch, CURLINFO_HTTP_CODE));

curl_close($ch);

echo "</pre>";
