<?php

/**
 * @param $dir
 * @return  array
 */
function dir_images($dir){
//    $dir = "./images/";  //要获取的目录
//先判断指定的路径是不是一个文件夹
    $arr = array();
    if (is_dir($dir)){
        if ($dh = opendir($dir)){
            while (($file = readdir($dh))!= false){
                //文件名的全路径 包含文件名
                $path = $dir.$file;
                if(@file_get_contents($path)){
                    $arr[] = $path;
                }
            }
            closedir($dh);
        }
    }
    return $arr;

}