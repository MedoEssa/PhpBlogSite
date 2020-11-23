  <?php

if (isset($_POST['add_post'])) {
    
    $post_category_id = escape_string($_POST['post_category']);
    $post_user = escape_string($_POST['post_user']);
    $post_title = escape_string($_POST['post_title']);

    $post_image = escape_string($_FILES['post_image']['name']);
    $post_image_temp = escape_string($_FILES['post_image']['tmp_name']);

    $post_status = escape_string($_POST['post_status']);
    $post_content = escape_string($_POST['post_content']);
    $post_comment_count = 3;
    $post_date = date('y-m-d');
    $post_tags = escape_string($_POST['post_tags']);
    $post_desc  = escape_string($_POST['post_desc']);

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts(post_category_id,post_user,post_title,post_image,post_status,post_content,post_date,post_tags,post_desc) VALUES ({$post_category_id},'{$post_user}','{$post_title}','{$post_image}','{$post_status}','{$post_content}', now(),'{$post_tags}','{$post_desc}' ) ";
    $send_query = query($query);
    confirm($send_query);

    $the_post_id = mysqli_insert_id($connection);

     echo "<p class='bg-success p-4'>Post Created Success <a href='../post.php?p_id=$the_post_id'>View Post</a> Or <a href='posts.php'>View all posts</a><p>";
}



?>


  <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="glyphicon glyphicon-edit"></i> Add Post</h2>
                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content row"> 
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="post_title">Title: </label>
                            <input type="text" name="post_title" class="form-control">
                        </div>
                            <div class="form-group">
                            <label for="post_user">Users</label>
                            <select class="form-control" name="post_user">
                                <option>SELECT User</option>

                                <?php

                                $select_user = "SELECT * FROM users";
                                $users_query = query($select_user);
                                confirm($users_query);

                                while ($row =fetch_array($users_query)) {
                                    
                                    $user_id = $row['user_id'];
                                    $username = $row['username'];

                                        echo "<option value='{$username}'>{$username}</option>";
                                    
                                }

                                ?>
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="post_category">POST CATEGORY ID</label>
                            <select class="form-control" name="post_category">
                                <option>SELECT CATEGORY</option>

                                <?php

                                $select_cat = "SELECT * FROM categories";
                                $send_query = query($select_cat);
                                confirm($send_query);

                                while ($row = fetch_array($send_query)) {
                                    
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                    if ($post_category_id == $cat_id) {
                                        echo "<option selected value='{$cat_id}'>{$cat_title}</option>";
                                    } else {
                                        echo "<option value='{$cat_id}'>{$cat_title}</option>";
                                    }
                                }

                                ?>
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="post_image">Image: </label>
                            <input type="file" name="post_image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="post_tags">Tags: </label>
                            <input type="text" name="post_tags" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="post_status">Status: </label>
                            <select  name="post_status" class="form-control">
                                <option value="draft">Status</option>
                                <option value="published">Published</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="post_content">Content: </label>
                            <textarea id="editor1" name="post_content" cols="40" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="post_desc">Description: </label>
                            <textarea name="post_desc" cols="40" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="add_post" class="btn btn-primary">
                        </div>      
                    </form>
                </div>
            </div>
        </div>
    </div>
