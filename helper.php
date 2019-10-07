<?php

//get assets files

function getPublicFiles($file){
    $path = '/public/'.$file;
    return URL::to($path);
}
//-----------------------------------------
?>