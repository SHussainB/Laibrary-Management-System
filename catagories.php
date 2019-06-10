<?php  include('include/controller/controller.catagory.php'); ?>
<?php  require ('require/_header.php'); $title="Catagories"; pageTitle($title)?>

    <!-- showing success message -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="msg">
            <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>
    <!-- selecting * from bools table -->
    <?php $results = mysqli_query($db, "SELECT * FROM categories"); ?>
<!-- show case table -->
    <table>
        <thead>
            <tr>
                <th>Catagory Name</th>
                <th>Details</th>
                <?php
                    if (isset($_SESSION['userid'])) {
                        echo '';
                    }
                    else {
                        echo '<th colspan="2">Action</th>';
                    }
                ?>
                
            </tr>
        </thead>
        
        <?php while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><a href="as-category.php?id=<?php echo $row['id']; ?>"><?php echo $row['category_name'];?></a></td>
                <td><?php echo $row['details']; ?></td>
                <?php
                    if (isset($_SESSION['userid'])) {
                        echo '
                            <td></td>
                            <td></td>
                        ';
                    }
                    else {
                        echo '
                            <td>
                                <a href='.'"'.'books.php?edit=<?php echo $row['."'"."id'".']; ?>"'.' class='.'"'.'action_btn primary"'.' >Edit</a>
                            </td>
                            <td>
                                <a href="'.'include/controller/controller.book.php?del=<?php echo $row['."'".'id'."'".']; ?>"'.' class="'.'action_btn danger"'.'>Delete</a>
                            </td>
                        ';
                
                    }
                ?>
            </tr>
        <?php } ?>
    </table>
    <?php
    if (isset($_SESSION['userid'])) {
            //codde......
    }
    else {
    echo '
        <form method="post" action="controller.catagory.php" class="details_input_form">
            <div class="input-group">
                <!-- book name -->
                <label>Catagory Name</label>
                <input type="text" name="catagory_name">
            </div>
            <div class="input-group">
                <label>Details</label>
                <textarea rows="4" cols="50" name="details"></textarea>
            </div>
            <div class="input-group">
                <?php if ($update == true): ?>
                    <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
                <?php else: ?>
                    <button class="btn" type="submit" name="save" >Save</button>
                <?php endif ?>
            </div>
        </form>
    ';
    }
    ?>
    <!-- input form -->

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
