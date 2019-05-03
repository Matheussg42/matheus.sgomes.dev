<?php
// phpinfo();

require ('Service/Medium/MediumService.php');
use Service\Medium\MediumService;

$GetMedium = new MediumService();
$user = $GetMedium->getUser();
$posts = $GetMedium->getPosts();

?>

<div class="section blog" id="blog-section">
    <div class="title">Blog</div>
    <div class="row">

    <?php
        $i = 0;
        foreach($posts as $post){
            if($i < 2){

                $cover = $post->virtuals->previewImage->imageId;
                $title = $post->title;
                $subtitle = $post->virtuals->subtitle;
                $slug = $post->uniqueSlug;

                // echo "<pre>";
                // var_dump($post->uniqueSlug);
                // echo "</pre>";
                // echo "<br>------<br>";
                
                ?>
                <div class="col col-m-12 col-t-6 col-d-6">
                    <div class="blog_item" data-sr-id="25" style="; visibility: visible;  -webkit-transform: translateY(0) scale(1); opacity: 1;transform: translateY(0) scale(1); opacity: 1;-webkit-transition: all 0.4s ease 0s, -webkit-transform 0.5s cubic-bezier(0.6, 0.2, 0.1, 1) 0s, opacity 0.5s cubic-bezier(0.6, 0.2, 0.1, 1) 0s; transition: all 0.4s ease 0s, transform 0.5s cubic-bezier(0.6, 0.2, 0.1, 1) 0s, opacity 0.5s cubic-bezier(0.6, 0.2, 0.1, 1) 0s; ">
                        <div class="image">
                            <a target="_blank" href="https://medium.com/@matheussg/<?= $slug?>"><img src="https://cdn-images-1.medium.com/max/1600/<?= $cover?>" alt=""></a>
                        </div>
                        <div class="content-box">
                            <div class="i_title">
                                <div class="icon"><strong>27</strong> July</div>
                            </div>
                            
                            <a target="_blank" href="https://medium.com/@matheussg/<?= $slug?>" class="name"><?= $title?></a>
                            <p>
                                <?= $subtitle?>
                            </p>
                            <a target="_blank" href="https://medium.com/@matheussg/<?= $slug?>" class="btn btn_animated"><span class="circle">Leia Mais</span></a>
                        </div>
                    </div>
                </div>
            <?php 
            }
            $i += 1;
        }
    ?>

        
    </div>
    <div class="bts align-center">
        <a target="_blank" href="https://medium.com/@matheussg/" class="btn btn_animated"><span class="circle">Veja todos os Posts</span></a>
    </div>
</div>