<?php include_once '../app/models/tagsModel.php';
                global $conn;
                $tags = \App\Models\TagsModel\findAll($conn);
                
                foreach ($tags as $tag) : ?>

                <a href="/tag/<?php echo $tag['id'] ?>" class="tag-cloud-link"><?php echo $tag['name'] ?></a>
                <?php endforeach; ?>