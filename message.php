<?php
if(isset($_SESSION['message']))
{
    ?>
        <script>alert("<?= $_SESSION['message']; ?>")</script>
    <?php
    unset($_SESSION['message']);
}

?>