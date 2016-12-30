<?php

function get_array_value($array, $key, $def = NULL)
{
    $value = array_key_exists($key, $array) ? $array[$key] : $def;
    return $value ? $value : $def;
}

function flip_x($source)
{
    $width  = imagesx($source);
    $height = imagesy($source);

    //创建一个新的图片资源，用来保存沿Y轴翻转后的图片
    $new = imagecreatetruecolor($width, $height);
    //沿y轴翻转就是将原图从右向左按一个像素宽度向新资源中逐个复制
    for ($x = 0; $x < $width; $x++)
    {
        //逐条复制图片本身高度，1个像素宽度的图片到薪资源中
        imagecopy($new, $source, $width - $x - 1, 0, $x, 0, 1, $height);
    }
    //保存翻转后的图片
    return $new;
}

function flip_y($source)
{
    $width  = imagesx($source);
    $height = imagesy($source);

    //创建一个新的图片资源，用来保存沿Y轴翻转后的图片
    $new = imagecreatetruecolor($width, $height);
    //沿y轴翻转就是将原图从右向左按一个像素宽度向新资源中逐个复制
    for ($y = 0; $y < $height; $y++)
    {
        //逐条复制图片本身高度，1个像素宽度的图片到薪资源中
        imagecopy($new, $source, 0, $height - $y - 1, 0, $y, $width, 1);
    }
    return $new;
}

function color_ver($num)
{
    $num = intval($num);
    if ($num < 0) return 0;
    if ($num > 255) return 255;
    return $num;
}