<?php
include "partials/admin/header.php";
include "partials/admin/navbar.php";



$article = new Article();

$userId = $_SESSION['user_id'];

$userArticles = $article->getArticlesByUser($userId);

?>



<main class="container my-5">
        <h2 class="mb-4">Welcome <?php echo $_SESSION['username']; ?> to your2 Admin Dashboard</h2>

        <div class="d-flex justify-content-between align-items-center mb-4">
            
            <form class="d-flex align-items-center" method="post" action="<?php echo base_url('create-dummy-articles.php'); ?>">
                <label class="form-label me-3" for="articleCount">Number of Articles</label>
                <input id="articleCount" min="1" style="width: 100px;" class="form-control me-3" name="article_count" type="number">
                <button class="btn btn-primary" type="submit">Generate Articles</button>
            </form>

            <form action="<?php echo base_url('reorder_articles.php'); ?>" method="post">
                <button name="reorder_articles" class="btn btn-warning" type="submit">Reorder Article ID's</button>
            </form>

            <button id="deleteSelected" class="btn btn-danger">Delete Selected Articles</button>

        </div>
        

        <!-- Articles Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Published Date</th>
                        <th>Excerpt</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php if(!empty($userArticles)): ?>
                    <?php foreach($userArticles as $articleItem): ?>

                    <!-- Example Article Row -->
                    <tr>
    
                        <td><?php echo $articleItem->id; ?></td>
                        <td><?php echo $articleItem->title; ?></td>
                        <td><?php echo $_SESSION['username']; ?></td>
                        <td><?php echo $article->formatCreatedAt($articleItem->created_at); ?></td>
                        <td>
                            <?php echo $article->getExcerpt($articleItem->content); ?>
                        </td>
                        <td>
                            <a href="edit_article.php?id=<?php echo $articleItem->id; ?>" class="btn btn-sm btn-primary me-1">Edit</a>
                        </td>

                        <!-- changes for deleting article -->
                        <td>

                            <form method="POST" action="<?php echo base_url("delete_article.php") ?>">
                                <input name="id" value="<?php echo $articleItem->id; ?>" type="hidden">
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>    
                        
                        </td>

                    </tr>
                    <!-- You can add more articles here -->
                    <?php endforeach; ?>
                <?php endif; ?>    
                </tbody>
            </table>
        </div>
    </main>



       



<?php
include "partials/admin/footer.php"

?>



