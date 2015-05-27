<?php
/**
 * Created by PhpStorm.
 * User: appdiv
 * Date: 11/7/13
 * Time: 7:43 AM
 */
function genRandomString($len = 10) {
    $chars = '0123456789abcdefghijklmopqrstuvwxyz';
    $string = "";
    for ($i = 0; $i <= $len; $i++) {
        $string .= $chars[mt_rand(0, strlen($chars) - 1)];
    }
    return $string;
}

function send_email($to,$subject, $message ) {
    $ci=get_instance();
    $header = '<div>
    <div id="header" style="overflow: hidden;background: #242424; height: 60px;">
    <img src="' . base_url('/images/logo.png') .  '"/>
    </div>
    <div id="content" style="overflow: hidden;background:url(\'http://bzzbook.net/images/main_bg.png\')no-repeat scroll 0 0 #E9E7E8">
    <div style="margin:40px;background: white;padding: 20px;">' .
        $message
        . '</div>
    </div>
    <div id="footer" style="overflow: hidden;background: #242424; height: 40px;padding: 10px;">
    <p style="color: #555354;">Bzzbook &copy; 2013 <span style="color: white;">English (US)</span></p>
    </div>
    </div>';
    $message = ' <div style="width: 500px;">' . $header . '</div>';
    $ci->email->from('manikanta@ayatas.com', 'Bzzbook System Admin');
    $ci->email->to($to);
    $ci->email->subject($subject);
    $ci->email->message($message);
    $sent=$ci->email->send();
    return $sent;
}

function time_zones() {
    $list = DateTimeZone::listAbbreviations();
    $idents = DateTimeZone::listIdentifiers();

    $data = $offset = $added = array();
    foreach ($list as $abbr => $info) {
        foreach ($info as $zone) {
            if (!empty($zone['timezone_id']) AND
                !in_array($zone['timezone_id'], $added) AND
                in_array($zone['timezone_id'], $idents)) {
                $z = new DateTimeZone($zone['timezone_id']);
                $c = new DateTime(null, $z);
                $zone['time'] = $c->format('H:i a');
                $data[] = $zone;
                $offset[] = $z->getOffset($c);
                $added[] = $zone['timezone_id'];
            }
        }
    }

    array_multisort($offset, SORT_ASC, $data);
    $options = array();
    foreach ($data as $key => $row) {
        $zones = $row['timezone_id'] . ' ' . formatOffset($row['offset']);
        $options[$zones] = preg_replace('/_/',' ',$zones);
    }
    ksort($options);
    return $options;
}
function formatOffset($offset) {
    $hours = $offset / 3600;
    $remainder = $offset % 3600;
    $sign = $hours > 0 ? '+' : '-';
    $hour = (int) abs($hours);
    $minutes = (int) abs($remainder / 60);

    if ($hour == 0 AND $minutes == 0) {
        $sign = ' ';
    }
    return 'GMT' . $sign . str_pad($hour, 2, '0', STR_PAD_LEFT)
    . ':' . str_pad($minutes, 2, '0');
}
function prepare_input_for_insert($index,$filed,$user_input)
{
    $input=array();
    foreach ($filed as $key => $value) {
        if(isset($user_input[$value]))
        {
            if(isset($user_input[$value][$index]) && is_array($user_input[$value]))
            {
                $input[$value]=$user_input[$value][$index];
            }
            else
            {
                if(!is_array($user_input[$value]))
                {
                    $input[$value]=$user_input[$value];
                }
            }
        }
    }
    return $input;
}