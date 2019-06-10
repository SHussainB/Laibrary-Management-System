<?php  require ('require/_header.php'); $title="Books"; pageTitle($title)?>



<!--
<div>
    <form action="include/logout.inc.php" method="post">
        <div class="input-group">
            <button class="btn" type="submit" name="logout_submit">Logout</button>
        </div>
    </form>
    <form action="include/login.inc.php" method="post">
        <div class="input-group">
            <input type="text" name="mailuid" id="" placeholder="Username/E-mail">
            <input type="password" name="pwd" id="" placeholder="Password">
            <button class="btn" type="submit" name="login_submit">Login</button>
        </div>
    </form>
    <div class="input-group">
        <button class="btn"><a href="signup.php">Signup</a></button>
    </div>
</div>
-->

<?php if (!isset($_SESSION['adminid'])) {?>
    <form action="include/admin.logout.inc.php" method="post">
        <div class="input-group">
            <button class="btn" type="submit" name="logout_submit">Logout</button>
        </div>
    </form>
    <!-- admin log in form -->
    
    <form method="post" action="icclude/admin.login.php" class="details_input_form">
        <h1>Admin Login</h1>
        <div class="input-group">
            <input type="text" name="mailuid" id="" placeholder="Username/E-mail">
            <input type="password" name="pwd" id="" placeholder="Password">
            <button class="btn" type="submit" name="login_submit">Login</button>
        </div>
    </form>
    
    <div class="input-group">
        <button class="btn"><a href="signup.php">Signup</a></button>
    </div>         
<?php }?>


<?php  require ('require/_footer.php'); ?>



