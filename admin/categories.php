<?php include "includes/admin_header.php";  ?>

<?php include "includes/admin_navigation.php";  ?>

<div class="ch-container">
   <div class="row">
        <div class="col-sm-2 col-lg-2">
           <?php include "includes/admin_sidebar.php"; ?>
        </div>

        <div id="content" class="col-lg-10 col-sm-10">

            <div>
                <ul class="breadcrumb">
                    <li>
                    <a href="#">Home</a>
                    </li>
                    <li>
                    <a href="#">Categories</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="box col-md-12">
                    <div class="box-inner">
                        <div class="box-header well">
                            <h2> All Categories</h2>
                            <div class="box-icon">
                                <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                                <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                                <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </div>
                        <div class="box-content row"> 
                            <div class="col-md-6">
                                 <?php

                                    if (isset($_POST['add_category'])) {
                                        
                                        $category = $_POST['category'];

                                    if ($category !== '') {

                                         $query = "INSERT INTO categories SET cat_title = '{$category}' ";
                                        $send_query = query($query);
                                        confirm($send_query);
                                       
                                    } else {

                                         echo "<h4 class='bg bg-warning p-2'>This Fields Canot be empty</h4>";

                                        }
                                    }

                                ?>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="category">Add New Category</label>
                                        <input type="text" name="category" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input value="Add Category" type="submit" name="add_category" class="btn btn-success">
                                    </div>
                                </form>
                                <!-- UPDATE CATGORY TITLE -->
                                 <form action="" method="post">
                                    

                                        <?php

                                            if (isset($_GET['edit'])) {
                                                
                                                $the_cat_id = $_GET['edit'];

                                            

                                            $query = "SELECT * FROM categories WHERE cat_id = " . escape_string($the_cat_id) . " ";
                                            $send_query = query($query);

                                            confirm($send_query);

                                            while ($row = fetch_array($send_query)) {
                                                 $cat_id = $row['cat_id'];
                                                 $cat_title = $row['cat_title'];

                                                ?>

                                                <div class="form-group">
                                                    <label for="up_category">Update Category</label>

                                                    <input id="up" value="<?php if(isset($cat_title)) {echo $cat_title;}else {echo "no";}  ?>" type="text" name="up_category" class="form-control">

                                                </div>

                                                <div class="form-group">
                                                   <input type="submit" name="update_cat" class="btn btn-success" value="Update">
                                                </div>


                                           <?php }  }

                                        ?>
                                        <?php
                                            if (isset($_POST['update_cat'])) {
                                                
                                                $up_category = $_POST['up_category'];

                                                $query = "UPDATE categories SET cat_title = '{$up_category}' WHERE cat_id = " . escape_string($the_cat_id) . " ";

                                                $send_query = query($query);
                                                 confirm($send_query);

                                                echo "<script>document.getElementById('up').value = '';</script>";

                                                confirm($send_query);
                                            }


                                        ?>
                                   
                                    
                                </form>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-striped table-hovered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php
                                            $query = "SELECT * FROM categories";
                                            $send_query = query($query);

                                            confirm($send_query);

                                            while ($row = fetch_array($send_query)) {
                                                
                                                $cat_id = $row['cat_id'];
                                                $cat_title = $row['cat_title'];

                                                ?>

                                                <tr>
                                                   <td><?php echo $cat_id; ?></td>
                                                   <td><?php echo $cat_title; ?></td>
                                                   <td><a href="categories.php?edit=<?php echo $cat_id; ?>">Edit</a></td>
                                                   <td><a href="categories.php?delete=<?php echo $cat_id; ?>">Delete</a></td>
                                                </tr>

                                            <?php }

                                        ?>
                                    </tbody>
                                </table>

                                <?php
                                    if (isset($_GET['delete'])) {
                                        
                                        $the_cat_id = $_GET['delete'];

                                        $query = "DELETE FROM categories WHERE cat_id = " . escape_string($the_cat_id) . " ";

                                        $send_query = query($query);

                                        confirm($send_query);

                                        header("Location: categories.php");
                                                          
                                    }


                                ?>

                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>

    <?php include "includes/admin_footer.php"; ?>
