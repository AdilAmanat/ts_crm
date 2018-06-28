<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$_chbo_messages_count = null;

if (!function_exists('in_array_r')) {

    function in_array_r($needle, $haystack, $strict = false) {
        foreach ($haystack as $item) {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
                return true;
            }
        }
        return false;
    }

}
/* * **********************Used for all messages count **************************** */
if (!function_exists('chbo_messages_count')) {

    function chbo_messages_count() {
        global $_chbo_messages_count;

        $CI = & get_instance();
        $CI->load->model('dashboard_counter_model');
        $_chbo_messages_count = $CI->dashboard_counter_model->get_count_all();
        return $_chbo_messages_count;
    }

}
/* * **********************Used for user package count  **************************** */
if (!function_exists('user_package_count')) {

    function user_package_count() {
        $CI = & get_instance();
        $CI->load->model('dashboard_counter_model');
        $_chbo_user_package_count = $CI->dashboard_counter_model->get_count_packages();
        return $_chbo_user_package_count;
    }

}
//Asif add this helper on 11-15-2016
if (!function_exists('time_ago')) {

    function time_ago($d1, $d2) {
        $now = new DateTime($d2);
        $ago = new DateTime($d1);
        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
        if (!$full)
            $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . '' : 'just now';
    }

}
if (!function_exists('stripslashes_deep')) {

    function stripslashes_deep($value) {
        $value = is_array($value) ?
                array_map('stripslashes_deep', $value) :
                stripslashes($value);

        return $value;
    }

}

if (!function_exists('format_date')) {

    function format_date($date) {
        if (empty($date) || $date == '0000-00-00 00:00:00' || $date == '0000-00-00')
            return '-';
        return strftime("%D", strtotime($date));
    }

}

if (!function_exists('array_divide')) {

    function array_divide($array, $segmentCount) {
        $dataCount = count($array);
        if ($dataCount == 0)
            return false;
        $segmentLimit = ceil($dataCount / $segmentCount);
        $outputArray = array_chunk($array, $segmentLimit, true);

        return $outputArray;
    }

}

if (!function_exists('full_url')) {

    function full_url($uri = '') {
        $CI = & get_instance();
        $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
        return $protocol . $_SERVER['HTTP_HOST'] . $CI->config->base_url($uri);
    }

}

if (!function_exists('array_diff_assoc_recursive')) {

    function array_diff_assoc_recursive($array1, $array2) {
        $difference = array();
        foreach ($array1 as $key => $value) {
            if (is_array($value)) {
                if (!isset($array2[$key]) || !is_array($array2[$key])) {
                    $difference[$key] = $value;
                } else {
                    $new_diff = array_diff_assoc_recursive($value, $array2[$key]);
                    if (!empty($new_diff))
                        $difference[$key] = $new_diff;
                }
            } else if (!array_key_exists($key, $array2) || $array2[$key] !== $value) {
                $difference[$key] = $value;
            }
        }
        return $difference;
    }

}

if (!function_exists('array_search_multi')) {

    function array_search_multi($value, $key, $array, $return_element = true) {
        foreach ($array as $k => $val) {
            if ($val[$key] == $value) {
                if (!$return_element)
                    return $k;

                return $val;
            }
        }
        return null;
    }

}
if (!function_exists('captchaVerify')) {

    function captchaVerify($captcha_response) {
//http://www.codexworld.com/new-google-recaptcha-with-php/

        $secretKey = '6LdeOhMTAAAAAEnoLb6t1Ao8rjlKQBbAB9PxfdE0'; //your site secret key
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);

        $responseURL = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $captcha_response . "&remoteip=" . $_SERVER['REMOTE_ADDR'];
        $verifyResponse = file_get_contents($responseURL);
        $responseData = json_decode($verifyResponse);
        if ($responseData->success == true) {
            return true;
        } else {
            return false;
        }
    }

}


if (!function_exists('check_captcha_helper')) {

    function check_captcha_helper($val) {
        $google_url = "https://www.google.com/recaptcha/api/siteverify";
        $secret = '6LdeOhMTAAAAAEnoLb6t1Ao8rjlKQBbAB9PxfdE0';
        $ip = $_SERVER['REMOTE_ADDR'];
        $url = $google_url . "?secret=" . $secret . "&response=" . $val . "&remoteip=" . $ip;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
        $res = curl_exec($curl);
        curl_close($curl);
        $res = json_decode($res, true);
//reCaptcha success check
        if ($res['success']) {
            return true;
        } else {
            //$this->form_validation->set_message('check_captcha_helper', 'The reCAPTCHA field is telling me that you are a robot. Shall we give it another try?');
            return false;
        }
    }

}

if (!function_exists('isBot')) {

    function isBot() {
        if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/bot|crawl|slurp|spider/i', $_SERVER['HTTP_USER_AGENT'])) {
            return true;
        } else {
            return false;
        }
    }

}

if (!function_exists('klog')) {

    function klog($data) {
        file_put_contents(APPPATH . '/logs/' . 'klog.log', PHP_EOL . date("y/m/d h:i:s") . ' - ' . $data . PHP_EOL, FILE_APPEND);
    }

}

if (!function_exists('create_logger')) {

    function create_logger($message, $file_name) {
        file_put_contents(APPPATH . '/logs/' . $file_name, PHP_EOL . date("y/m/d h:i:s") . ' - ' . $message, FILE_APPEND);
    }

}
if (!function_exists('dateFormat')) {

    function dateFormat($date) {
        if (empty($date) || $date == '0000-00-00 00:00:00' || $date == '0000-00-00') {
            $newDate = '';
        } else {
            $newDate = date("m/d/Y", strtotime($date));
        }

        return $newDate;
    }

}
