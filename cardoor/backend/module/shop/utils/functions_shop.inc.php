<?php
function generate_Token_secure($longitud){
    if ($longitud < 10) {
        $longitud = 10;
    }
    return bin2hex(openssl_random_pseudo_bytes(($longitud - ($longitud % 2)) / 2));
}