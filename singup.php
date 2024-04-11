<?php
$page_title = "Sing Up";
$meta_description = "Sing Up - Developer Vicky";
$meta_keywords = "Vicky, Vicky, web developer vicky, Code with vicky, vicky developer, codingwithvicky, developervicky, DEVELOPER VICKY, coding, developer, vicky sahni, PHP, React,";

include('includes/header.php');
?>

    <?php
    include('includes/sidetop.php');
    ?>
    

            <div class="col-lg-8">
                
                <?php include('message.php'); ?>

                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">Sing UP </h4>
                </div>
                <div class="bg-white border border-top-0 p-4 mb-3">
                    
                    <h6 class="text-uppercase font-weight-bold mb-3">Create New Account</h6>
                    <form action="singupcode.php" method="POST">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" require class="form-control p-4" name="fname" placeholder="First Name" required="required"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" require class="form-control p-4" name="lname" placeholder="Last Name" required="required"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" require class="form-control p-4" name="email" placeholder="Email" required="required"/>
                        </div>
                        <div class="form-group">
                            <input type="password" require class="form-control" name="password" rows="4" placeholder="Password" required="required"></input>
                        </div>
                        <div class="form-group">
                            <input type="password" require class="form-control" name="cpassword" rows="4" placeholder="conform password" required="required"></input>
                        </div>
                        <div>
                            <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"
                                type="submit" name="singup_btn">Login</button>
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