<?php
 
require __DIR__ . '/Service/Medium/Post.php';


$url = "https://medium.com/@matheussg/latest?format=json";

$ch = curl_init();
$timeout = 5;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$data = curl_exec($ch);
curl_close($ch);



$body = json_decode(str_replace('])}while(1);</x>', '', $data));


foreach($body->payload->references->Post as $post){
    
    $GetPost = new \Post($post);

    var_dump($GetPost);
    echo "<br>";
    echo "========================================================================================================================================================================================================================================";
    echo "<br>";
}



// var_dump($body->payload->references->Post);