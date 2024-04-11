<?php
include('admin/config/dbcom.php');
$set_data = "SELECT * FROM setting";
$set_data_run = mysqli_query($con, $set_data);

if(mysqli_num_rows($set_data_run) > 0 )
{
    foreach($set_data_run as $data)
    {
        $page_title = $data['title'];
        $meta_description = $data['des'];
        $meta_keywords = $data['keyword'];

    }
}
else
{
    $page_title = "Developer Vicky - Best Blogs Website Developer Vicky";
    $meta_description = "Developer Vicky are always there to help you in coding. As per the need of society, we provide a platform where you can level up your skills and learn new ones.";
    $meta_keywords = "Developer Vicky, Vicky, web developer vicky, Code with vicky, vicky developer, codingwithvicky, developervicky, DEVELOPER VICKY, coding, developer, vicky sahni, PHP, React,";

}

$meta_robot = "index,follow";

include('includes/header.php');
?>
<!-- main -->


<!-- Main News Slider Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 px-0">
                <div class="owl-carousel main-carousel position-relative">
                    <?php
                    $f_data = "SELECT * FROM posts WHERE d_p='0' and m_p='1' ";
                    $f_data_run = mysqli_query($con, $f_data);

                    if(mysqli_num_rows($f_data_run) > 0 )
                    {
                        foreach($f_data_run as $mdata)
                        {
                            ?>
                                <div class="position-relative overflow-hidden" style="height: 500px;">
                                    <a href="post.php?title=<?=$mdata['slug'];?>">
                                        <img class="img-fluid h-100" src="uploads/posts/<?=$mdata['image'];?>" style="object-fit: cover;">
                                    </a>
                                    <div class="overlay">
                                        <div class="mb-2">
                                            <?php $c_id = $mdata['cat_id']; ?>
                                            <?php 
                                            $c_data = "SELECT name, slug FROM categories WHERE id='$c_id'";
                                            $c_data_run = mysqli_query($con, $c_data);

                                            if(mysqli_num_rows($c_data_run) > 0 )
                                            {
                                                foreach($c_data_run as $cdata)
                                                {
                                                    ?>
                                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                        href="category.php?title=<?= $cdata['slug']; ?>"><?=$cdata['name'];?></a>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                    href="">Not Avaliable</a>
                                                <?php
                                            }
                                            ?>
                                            
                                            <a class="text-white" href=""><?= date('d-M-Y', strtotime($mdata['created_at'])); ?></a>
                                        </div>
                                        <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="post.php?title=<?=$mdata['slug'];?>"><?=$mdata['name']?></a>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                    else
                    {

                        ?>
                        <div class="position-relative overflow-hidden" style="height: 500px;">
                            <img class="img-fluid h-100" src="img/news-800x500-1.jpg" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="">Business</a>
                                    <a class="text-white" href=""></a>
                                </div>
                                <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                            </div>
                        </div>
                        <div class="position-relative overflow-hidden" style="height: 500px;">
                            <img class="img-fluid h-100" src="img/news-800x500-2.jpg" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="">Business</a>
                                    <a class="text-white" href="">Jan 01, 2045</a>
                                </div>
                                <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                            </div>
                        </div>
                        <div class="position-relative overflow-hidden" style="height: 500px;">
                            <img class="img-fluid h-100" src="img/news-800x500-3.jpg" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="">Business</a>
                                    <a class="text-white" href="">Jan 01, 2045</a>
                                </div>
                                <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    
                </div>
            </div>
            
        </div>
    </div>

    <!-- Breaking News Start -->
    <div class="container-fluid bg-dark py-3 mb-3">
        <div class="container">
            <div class="row align-items-center bg-dark">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">Latest Posts</div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                            style="width: calc(100% - 170px); padding-right: 90px;">
                            <?php
                            $latest_post_query = "SELECT * FROM posts WHERE d_p='0' LIMIT 4 ";
                            $latest_post_query_run = mysqli_query($con, $latest_post_query);

                            if(mysqli_num_rows($latest_post_query_run) > 0 )
                            {
                                foreach($latest_post_query_run as $lp)
                                {
                                    ?>
                                        <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href=""><?=$lp['name']; ?></a></div>
                                    <?php
                                }
                            }
                            else
                            {

                                ?>
                                    <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit. Proin interdum lacus eget ante tincidunt, sed faucibus nisl sodales</a></div>

                                <?php
                            }
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->


    <!-- Featured News Slider Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Featured News</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                <?php

                $post = "SELECT cat_id, name, slug, image, created_at FROM posts WHERE d_p='0' AND f_p='1' ";
                $sql = mysqli_query($con, $post);
                if(mysqli_num_rows($sql) > 0)
                {
                    foreach($sql as $postItems)
                    {
                        ?>
                        <?php $ca_id = $postItems['cat_id']; ?>
                            <div class="position-relative overflow-hidden" style="height: 300px;">
                                <img class="img-fluid h-100" src="uploads/posts/<?=$postItems['image'];?>" style="object-fit: cover;">
                                <div class="overlay">
                                    <div class="mb-2">
                                        <?php
                                            $p_cat_id = "SELECT name FROM categories WHERE id='$ca_id' ";
                                            $p_cat_id_run = mysqli_query($con, $p_cat_id);

                                            if(mysqli_num_rows($p_cat_id_run) > 0)
                                            {
                                                foreach($p_cat_id_run as $p_id)
                                                {
                                                    ?>
                                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                        href=""><?=$p_id['name'];?></a>
                                                    <?php
                                                }

                                            }
                                            else
                                            {
                                                ?>
                                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                    href="">not found</a>
                                                <?php
                                            }
                                        ?>
                                        
                                        <a class="text-white" href=""><small><?= date('d-M-Y', strtotime($postItems['created_at'])); ?></small></a>
                                    </div>
                                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="post.php?title=<?=$postItems['slug']?>"><?=$postItems['name'];?></a>
                                </div>
                            </div>
                        <?php
                    }
                }
                else
                {

                
                    ?>
                        <div class="position-relative overflow-hidden" style="height: 300px;">
                            <img class="img-fluid h-100" src="" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="">Business</a>
                                    <a class="text-white" href=""><small>Jan 01, 2045</small></a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">not found</a>
                            </div>
                        </div>
                    <?php

                }
                ?>

            </div>
        </div>
    </div>
    <!-- Featured News Slider End -->

    <?php
    include('includes/sidetop.php');
    ?>

    <div class="col-lg-8">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h4 class="m-0 text-uppercase font-weight-bold">Latest Blogs</h4>
                    <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                </div>
            </div>

            <?php
            $post_data = "SELECT * FROM posts WHERE d_p='0' ORDER BY id desc LIMIT 8";
            $post_data_run = mysqli_query($con, $post_data);

            if(mysqli_num_rows($post_data_run) > 0 )
            {
                foreach($post_data_run as $postdata)
                {
                    ?>
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="uploads/posts/<?=$postdata['image']?>" style="object-fit: cover;">
                            <div class="bg-white border border-top-0 p-4">
                                <div class="mb-2">
                                    <?php $post_id = $postdata['id'] ?>
                                    <?php $cat_id = $postdata['cat_id'] ?>
                                    <?php
                                    $cat_data = "SELECT name, slug FROM categories WHERE id='$cat_id'";
                                    $cat_data_run = mysqli_query($con, $cat_data);
                                    if(mysqli_num_rows($cat_data_run) > 0 )
                                    {

                                        foreach($cat_data_run as $cd)
                                        {
                                            ?>
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href="category.php?title=<?=$cd['slug'];?>"><?=$cd['name'];?></a>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="">Business</a>
                                        <?php
                                    }
                                    ?>
                                   
                                    <a class="text-body" href=""><small><?= date('d-M-Y', strtotime($postdata['created_at'])); ?></small></a>
                                </div>
                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="post.php?title=<?=$postdata['slug']?>"><?=$postdata['name']?></a>
                                <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                                    rebum clita rebum dolor stet amet justo</p>
                            </div>
                            <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle mr-2" src="img/DeveloperVicky.png" width="25" height="25" alt="">
                                    <small>Developer Vicky</small>
                                </div>
                                <div class="d-flex align-items-center">
                                <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                                <?php
                                    $comment_data = "SELECT * from comment WHERE post_id='$post_id' ";
                                    $comment_data_run = mysqli_query($con, $comment_data);

                                    if($comment_total = mysqli_num_rows($comment_data_run))
                                    {
                                        ?>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i><?=$comment_total?></small>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>0</small>
                                        <?php
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php

                }
            }
            else
            {

            }
            ?>
        </div>
    </div>

    <?php
    include('includes/sidebar.php');
    ?>
    


   <?php
   include('includes/endside.php');
   ?>
<!-- Main News Slider End -->





<!-- end main -->

<?php
include('includes/footer.php');
include('includes/scripts.php');

?>