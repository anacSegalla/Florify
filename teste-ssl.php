<?php
echo '<pre>';
echo 'php.ini carregado: ' . php_ini_loaded_file() . "\n";
echo 'curl.cainfo: ' . var_export(ini_get('curl.cainfo'), true) . "\n";
echo 'openssl.cafile: ' . var_export(ini_get('openssl.cafile'), true) . "\n";

$caminho = 'C:/wamp64/bin/php/cacert.pem';
echo 'arquivo existe? ' . var_export(file_exists($caminho), true) . "\n\n";

$ch = curl_init('https://api.openai.com/v1/models');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CAINFO         => $caminho,
    CURLOPT_TIMEOUT        => 20,
]);
curl_exec($ch);
echo 'erro cURL: ' . var_export(curl_error($ch), true) . "\n";
echo 'HTTP: ' . curl_getinfo($ch, CURLINFO_HTTP_CODE) . "\n";
?>