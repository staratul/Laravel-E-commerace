<?php

namespace App\Helper;

use DateTime;

class Helper
{
    static function dateFormat($date)
    {
        $createDate = new DateTime($date);
        $strip = $createDate->format('Y-m-d');
        $d = date(DATE_RFC2822, strtotime($strip));
        $variable = substr($d, 0, strpos($d, ' 00:00:00'));
        return $variable;
    }
}
