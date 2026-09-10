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

        ?>

            <div class="col-md-6 d-flex ftco-animate">

                <div class="blog-entry justify-content-end">
                    <a href="posts/<?php echo (int) $post['id']; ?>/<?php echo htmlspecialchars(Core\Helpers\slugify($post['title']) ?? '', ENT_QUOTES, 'UTF-8'); ?>.html" class="block-20" style="background-image: url('images/<?php echo htmlspecialchars(rawurlencode($post['image'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>');">
                    </a>
                    <div class="text p-4 float-right d-block">
                        <div class="topper d-flex align-items-center">
                            <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                <span class="day"><?php echo \Core\Helpers\dateFormator($post['created_at'], 'd'); ?></span>
                            </div>
                            <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                <span class="yr"><?php echo \Core\Helpers\dateFormator($post['created_at'], 'Y'); ?></span>
                                <span class="mos"><?php echo \Core\Helpers\dateFormator($post['created_at'], 'F'); ?></span>
                            </div>
                        </div>
                        <h3 class="heading mb-3"><a href="posts/<?php echo (int) $post['id']; ?>/<?php echo htmlspecialchars(Core\Helpers\slugify($post['title']) ?? '', ENT_QUOTES, 'UTF-8'); ?>.html"><?php echo htmlspecialchars($post['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?></a></h3>
                        <p><?php echo htmlspecialchars($post['resume'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                        <p><a href="posts/<?php echo (int) $post['id']; ?>/<?php echo htmlspecialchars(Core\Helpers\slugify($post['title']) ?? '', ENT_QUOTES, 'UTF-8'); ?>.html" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="row mt-5">
        <div class="col text-center">
            <div class="block-27">
                <?php if (!empty($hasMorePosts)): ?>
                    <?php $publicPath = rtrim(PUBLIC_BASE_URL, '/'); ?>
                    <ul>
                        <li><a href="<?php echo htmlspecialchars($publicPath ?? '', ENT_QUOTES, 'UTF-8'); ?>/page/<?php echo (int) $page + 1; ?>">+</a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>