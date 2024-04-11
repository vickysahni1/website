<?php
include('includes/header.php');
?>
<!-- main -->

    <?php
    include('includes/sidetop.php');
    ?>

    <div class="col-lg-8">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h4 class="m-0 text-uppercase font-weight-bold">Latest Posts</h4>
                    <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                </div>
            </div>

            <?php
            if(isset($_GET['title']))
            {
                $slug = mysqli_real_escape_string($con, $_GET['title']);

                $category = "SELECT id, slug FROM categories WHERE slug='$slug' LIMIT 1 ";
                $data = mysqli_query($con, $category);

                if(mysqli_num_rows($data) > 0)
                {
                    $cat_item = mysqli_fetch_array($data);
                    $cat_id = $cat_item['id'];

                    $post = "SELECT cat_id, name, slug, image, id, created_at FROM posts WHERE d_p='0' AND cat_id='$cat_id' ";
                    $sql = mysqli_query($con, $post);

                    if(mysqli_num_rows($sql) > 0)
                    {
                        foreach($sql as $postItems)
                        {
                            ?>
                                

                                <div class="col-lg-6">
                                    <div class="position-relative mb-3">
                                        <img class="img-fluid w-100" src="uploads/posts/<?=$postItems['image'];?>" style="object-fit: cover;">
                                        <div class="bg-white border border-top-0 p-4">
                                            <div class="mb-2">
                                            <?php
                                                $cat_data = "SELECT name FROM categories WHERE id='$cat_id'";
                                                $cat_data_run = mysqli_query($con, $cat_data);
                                                if(mysqli_num_rows($cat_data_run) > 0 )
                                                {

                                                    foreach($cat_data_run as $cd)
                                                    {
                                                        ?>
                                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                            href=""><?=$cd['name'];?></a>
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
                                                
                                                <a class="text-body" href=""><small><?= date('d-M-Y', strtotime($postItems['created_at'])); ?></small></a>
                                            </div>
                                            <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="post.php?title=<?=$postItems['slug'];?>"><?=$postItems['name'];?></a>
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
                                                <?php $post_id = $postItems['id']; ?>
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
                        ?>
                        <h4>no post Availvable</h4>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <h4>no such categories</h4>
                    <?php
                }

            }
            else
            {
                ?>
                <h4>no slug found</h4>
                <?php
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