<?php
$page_title = "Login Page";
$meta_description = "Login Page Developer Vicky";
$meta_keywords = "Vicky, Vicky, web developer vicky, Code with vicky, vicky developer, codingwithvicky, developervicky, DEVELOPER VICKY, coding, developer, vicky sahni, PHP, React,";

include('includes/header.php');

if(isset($_SESSION['auth']))
{
    if(!isset($_SESSION['message'])){
        $_SESSION['message'] = "You are already login";
    }
    header("Location: index.php");
    exit(0);
}

?>

    <?php
    include('includes/sidetop.php');
    ?>

            <div class="col-lg-8">
                <?php include('message.php'); ?>

                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">Login </h4>
                </div>
                <div class="bg-white border border-top-0 p-4 mb-3">
                    
                    <h6 class="text-uppercase font-weight-bold mb-3">Login..</h6>
                    <form action="logincode.php" method="POST">
                        <div class="form-group">
                            <input type="email" required name="email" class="form-control p-4" placeholder="Email" required="required"/>
                        </div>
                        <div class="form-group">
                            <input type="password" required name="password" class="form-control" rows="4" placeholder="Password" required="required"></input>
                        </div>
                        <div>
                            <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"
                                type="submit" name="login_btn">Login</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            include('includes/sidebar.php');
            ?>
    <?php
   include('includes/endside.php');
   ?>



<?php
include('includes/footer.php');
include('includes/scripts.php');

?>