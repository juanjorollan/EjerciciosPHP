<?php
function usuarioOk($usuario, $contraseña) :bool {
  
   return ($contraseña == strrev($usuario));
    
}

function letraRepetida($frase){
   $arr = str_split($frase);
   $mayor=0;
   $letra="";
   for($i=0;$i<count($arr);$i++){
      
      if(mb_substr_count($frase, $arr[$i])>$mayor){
         $letra=$arr[$i];
         $mayor=mb_substr_count($frase, $arr[$i]);
      }
   }
   echo $letra;
}

function palabraRepetida($frase){
   $arr=str_word_count($frase,1);
   $mayor=0;
   $palabra="";
   for($i=0;$i<count($arr);$i++){
      if(mb_substr_count($frase, $arr[$i])>$mayor){
         $palabra=$arr[$i];
         $mayor=mb_substr_count($frase, $arr[$i]);
      }
   }
   echo $palabra;

}

function noEtiquetas($frase):String{
   return strip_tags($frase);
}
