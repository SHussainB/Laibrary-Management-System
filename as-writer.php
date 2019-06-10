<?php  require ('require/_header.php'); ?>
<?php 
    $db = mysqli_connect('localhost', 'root', '', 'laibrary_db');

    $writers_id = $_GET['id'];
    $book_writer = mysqli_query($db, "SELECT books.*,writers.id as wt_id,writers.writer_name,categories.id as cat_id, categories.category_name FROM books,writers,categories where books.writer_id = writers.id and books.category_id = categories.id  ");
    
    $book_wtr = mysqli_query($db,"SELECT books.*,writers.id 
                                as wt_id,writers.writer_name,categories.id 
                                as cat_id, categories.category_name 
                                FROM books,writers,categories 
                                where books.writer_id = writers.id 
                                and books.category_id = categories.id 
                                and writers.id  = $writers_id");
?>
        <!-- show case table -->
    <table>
        <thead>
            <tr>
                <th>Book Name</th>
                <th>Writer</th>
                <th>Catagory</th>
                <th>Publish date</th>
                <th>Price</th>
            </tr>
        </thead>
        <?php while ($element = mysqli_fetch_array($book_wtr)) {?>
            <tr>
                <td><?php echo $element['book_name'];?></td>
                <td><a href=""><?php echo $element['writer_name']; ?></a></td>
                <td><a href=""><?php echo $element['category_name'];?></a></td>
                <td><?php echo $element['publish_date'];?></td>
                <td><?php echo $element['price'];?></td>
            </tr>  
        <?php } ?>
    </table>






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