<h3>Categories</h3>
                <?php include_once '../app/models/categoriesModel.php';
                global $conn;
                $categories = \App\Models\CategoriesModel\findAll($conn);
                
                foreach ($categories as $category) : ?>
                <li><a href="categories/<?php echo $category['id']; ?>/<?php echo Core\Helpers\slugify($category['name']); ?>.html"> <?php echo $category['name']; ?> <span class="ion-ios-arrow-forward"></span></a></li>

                <?php endforeach; ?>