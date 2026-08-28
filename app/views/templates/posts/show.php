<?php

/** @var array $post
 * @var array $tags
 * @var array $author
 * @var array $comments
 * ../app/views/templates/posts/index.php
 * 
 * var disp $posts array (array (id,title,created_at,resume,image,content,authors_id, category_id))
 * var disp $tags array ( id, name )
 * var disp $author array (authorId, lastname, firstname, biography, authorImage )
 * var disp $comments array ( commentsId, pseudo, commentContent, commentCreatedAt)
 * 
 *  echo date('F,d Y \a\t g:ia', $created_at);  F=mois d=jour Y annee 4 chif \a\t =at g=heure i=sec a=am/pm
 */

?>

<p class="mb-5">
              <img src="images/<?php echo $post['image'] ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="img-fluid">
            </p>

            <h1 class="mb-3 h1"><?php echo htmlspecialchars($post['title']); ?></h1>
            <p><?php echo htmlspecialchars($post['content']);?></p>
           
            <h2 class="mb-3 mt-5">#2. Creative WordPress Themes</h2>
            <p>Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.</p>
            <p class="mb-5">
              <img src="images/image_2.jpg" alt="" class="img-fluid">
            </p>
            <p>Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.</p>
            <p>Odit voluptatibus, eveniet vel nihil cum ullam dolores laborum, quo velit commodi rerum eum quidem pariatur! Quia fuga iste tenetur, ipsa vel nisi in dolorum consequatur, veritatis porro explicabo soluta commodi libero voluptatem similique id quidem? Blanditiis voluptates aperiam non magni. Reprehenderit nobis odit inventore, quia laboriosam harum excepturi ea.</p>
            <p>Adipisci vero culpa, eius nobis soluta. Dolore, maxime ullam ipsam quidem, dolor distinctio similique asperiores voluptas enim, exercitationem ratione aut adipisci modi quod quibusdam iusto, voluptates beatae iure nemo itaque laborum. Consequuntur et pariatur totam fuga eligendi vero dolorum provident. Voluptatibus, veritatis. Beatae numquam nam ab voluptatibus culpa, tenetur recusandae!</p>
            <p>Voluptas dolores dignissimos dolorum temporibus, autem aliquam ducimus at officia adipisci quasi nemo a perspiciatis provident magni laboriosam repudiandae iure iusto commodi debitis est blanditiis alias laborum sint dolore. Dolores, iure, reprehenderit. Error provident, pariatur cupiditate soluta doloremque aut ratione. Harum voluptates mollitia illo minus praesentium, rerum ipsa debitis, inventore?</p>
            <div class="tag-widget post-tag-container mb-5 mt-5">
              <div class="tagcloud">
                <?php foreach ($tags as $tag): ?>
                <a href="tag/<?php echo $tag['tagsId']; ?>/<?php echo Core\Helpers\slugify($tag['tagsName']); ?>.html" class="tag-cloud-link"><?php echo $tag['tagsName']; ?></a>
                <?php endforeach; ?>
              </div>
            </div>

            <div class="about-author d-flex p-4 bg-light">
              <div class="bio mr-5">
                <img src="images/<?php echo $author['authorImage']; ?>" alt="<?php echo $author['lastname']; ?> <?php echo $author['firstname']; ?>" class="img-fluid mb-4">
              </div>
              <div class="desc">
                <h3><?php echo $author['firstname']; ?> <?php echo $author['lastname']; ?></h3>
                <p><?php echo $author['biography']; ?></p>
              </div>
            </div>


            <div class="pt-5 mt-5">
              <h3 class="mb-5"><?php echo count($comments); ?> Comments</h3>
              <ul class="comment-list">
                <?php foreach($comments as $comment):
                  $created_at = strtotime($comment['commentCreatedAt']); ?>
                <li class="comment">
                  <div class="comment-body">
                    <h3><?php echo $comment['pseudo']; ?></h3>
                    <div class="meta mb-3"><?php echo date('F,d Y \a\t g:ia', $created_at); ?></div>
                    <p><?php echo $comment['commentContent']; ?></p>
                  </div>
                </li>
                <?php endforeach; ?>

                
              </ul>
              <!-- END comment-list -->

              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="#" class="p-5 bg-light" method="post">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="postId" value="4" />
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
            </div>