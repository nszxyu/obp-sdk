<?php
namespace Xyz\Obp\Ecc;


use Xyz\Obp\Ecc\SM4\Sm4;

class MySm4 {
    protected $sm4;

    function __construct() {
        $this->sm4 = new Sm4();
    }

    public function encrypt( $key, $data ) {
        // this is ecb
        return $this->sm4->encrypt( $key, $data );
    }

    public function decrypt( $key, $data ) {
        // this is ecb
        return $this->sm4->decrypt( $key, $data );
    }

    // @todo  cbc encrypt and ddecrypt
}