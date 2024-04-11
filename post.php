<?php
include('includes/header.php');
include('admin/config/dbcom.php');
?>

    <!-- Breaking News Start -->
    <div class="container-fluid mt-5 mb-3 pt-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="section-title border-right-0 mb-0" style="width: 180px;">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tranding</h4>
                        </div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center bg-white border border-left-0"
                            style="width: calc(100% - 180px); padding-right: 100px;">
                            <?php
                            $latest_post_query = "SELECT * FROM posts WHERE d_p='0' ORDER BY id desc LIMIT 4 ";
                            $latest_post_query_run = mysqli_query($con, $latest_post_query);

                            if(mysqli_num_rows($latest_post_query_run) > 0 )
                            {
                                foreach($latest_post_query_run as $lp)
                                {
                                    ?>
                                        <div class="text-truncate"><a class="text-secondary text-uppercase font-weight-semi-bold" href="post.php?title=<?=$lp['slug'];?>"><?=$lp['name'];?></a></div>
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


    <?php
                    if(isset($_GET['title']))
                    {
                        $slug = mysqli_real_escape_string($con, $_GET['title']);

                        $post = "SELECT * FROM posts WHERE d_p='0' AND slug='$slug' ";
                        $sql = mysqli_query($con, $post);

                        if(mysqli_num_rows($sql) > 0)
                        {
                            foreach($sql as $postItems)
                            {
                                ?>
                                    <div class="container-fluid">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <!-- News Detail Start -->
                                                    <div class="position-relative mb-3">
                                                        <img class="img-fluid w-100" src="uploads/posts/<?=$postItems['image'];?>" style="object-fit: cover;">
                                                        <div class="bg-white border border-top-0 p-4">
                                                            <div class="mb-3">
                                                                <?php $c_post = $postItems['cat_id']; ?>
                                                                <?php $post_id = $postItems['id']; ?>
                                                                <?php 
                                                                    $c_data = "SELECT name, slug FROM categories WHERE id='$c_post'";
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
                                                                                href="">Business</a>
                                                                        <?php
                                                                    }
                                                                    ?>

                                                            
                                                                <a class="text-body" href=""><?= date('d-M-Y', strtotime($postItems['created_at'])); ?></a>
                                                            </div>
                                                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold"><?=$postItems['name'];?></h1>
                                                            <?=$postItems['des']; ?>
                                                        </div>
                                                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-circle mr-2" src="img/DeveloperVicky.png" width="25" height="25" alt="">
                                                                <span>Developer Vicky</span>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <span class="ml-3"><i class="far fa-eye mr-2"></i>12345</span>
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
                                                                ?>                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- News Detail End -->

                                                    <!-- Comment Form Start -->
                                                    <div class="mb-3">
                                                        <div class="section-title mb-0">
                                                            <h4 class="m-0 text-uppercase font-weight-bold">Leave a comment</h4>
                                                        </div>
                                                        <div class="bg-white border border-top-0 p-4">
                                                            <form method="POST" action="code.php">
                                                                <div class="form-row">
                                                                    <div class="form-group">
                                                                        <div class="form-group">
                                                                            <input type="hidden" value="<?=$postItems['id'];?>" name="post_id" class="form-control" id="id">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="form-group">
                                                                            <input type="hidden" value="<?=$postItems['slug'];?>" name="post_slug" class="form-control" id="id">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="name">Name *</label>
                                                                            <input type="text" name="name" class="form-control" id="name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="email">Email *</label>
                                                                            <input type="email" name="email" class="form-control" id="email">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="website">Website</label>
                                                                    <input type="url" name="website" class="form-control" id="website">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="message">Message *</label>
                                                                    <textarea id="message" name="mess" cols="30" rows="5" class="form-control"></textarea>
                                                                </div>
                                                                <div class="form-group mb-0">
                                                                    <input name="c_submit" type="submit" value="Leave a comment"
                                                                        class="btn btn-primary font-weight-semi-bold py-2 px-3">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- Comment Form End -->

                                                    <!-- Comment List Start -->
                                                    <div class="mb-3">
                                                        <div class="section-title mb-0">
                                                        <?php
                                                            $comment_data = "SELECT * from comment WHERE post_id='$post_id' ";
                                                            $comment_data_run = mysqli_query($con, $comment_data);

                                                            if($comment_total = mysqli_num_rows($comment_data_run))
                                                            {
                                                                ?>
                                                                <h4 class="m-0 text-uppercase font-weight-bold"><?=$comment_total?> Comments</h4>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                    <h4 class="m-0 text-uppercase font-weight-bold">0 Comments</h4>
                                                                <?php
                                                            }
                                                        ?>
                                                        </div>
                                                        <div class="bg-white border border-top-0 p-4">
                                                            <?php $post_comm_id = $postItems['id'] ?>
                                                            <?php
                                                            $comm_data = "SELECT * FROM comment WHERE post_id='$post_comm_id' ORDER BY id desc ";
                                                            $comm_data_run = mysqli_query($con, $comm_data);

                                                            if(mysqli_num_rows($comm_data_run) > 0)
                                                            {
                                                                foreach($comm_data_run as $commitem)
                                                                {
                                                                    ?>
                                                                    <div class="media mb-4">
                                                                        <img src="img/user.png" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                                                        <div class="media-body">
                                                                            <h6><p class="text-secondary font-weight-bold"><?=$commitem['name'];?></p> <small><i><?= date('d-M-Y', strtotime($commitem['created_at'])); ?></i></small></h6>
                                                                            <p><?=$commitem['mess']; ?></p>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                }
                                                            }
                                                            else
                                                            {

                                                                ?>
                                                                <div class="media mb-4">
                                                                    NO Comment
                                                                </div>
                                                                <?php
                                                            }

                                                            ?>
                                                        </div>
                                                    </div>
                                                    <!-- Comment List End -->
                                                </div>

                                                <?php
                                                include('includes/sidebar.php');
                                                ?>
                                            </div>
                                        </div>
                                    </div>     
                                <?php
                            }
                        
                        }
                        else
                        {
                            ?>
                            <h4>No Such Post Found</h4>
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
    <!-- News With Sidebar Start -->
    
    <!-- News With Sidebar End -->


    <?php
   include('includes/footer.php')
   ?>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>