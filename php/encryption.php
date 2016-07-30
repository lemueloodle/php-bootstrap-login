<?php
error_reporting(null);
## Clean the input from script, html, style, and almost all potenially harmful tags.
function clean_input($input) {
    $search = array(
        '@<script[^>]*?>.*?</script>@si',   /* strip out javascript */
        '@<[\/\!]*?[^<>]*?>@si',            /* strip out HTML tags */
        '@<style[^>]*?>.*?</style>@siU',    /* strip style tags properly */
        '@<![\s\S]*?--[ \t\n\r]*>@'         /* strip multi-line comments */
    );
    $input = mb_convert_encoding($input, 'HTML-ENTITIES', 'UTF-8');
    $output = preg_replace($search, '', $input);

    return $output;
}
function clean_inputx($input) {
    $search = array(
        '@<script[^>]*?>.*?</script>@si',   /* strip out javascript */
        '@<![\s\S]*?--[ \t\n\r]*>@'         /* strip multi-line comments */
    );
    $input = mb_convert_encoding($input, 'HTML-ENTITIES', 'UTF-8');
    $output = preg_replace($search, '', $input);
    return $output;
}
function remove_space($input){
    $output = str_replace(array("\r\n", "\r"), "\n", $input);
    $lines = explode("\n", $output);
    $new_lines = array();

    foreach ($lines as $i => $line) {
        if(!empty($line))
            $new_lines[] = trim($line);
    }
    return implode($new_lines);
}
function crypto_rand_secure($min, $max) {
    $range = $max - $min;
        if($range < 0) return $min; ## Not so random
    $log = log($range, 2);
    $bytes = (int) ($log / 8) + 1; ## Length in bytes
    $bits = (int) $log + 1; ## Length in bits
    $filter = (int) (1 << $bits) - 1; ## Set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; ## Discard irrelevant bits
        } while ($rnd >= $range);
    return $min + $rnd;
}
function get_token($length) {
    $token = '';
    $codeAlphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $codeAlphabet .= 'abcdefghijklmnopqrstuvwxyz';
    $codeAlphabet .= '0123456789';
        for($i=0; $i<$length; $i++) {
            $token .= $codeAlphabet[crypto_rand_secure(0, strlen($codeAlphabet))];
        }
    return $token;
}
function get_tokenx($length) {
    $token = '';
    $codeAlphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $codeAlphabet .= 'abcdefghijklmnopqrstuvwxyz';
    $codeAlphabet .= '0123456789';
        for($i=0; $i<$length; $i++) {
            $token .= $codeAlphabet[crypto_rand_secure(0, strlen($codeAlphabet))];
        }
    if(isset($_SESSION['take_query'])==null)
        return $token;
    else
        return null;
}
function encrypt_token($data){
    $aqnx = $data;
    $keystone = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
    $key_size =  strlen($keystone);
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $aqnx = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $keystone, $aqnx, MCRYPT_MODE_CBC, $iv);
    $aqnx = $iv . $aqnx;
    $aqnx = base64_encode($aqnx);
    $aqnx = strtr( $aqnx, "+/", "-_");
    $encrypted = stristr($aqnx, "=", true);
    return $encrypted;
}
//Question number for Answering decrypt
function dcrypt_token($data){
   $a = strtr($data, "-_", "+/" );
    $keystone = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $ciphertext_dec = base64_decode($a);
    $iv_dec = mb_substr($ciphertext_dec, 0, $iv_size);
    $ciphertext_dec = mb_substr($ciphertext_dec, $iv_size);
    $a = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $keystone, $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
    $a = rtrim($a);
    return $a;
}

?>