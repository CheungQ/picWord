<?php

require_once 'func.php';
require_once 'image.php';

$fonts = [
    '宋体'      => 'simsun.ttc',
    '黑体'      => 'simhei.ttf',
    '方正舒体'    => 'FZSTK.TTF',
    '华文彩云'    => 'STCAIYUN.TTF',
    '微软雅黑'    => 'msyh.ttc',
    '微软雅黑 粗体' => 'msyhbd.ttc',
    '微软雅黑 细体' => 'msyhl.ttc',
];

$image_dir_path = "./images/";
$images = dir_images($image_dir_path);
//$images = [
//    'images/bg.jpg',
//    'images/dawa.jpg'
//];

$def_font_size = 17;
$def_font      = '微软雅黑';
$def_title     = '可你也不能当众撸管啊！';
$def_img_index = 0;

$def_text_color_r = 0;
$def_text_color_g = 0;
$def_text_color_b = 0;

if ($_REQUEST)
{
    $str  = get_array_value($_REQUEST, 'title', $def_title);
    $font = get_array_value($_REQUEST, 'font', $def_font);
    $font = get_array_value($fonts, $font, $fonts[$def_font]);

    $img = intval(get_array_value($_REQUEST, 'img', $def_img_index));
    $img = get_array_value($images, $img, $images[$def_img_index]);

    $font_size = intval(get_array_value($_REQUEST, 'font_size', $def_font_size));
    $flip_h    = boolval(get_array_value($_REQUEST, 'flip_h'));

    $text_color_r = color_ver(get_array_value($_REQUEST, 'tcolor_r', $def_text_color_r));
    $text_color_g = color_ver(get_array_value($_REQUEST, 'tcolor_g', $def_text_color_g));
    $text_color_b = color_ver(get_array_value($_REQUEST, 'tcolor_b', $def_text_color_b));


    $img_str = file_get_contents($img);
    $source  = imagecreatefromstring($img_str);
    unset($img_str);
    if ($flip_h)
    {
        $new = flip_x($source);
        imagedestroy($source);
        $source = $new;
    }

    $width  = imagesx($source);
    $height = imagesy($source);


    $font = "C:/Windows/Fonts/" . $font;
    if ($font_size < 5) $font_size = 5;

    $size = imagettfbbox($font_size, 0, $font, $str);

    $font_width  = $size[4] - $size[6];
    $font_height = $size[1] - $size[7];

    $color = imagecolorallocate($source, $text_color_r, $text_color_g, $text_color_b);


    imagefttext($source, $font_size, 0, ($width - $font_width) / 2, $height - 10, $color, $font, $str);

    header('Content-type:image/jpg');
    imagejpeg($source);
    imagedestroy($source);
}
else
{
    require 'views/bq.php';
}


