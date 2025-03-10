<?php
use App\Blogs;
use App\Tags;
$blog=new Blogs();
$blogs=$blog->GetAllBlogs();
$tag=new Tags();
$tags=$tag->GetAllTags();



?>

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="../public/index.php?page=home">home</a></li>
                            <li>All blog</li>
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
                
                <div class="col-lg-9">
                    <div class="blog_wrapper">
                        <div class="section-title">
                            <h2>All Blog</h2>
                        </div>
                        <div class="row">
                            <?php foreach($blogs as $blog):
                                // var_dump($blog); ?>
                            <div class="col-lg-6 col-md-6">
                                <article class="single_blog mb-60">
                                    <figure>
                                        <div class="blog_thumb">
                                            <a href="../public/index.php?page=blog-details&id=<?=$blog['id']?>"><img src="<?=$blog['img']?>" alt=""></a>
                                        </div>
                                        <figcaption class="blog_content">
                                            <h3><a href="../public/index.php?page=blog-details&id=<?=$blog['id']?>"><?=$blog['title']?></a></h3>
                                            <div class="blog_meta">                                        
                                                <span class="author">Posted by : <a href="#">admin</a> / </span>
                                                <span class="post_date">On : <a href="#"><?=$blog['created_at']?></a></span>
                                            </div>
                                            <div class="blog_desc">
                                                <p> <?=$blog['description']?></p>
                                            </div>
                                            <footer class="readmore_button">
                                                <a href="../public/index.php?page=blog-details&id=<?=$blog['id']?>">read more</a>
                                            </footer>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <?php endforeach; ?>

                            
                            
                        </div>
                    </div>
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
                            $blog=new Blogs(); 
                            $blogs=$blog->GetLastThreeBlogs();
                            foreach($blogs as $blog):?>
                            <div class="post_wrapper">
                                <div class="post_thumb">
                                    <a href="../public/index.php?page=blog-details&id=<?=$blog['id']?>"><img src="<?= $blog["img"]?>" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <h3><a href="../public/index.php?page=blog-details&id=<?=$blog['id']?>"><?= $blog['title']?></a></h3>
                                    <span><?= $blog['created_at'] ?> </span>
                                </div>
                            </div>
                            <?php endforeach; ?>
                             
                             
                        <div class="widget_list widget_tag">
                            <h3>Tag products</h3>
                            <div class="tag_widget">
                                <ul>
                                    <?php foreach($tags as $tag): ?>
                                    <li><a href="#"><?= $tag['name']?></a></li>
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
	
	    
    <!--blog pagination area start-->
    <div class="blog_pagination">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pagination">
                        <ul>
                            <li class="current">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="next"><a href="#">next</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--blog pagination area end-->
	
	