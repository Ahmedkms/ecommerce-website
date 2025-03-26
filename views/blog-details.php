<?php
use App\Blogs;
use App\Tags;
use App\Comment;
use App\Replies;
if (isset($_GET['id'])) {
    $blog_id = $_GET['id'];

} else {
    $blog_id = 1;
}
$blog = new Blogs();
$B = $blog->GetBlogById($blog_id);
$tag = new Tags();
$tags = $tag->GetTagsByProduct($B['product_id']);
$com = new Comment();
$comments = $com->getCommentsByBlogId($B['id']);
$replay = new Replies();


?>

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index-2.html">home</a></li>
                        <li>blog details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->


<!--blog body area start-->
<div class="blog_details mt-60">
    <div class="container">
        <div class="row">

            <div class="col-lg-9 col-md-12">
                <!--blog grid area start-->
                <div class="blog_wrapper">
                    <article class="single_blog">
                        <figure>
                            <div class="post_header">
                                <h3 class="post_title"><?= $B['title'] ?></h3>
                                <div class="blog_meta">
                                    <span class="author">Posted by : <a href="#">Rahul</a> / </span>
                                    <span class="post_date"><a href="#"><?= $B['created_at'] ?></a></span>
                                </div>
                            </div>
                            <div class="blog_thumb">
                                <a href="#"><img src="<?= $B['img'] ?>" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <div class="post_content">
                                    <p><?= $B['description'] ?></p>
                                </div>
                                <div class="entry_content">
                                    <div class="post_meta">
                                        <span>Tags: </span>
                                        <?php if (!empty($tags)): ?>
                                            <?php foreach ($tags as $tag): ?>
                                                <span><a href="#"> <?= $tag['name'] ?>, </a></span>
                                            <?php endforeach; ?>
                                        <?php endif; ?>

                                    </div>

                                    <div class="social_sharing">
                                        <p>share this post:</p>
                                        <ul>
                                            <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                            <li><a href="#" title="google+"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </article>
                    <div class="comments_box">
                        <h3><?= count($comments) ?> Comments </h3>
                        <?php foreach ($comments as $comment): ?>
                            <div class="comment_list">
                                <div class="comment_thumb">
                                    <img src="assets/img/blog/comment3.png.jpg" alt="">
                                </div>
                                <div class="comment_content">
                                    <div class="comment_meta">
                                        <h5><a href="#"> <?= $comment['name'] ?></a></h5>
                                        <span>October 16, 2018 at 1:38 am</span>
                                    </div>
                                    <p><?= $comment['content'] ?></p>
                                    <div class="comment_reply">
                                        <a href="#">Reply</a>
                                    </div>
                                </div>

                            </div>
                            <?php $replaies = $replay->GetRepliesByComment($comment['id']); ?>
                            <?php if (!empty($replaies)):
                                foreach ($replaies as $replay):
                                    ?>
                                    <div class="comment_list list_two">
                                        <div class="comment_thumb">
                                            <img src="assets/img/blog/comment3.png.jpg" alt="">
                                        </div>
                                        <div class="comment_content">
                                            <div class="comment_meta">
                                                <h5><a href="#"><?= $replay['username'] ?></a></h5>
                                                <span><?= $replay['created_at'] ?></span>
                                            </div>
                                            <p><?= $replay['content'] ?></p>
                                            <div class="comment_reply">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                    </div>







                                <?php endforeach; ?>

                            <?php endif; ?>

                        <?php endforeach ?>


                        <div class="comments_form">
                            <h3>Leave a Reply </h3>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <form action="../public/index.php?page=addcomment" method="post">
                                <div class="row">
                                    <?php
                                    require_once '../healper/healper.php';
                                    errorMessage();

                                    ?>
                                    <div class="col-12">
                                        <label for="review_comment">Comment </label>
                                        <textarea name="comment" id="review_comment"></textarea>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <label for="author">Name</label>
                                        <input id="author" name="name" type="text">

                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <label for="email">Email </label>
                                        <?php if (!empty($_SESSION['email'])): ?>
                                            <input id="email" value="<?= htmlspecialchars($_SESSION['email']) ?>" disabled
                                                type="text">
                                            <input type="hidden" name="email"
                                                value="<?= htmlspecialchars($_SESSION['email']) ?>">
                                        <?php else: ?>
                                            <input id="email" name="email" type="text" required>
                                        <?php endif; ?>


                                    </div>
                                    <input type="hidden" name="blog_id" value="<?= $blog_id ?>">
                                </div>
                                <button class="button" type="submit">Post Comment</button>
                            </form>
                        </div>

                    </div>
                </div>
                <!--blog grid area start-->
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="blog_sidebar_widget">
                    <div class="widget_list widget_search">
                        <h3>Search</h3>
                        <form action="../public/index.php?page=searchblogsController" method="post">
                            <input name="word" placeholder="Search..." type="text">
                            <button type="submit">search</button>
                        </form>
                    </div>
                    <div class="widget_list widget_post">
                        <h3>Recent Posts</h3>
                        <?php
                        $blog = new Blogs();
                        $blogs = $blog->GetLastThreeBlogs();
                        foreach ($blogs as $blog): ?>
                            <div class="post_wrapper">
                                <div class="post_thumb">
                                    <a href="../public/index.php?page=blog-details&id=<?= $blog['id'] ?>"><img
                                            src="<?= $blog["img"] ?>" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <h3><a
                                            href="../public/index.php?page=blog-details&id=<?= $blog['id'] ?>"><?= $blog['title'] ?></a>
                                    </h3>
                                    <span><?= $blog['created_at'] ?> </span>
                                </div>
                            </div>
                        <?php endforeach; ?>


                        <div class="widget_list widget_tag">
                            <h3>Tag products</h3>
                            <div class="tag_widget">
                                <ul>
                                    <?php foreach ($tags as $tag): ?>
                                        <li><a href="#"><?= $tag['name'] ?></a></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--blog section area end-->