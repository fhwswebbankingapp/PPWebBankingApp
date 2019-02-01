<?php

function test_iban( $iban ) {
    $iban = str_replace( ' ', '', $iban );
    $iban1 = substr( $iban,4 )
        . strval( ord( $iban{0} )-55 )
        . strval( ord( $iban{1} )-55 )
        . substr( $iban, 2, 2 );

    $rest=0;
    for ( $pos=0; $pos<strlen($iban1); $pos+=7 ) {
        $part = strval($rest) . substr($iban1,$pos,7);
        $rest = intval($part) % 97;
    }
    $pz = sprintf("%02d", 98-$rest);

    if ( substr($iban,2,2)=='00') {
        return substr_replace( $iban, $pz, 2, 2 );
    }
    else {
        return ($rest==1) ? true : false;
    }
}

?>

