<?php  require ('require/_header.php'); ?>







<?php
    if (isset($_SESSION['userid'])){
        echo "<h1>You are loged in</h1>";
    }
?>
<!-- script -->
<script type="text/javascript">
    $(document).ready(function () {
        $('.toggle').click(function () { 
            $('ul').toggleClass('active');
        });
    });


</script>
<!-- jQuery cdn -->
    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous">
    </script>
<?php  require ('require/_footer.php'); ?>