<?php
// phpinfo();

require ('Service/Medium/MediumService.php');
use Service\Medium\MediumService;

$GetMedium = new MediumService();
$user = $GetMedium->getUser();
$posts = $GetMedium->getPosts();