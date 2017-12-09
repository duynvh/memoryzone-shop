<?php
/**
 * Created by PhpStorm.
 * User: hoangduy
 * Date: 12/8/17
 * Time: 11:03 PM
 */
function stripUnicode($text) {
    if (!$text) {
        return false;
    }
    $unicode = [
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd' => 'đ',
        'D' => 'Đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    ];
    foreach ($unicode as $nonUnicode => $uni) {
        $array = explode("|", $uni);
        $text  = str_replace($array, $nonUnicode, $text);
    }

    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    $text = preg_replace('~[^-\w]+~', '', $text);

    $text = trim($text, '-');

    $text = preg_replace('~-+~', '-', $text);

    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

function convert2Slug($str) {
    $str = trim($str);
    if ($str == "") {
        return "";
    }
    $str = str_replace('"', '', $str);
    $str = str_replace("'", '', $str);
    $str = stripUnicode($str);
    $str = mb_convert_case($str, MB_CASE_LOWER, 'utf-8');
    $str = str_replace(' ', '-', $str);

    return $str;
}

function read_num_vn($num = false) {
    $str = '';
    $num = trim($num);

    $arr   = str_split($num);
    $count = count($arr);

    $f = number_format($num);
    //KHÔNG ĐỌC BẤT KÌ SỐ NÀO NHỎ DƯỚI 999 ngàn
    if ($count < 7) {
        $str = $num;
    }
    else {
        // từ 6 số trở lên là triệu, ta sẽ đọc nó !
        // "32,000,000,000"
        $r = explode(',', $f);
        switch (count($r)) {
            case 4:
                $str = $r[0] . ' Tỷ';
                if ((int)$r[1]) {
                    $str .= ' ' . $r[1] . ' Triệu';
                }
                break;
            case 3:
                $str = $r[0] . ' Triệu';
                if ((int)$r[1]) {
                    $str .= ' ' . $r[1] . 'K';
                }
                break;
        }
    }

    return $str;
}


function renderImage($src, $image) {
    if (isset($image) && !empty($image)) {
        return "<img height='100%' width='100%' src='" . asset($src . $image) . "' alt='" . $image . "'>";
    }
}

function checkInputData($request) {
    return (0 == $request ? 0 : $request);
}

function checkInputString($request) {
    return ("" == $request ? "" : $request);
}