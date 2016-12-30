<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>可你也不能当众撸管啊！</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="/style/bq.css">
    <script src="/web/js/jquery.min.js"></script>
    <script src="/web/js/colpick.js"></script>
    <script src="/web/js/plugin.js"></script>
    <link rel="stylesheet" href="/web/css/colpick.css">
</head>
<body>
<form target="_blank" method="post">
    <div class="img-box">
        <?php foreach ($images as $key => $value): ?>
            <label>
                <input type="radio" value="<?=$key?>" name="img" <?=$key == $def_img_index ? 'checked' : NULL?>>
                <img src="<?=$value?>">
            </label>
        <?php endforeach ?>
    </div>
    <table>
        <tr>
            <td>请输入想说的内容：</td>
            <td><input type="text" name="title" placeholder="可你也不能当众撸管啊！" id="input_words"></td>
        </tr>
        <tr>
            <td>字体:</td>
            <td>
                <label>
                    <select name="font">
                        <?php foreach ($fonts as $key => $value): ?>
                            <option <?=$key == $def_font ? 'selected' : ''?>><?=$key?></option>
                        <?php endforeach ?>
                    </select>
                </label>
            </td>
        </tr>
        <tr>
            <td>字体大小：</td>
            <td><input type="number" name="font_size" placeholder="" value="<?=$def_font_size?>"></td>
        </tr>
        <tr>
            <td>图片水平翻转：</td>
            <td><input name="flip_h" type="checkbox" value="1" placeholder=""></td>
        </tr>
        <tr>
            <td>文字颜色：</td>
            <td class="rgb">
                <div id="picker"></div>
                <input type="hidden" id="tcolor_r" name="tcolor_r" placeholder="Red">
                <input type="hidden" id="tcolor_g" name="tcolor_g" placeholder="Blue">
                <input type="hidden" id="tcolor_b" name="tcolor_b" placeholder="GREEN">
            </td>
        </tr>
        <tr><td colspan="2"><input type="submit" value="生成" style="width: 100%"></td></tr>
    </table>
</form>
</body>
</html>
