  <?php

if (isset($_POST['checkBoxArray'])) {
    
    foreach ($_POST['checkBoxArray'] as $key => $postValueId) {
        
        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options) {
            case 'published':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = " . escape_string($postValueId) . " ";
                $update_status_to_pub = query($query);

                // CONFIRM RESULT
               confirm($update_status_to_pub);

                break;

            case 'draft':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = " . escape_string($postValueId) . " ";
                $update_status_to_draft = query($query);

                // CONFIRM RESULT
               confirm($update_status_to_draft);

                break;

                case 'clone':
                // DISPLAY ALL POSTS
                $query = "SELECT * FROM posts WHERE post_id = " . escape_string($postValueId) . " ";
                // SEND REQUEST
                $send_query = query($query);
                //CONFIRM QUERY
                confirm($send_query);

                // LOOP IN THROW ARRAY 
                while ($row = fetch_array($send_query)) {
                    
                    $post_id = $row['post_id'];
                    $post_category_id = $row['post_category_id'];
                    $post_user = $row['post_user'];
                    $post_title = $row['post_title'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_status = $row['post_status'];
                    $post_date = $row['post_date'];
                    $post_content = $row['post_content'];


                    }


                     $query = "INSERT INTO posts(post_category_id,post_user,post_title,post_image,post_status,post_content,post_comment_count,post_date,post_tags) VALUES ({$post_category_id},'{$post_user}','{$post_title}','{$post_image}','{$post_status}','{$post_content}','{$post_comment_count}', now(),'{$post_tags}' ) ";

                    $send_query = query($query);
                     confirm($send_query);

                break;

            case 'delete':
                $query = "DELETE FROM posts WHERE post_id = " . escape_string($postValueId) . " ";
                $delete_post = query($query);

                // CONFIRM RESULT
                confirm($delete_post);

            break;   
            
            default:
                
                break;
        }
        
    }


}

?>

  <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2> All Post</h2>
                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content row"> 
                    <form action="" method="post">
                        <div class="row">
                            <div id="blukOtionContainer" class="col-xs-4">
                                <select name="bulk_options" class="form-control" id="">
                                    <option value="">Bulk Action</option>
                                    <option value="published">Published</option>
                                    <option value="draft">Draft</option>
                                    <option value="clone">Clone</option>
                                    <option value="delete">Delete</option>
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <input type="submit" name="submit" class="btn btn-success" value="apply">
                                <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
                            </div>
                        </div>

                        <table class="table table-striped table-hovered">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="" id="selectAllBox"></th>
                                    <th>ID</th>
                                    <th>Post Category</th>
                                    <th>User</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Tags</th>
                                    <th>Comment</th>
                                    <th><i class="glyphicon glyphicon-eye-open"></i></th>
                                    <th>Edit</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                 if (isset($_GET['page'])) {
            
                                    $page = $_GET['page'];
                                  } else {
                                    $page = "";
                                  }

                                  if ($page == "" || $page == 1) {
                                    
                                    $page_1 = 0;
                                  } else {
                                    $page_1 = ($page * 10) - 10;
                                  }

                                  $query = "SELECT * FROM posts";
                                  $send_query = query($query);
                                  confirm($send_query);

                                  $count = mysqli_num_rows($send_query);

                                  $count = ceil($count / 10);


                                $query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT $page_1, 10";

                                        $send_query = query($query);
                                       confirm($send_query);

                                        while ($row = fetch_array($send_query)) {

                                        $post_id = $row['post_id'];
                                        $post_category_id = $row['post_category_id'];
                                        $post_user = $row['post_user'];
                                        $post_title = $row['post_title'];
                                        $post_image = $row['post_image'];
                                        $post_tags = $row['post_tags'];
                                        $post_comment_count = $row['post_comment_count'];
                                        $post_status = $row['post_status'];
                                        $post_date = $row['post_date'];
                                        $post_views_count = $row['post_views_count'];

                                        ?>

                                   <tr>
                                        <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value="<?php echo $post_id; ?>"></td>
                                        <td><?php echo $post_id; ?></td>
                                        <?php

                                            $categories_query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";

                                            $send_categories_query = query($categories_query);
                                            confirm($send_categories_query);

                                            while ($row = fetch_array($send_categories_query)) {

                                                $cat_id = $row['cat_id'];
                                                $cat_title = $row['cat_title'];
                                                
                                                echo "<td>{$cat_title}</td>";
                                            }
                                        ?>
                                        <td><?php echo $post_user; ?></td>
                                        <td><a href="../post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></td>
                                        <td><img class="img-responsive" height="100" width="100" src="../images/<?php echo $post_image; ?>"></td>
                                        <td><?php echo $post_status; ?></td>

                                        <td><?php echo $post_tags; ?></td>


                                        <?php

                                        $comment_query = "SELECT * FROM comments WHERE comment_post_id = $post_id ";
                                        $send_count_query = query($comment_query);

                                        confirm($send_count_query);

                                        while ($row = fetch_array($send_count_query)) {
                                            $comment_id = $row['comment_id'];
                                            $comment_post_id = $row['comment_post_id'];

                                        }
                                        
                                         $count_comments = mysqli_num_rows($send_count_query);
                                    
                                            $comment_query_count = "UPDATE posts SET post_comment_count = {$count_comments} ";
                                             $update_comment_count = query($comment_query_count);

                                             confirm($update_comment_count);
                                        ?>
                                        <td><a href="post_comments.php?p_id=<?php echo $post_id; ?>"><?php echo $count_comments; ?></a></td>

                                         <td><a href="posts.php?reset=<?php echo $post_id; ?>"><?php echo $post_views_count; ?></a></td>
                                        <td><a href="posts.php?source=edit_post&edit_post=<?php echo $post_id; ?>">Edit</a></td>
                                        <td><?php echo $post_date; ?></td>
                                    </tr> 

                            <?php }

                        ?>
          
                            </tbody>
                        </table>
                    </form>

                     <!-- PAGINATION SYSTEM START -->
                    <div class="pagination">
                      <ul>
                         
                        <?php 

                            for($i=1;$i<=$count;$i++) {

                                if ($i == $page) {
                                   echo "<li><a class='active-link' href='/burja/admin/posts.php?page={$i}'>{$i}</a></li>";
                                } else {

                                echo "<li><a href='/burja/admin/posts.php?page={$i}'>{$i}</a></li>";
                              }
                            }

                         ?>
                     
                      </ul>
                    </div>
                    <!-- PAGINATION SYSTEM END -->
                </div>
            </div>
        </div>
    </div>


        <?php

    // if (isset($_GET['delete'])) {

    // $the_post_id = $_GET['delete'];

    // $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
    // $delete_post_query = mysqli_query($connection,$query);
    // if (!$delete_post_query) {
    // die("Some Error On Line " . mysqli_error($connection));
    // }
    // header("Location: posts.php");
    // }



    if (isset($_GET['reset'])) {

    $reset_post_view_count = $_GET['reset'];

    $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = " . escape_string($reset_post_view_count) . " ";
    $reset_post_view_query = query($query);
   confirm(  $reset_post_view_query);
    header("Location: posts.php");
    }




?>