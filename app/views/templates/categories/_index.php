<h3>Categories</h3>
                <?php include_once '../app/models/categoriesModel.php';
                global $conn;
                $categories = \App\Models\CategoriesModel\findAll($conn);
                
                foreach ($categories as $category) : ?>
                <li><a href="/category/<?php echo $category['id'] ?>"> <?php echo $category['name'] ?> <span class="ion-ios-arrow-forward"></span></a></li>

                <?php endforeach; ?>