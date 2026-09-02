<?php

/** @var array $posts 
 * @var int $page
 * ../app/views/templates/posts/index.php
 * 
 * var disp $posts array (array (id,title,created_at,resume,image,content,authors_id, category_id))
 */

?>

<div class="container">
    <div class="row d-flex">
        <?php foreach ($posts as $post):
            $created_at = strtotime($post['created_at']);
        ?>

            <div class="col-md-6 d-flex ftco-animate">

                <div class="blog-entry justify-content-end">
                    <a href="posts/<?php echo $post['id']; ?>/<?php echo Core\Helpers\slugify($post['title']); ?>.html" class="block-20" style="background-image: url('images/<?php echo $post['image'] ?>');">
                    </a>
                    <div class="text p-4 float-right d-block">
                        <div class="topper d-flex align-items-center">
                            <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                <span class="day"><?php echo date('d', $created_at); ?></span>
                            </div>
                            <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                <span class="yr"><?php echo date('Y', $created_at); ?></span>
                                <span class="mos"><?php echo date('F', $created_at); ?></span>
                            </div>
                        </div>
                        <h3 class="heading mb-3"><a href="posts/<?php echo $post['id']; ?>/<?php echo Core\Helpers\slugify($post['title']); ?>.html"><?php echo $post['title']; ?></a></h3>
                        <p><?php echo $post['resume'] ?></p>
                        <p><a href="posts/<?php echo $post['id']; ?>/<?php echo Core\Helpers\slugify($post['title']); ?>.html" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="row mt-5">
        <div class="col text-center">
            <div class="block-27">
                <?php if (!empty($hasMorePosts)): ?>
                    <?php $publicPath = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/'); ?>
                    <ul>
                        <li><a href="<?php echo $publicPath; ?>/page/<?php echo $page + 1; ?>">+</a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>