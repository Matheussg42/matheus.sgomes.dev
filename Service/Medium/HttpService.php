<?php
namespace Service\Medium;

use JonathanTorres\MediumSdk\Medium;
use Service\Medium\Config;

class HttpService {

    private $medium;

    public function __construct($client)
    {
        $credentials = [
            'client-id' => $client,
            'client-secret' => client_secret,
            'redirect-url' => 'https://matheus.sgomes.dev/callback',
            'state' => 'somesecret',
            'scopes' => 'listPublications, basicProfile',
        ];
    
        $this->medium = new Medium($credentials);
        return $this->medium;
    }

    public function getUser(){
        $user = $this->medium->getAuthenticatedUser();

        return $user;
    }

    public function getPosts(){
        $jsonResult = $this->medium->getAuthenticatedUser();
        $user = json_decode($jsonResult);

        $publications = $medium->publications("@"+$user['username'])->data;

        var_dump($publications);
        die();

    }


}