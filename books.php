<?php  include('include/controller/controller.book.php'); ?>
<?php  require ('require/_header.php'); $title="Books"; pageTitle($title)?>

    <!-- showing success message -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="msg">
            <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>
    <!-- selecting * from books table -->
    <?php $results = mysqli_query($db, "SELECT books.*,writers.id as wt_id,writers.writer_name,categories.id as cat_id, categories.category_name FROM books,writers,categories where books.writer_id = writers.id and books.category_id = categories.id  "); ?>
    <?php $book_writer = mysqli_query($db, "SELECT * FROM writers"); ?>
    <?php $cat = mysqli_query($db, "SELECT * FROM categories"); ?>
    <!-- show case table -->
    <table>
        <thead>
            <tr>
                <th>Book Name</th>
                <th>Writer</th>
                <th>Catagory</th>
                <th>Publish date</th>
                <th>Price</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <?php while ($row = mysqli_fetch_array($results)) {?>
            <tr>
                <td><?php echo $row['book_name'];?></td>
                <td><a href="../as-writer.php?id=<?php echo $row['wt_id']; ?>"><?php echo $row['writer_name']; ?></a></td>
                <td><a href="../as-category.php?id=<?php echo $row['cat_id']; ?>"><?php echo $row['category_name'];?></a></td>
                <td><?php echo $row['publish_date'];?></td>
                <td><?php echo $row['price'];?></td>
                <?php
                    if (isset($_SESSION['userid'])) {
                        echo '
                            <td>
                                <a href='.'"'.'books.php?<?php echo $row['."'"."id'".']; ?>"'.' class='.'"'.'action_btn primary"'.'name='.'"'.'borrow"'.'>Borrow</a>
                            </td>
                        ';
                        echo '';
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
    <?php if (!isset($_SESSION['userid'])) {?>
            <!-- inpute form -->
            <form method="post" action="include/controller/controller.book.php" class="details_input_form">
                <div class="input-group">
                    <!-- book name -->
                    <label>Book Name</label>
                    <input type="text" name="book_name" value="">
                </div>
                <div class="input-group">
                    <!-- writer -->
                    <label>Writer</label>
                    <select name="writer_id">
                        <?php while ($items = mysqli_fetch_array($book_writer)) { ?>
                            <option value="<?php echo $items['id'];?>"><?php echo $items['writer_name'];?></option>
                        <?php } ?>
                    </select> 
                    
                </div>
                <div class="input-group">
                    <!-- catagory -->
                    <label>Catagory</label>
                    <select name="category_id">
                        <?php while ($cat_item = mysqli_fetch_array($cat)) { ?>
                            <option value="<?php echo $cat_item['id'];?>"><?php echo $cat_item['category_name'];?></option>
                        <?php } ?>
                    </select> 
                </div>
                <div class="input-group">
                    <label>Publish Date</label>
                    <input type="date" name="publish_date" value="">
                </div>
                <div class="input-group">
                    <label>Price</label>
                    <input type="number" name="price" value="">
                </div>
                <div class="input-group">
                    <?php if ($update == true): ?>
                        <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
                    <?php else: ?>
                        <button class="btn" type="submit" name="save" >Add</button>
                    <?php endif ?>
                </div>
            </form>          
    <?php }?>



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
