<?php

if(!function_exists('split')){
    function split($data) {
        if(str_contains($data, '|'))
        {
            return explode("|",$data);
        }
        return $data= ['',$data];
    }
}

if(!function_exists('format_rupiah')){
   function format_rupiah($angka){ 
    $hasil = 'Rp. '.number_format($angka,0, ',' , '.'); 
    return $hasil; 
   }
}