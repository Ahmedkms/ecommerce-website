<?php
use App\Blogs;


if ($_SERVER['REQUEST_METHOD'] == "POST") {

if(empty($_POST['word'])){
    header("location:" . $_SERVER['HTTP_REFERER']);
        exit;
}else{
    $blog = new Blogs();
    $blogs = $blog->searchblogsByName($_POST['word']);
    if (empty($blogs)) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        
        $blog_id = $blogs['id'];
        header("Location: ../public/index.php?page=blog-details&blog_id=" . $blog_id);
        
    }

}
}