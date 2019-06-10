<?php  require ('require/_header.php'); $title="Admin Signup"; pageTitle($title)?>



<h1>Admin SignUp</h1>
<?php
    if (isset($_GET["error"])) {
        if ($_GET["error"]=="emptyfilds") {
            echo '<p class="error_msg msg">Fill all fild!</p>';
        }
        elseif ($_GET["error"]=="invelidusername") {
            echo '<p class="error_msg msg">Invalide Username!</p>';
        }
        elseif ($_GET["error"]=="passwordcheak") {
            echo '<p class="error_msg msg">Inpute same password!</p>';
        }
        elseif ($_GET["error"]=="sqlerror") {
            echo '<p class="error_msg msg">Invalide Inpute!</p>';
        }
        elseif ($_GET["error"]=="usertaken") {
            echo '<p class="error_msg msg">Username unavilable!</p>';
        }
    }
    elseif(isset($_GET["signup"])){
        if($_GET["signup"]=="success"){
            echo '<p class="success_msg msg">Successfully Signedup!</p>';
        }
    }
?>

<div class="input-group">
    <form action="include/signup.admin.inc.php" method="post" class="details_input_form">
        
        <input type="text" name="first_name" id="" placeholder="First Name">
        <input type="text" name="last_name" id="" placeholder="Last Name">
        <input type="email" name="email" id="" placeholder="E-mail">
        <input type="text" name="uid" id="" placeholder="Username">
        <input type="number" name="nid" id="" placeholder="NID Number" require>
        <input type="password" name="pwd" id="" placeholder="Password">
        <input type="password" name="pwd_repeat" id="" placeholder="Re-enter Password">
        <button type="submit" name="admin_signup_submit" class="btn">Sign Up</button>
    </form>
</div>
















<?php  require ('require/_footer.php'); ?>