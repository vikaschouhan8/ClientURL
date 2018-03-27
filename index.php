<?php
/**
 * Author: Vikas Chouhan
 * Date : 27 March 2018
*/
$curl = curl_init();//load curl resourse

$search = 'video game 2016';// what you and to search
$url = "https://www.amazon.in/s/field-keywords=$search";//url to hit
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//store result in a variable called $result

$result = curl_exec($curl);

//https://images-eu.ssl-images-amazon.com/images/I/51Hci-xXxUL._AC_US218_.jpg
// echo $result;
preg_match_all('!https://images-eu.ssl-images-amazon.com/images/I/[^\s]*?._AC_US218_.jpg!', $result, $matches);

// echo "<pre>";
// print_r($matches[0]);

$images = array_unique($matches[0]); // only unique images 

foreach($images as $image){// show result to browser
    // echo "<div>";
    echo "<img src='$image' />";
    // echo "</div>";    
}
curl_close($curl);
?>