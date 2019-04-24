<?php
namespace Service\Medium;

class MediumService {

    private $medium;

    public function __construct()
    {
        $url = "https://medium.com/@matheussg/latest?format=json";

        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $return = curl_exec($ch);
        curl_close($ch);

        $this->medium  = json_decode(str_replace('])}while(1);</x>', '', $return));
    }

    public function getUser(){
        return $this->medium->payload->user;
    }

    public function getPosts(){
        return $this->medium->payload->references->Post;
    }


}