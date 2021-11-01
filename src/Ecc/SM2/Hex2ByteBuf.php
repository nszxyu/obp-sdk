<?php
//
namespace Xyz\Obp\Ecc\SM2;

class Hex2ByteBuf
{

    public static function ConvertGmp2ByteArray( $GmpData ): array
    {
        $HexStr = gmp_strval( $GmpData, 16 );
        $OutBuf = Hex2ByteBuf::HexStringToByteArray( $HexStr );
        return $OutBuf;
    }

    public static function ByteArrayToHexString( $b, $nlen=null ): string
    {
        $outstring = array();
        $nlen = $nlen == null ? count($b):0;
        for ( $n = 0; $n<$nlen; $n++ )
        {
            $outstring[] =  Hex2ByteBuf::myhex( $b[$n] );
        }
        return  implode("",$outstring);
    }

    private static function myhex($indata): string
    {
        $temp_1 = $indata/16;
        if ( $temp_1<10 )
        $temp_1 = $temp_1+0x30;
        else
        $temp_1 = $temp_1+0x41-10;

        $temp_2 = $indata% 16;
        if ( $temp_2<10 )
        $temp_2 = $temp_2+0x30;
        else
        $temp_2 = $temp_2+0x41-10;

        return chr( $temp_1 ) . chr( $temp_2 );
    }

    public static function HexStringToByteArray($InString): array
    {
        $b = [];
        for ( $m = strlen( $InString ); $m<64; $m++ )
        {
            $InString = '0' . $InString;
        }
        $i = 0;
        $nlen = strlen( $InString );

        for( $n = 0;
        $n<$nlen;
        $n = $n+2 )
        {
            $temp = substr( $InString, $n, 2 );
            $temp = '0x' . $temp;
            $b[$i] = hexdec( $temp ) ;
            $i = $i + 1;
        }
        return $b;
    }
}