<?php
require __DIR__ . '/init.php';


if(isPostRequest()) {

    if(isset($_POST['reorder_articles'])) {

        $article = new Article();

        try { 
            $article->reorderAndResetAutoIncrement();
            redirect('admin.php');
        } catch (Exception $exception) {
            redirect("admin.php");
        }    
        
        
//        if($article->generateDummyData($_POST['article_count'])) {
//            redirect('admin.php');
//        } else {
//            echo "Something happeed it failed";
//        }
    

    }
  

}


?>