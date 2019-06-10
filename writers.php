<?php  include('include/controller/controller.writer.php'); ?>
<?php  require ('require/_header.php'); $title="Writers"; pageTitle($title)?>

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
    <?php $results = mysqli_query($db, "SELECT * FROM writers"); ?>
<!-- show case table -->
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
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
                <td><?php echo $row['writer_name']; ?></td>
                <td><?php echo $row['writer_phone_number']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['writer_address']; ?></td>
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
        <form method="post" action="controller.writer.php" class="details_input_form">
            <div class="input-group">
                <!-- writer name -->
                <label>Writer Name</label>
                <input type="text" name="writer_name" value="">
            </div>
            <div class="input-group">
                <!-- writer -->
                <label>Phone Number</label>
                <input type="number" name="phone_number" id="">
            </div>
            <div class="input-group">
                <!-- catagory -->
                <label>Email</label>
                <input type="email" name="email" id="">
            </div>
            <div class="input-group">
                <label>Address</label>
                <textarea name="address" id="" cols="30" rows="10"></textarea>
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