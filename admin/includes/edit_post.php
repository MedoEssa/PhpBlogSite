
<?php

if (isset($_GET['edit_post'])) {
    
    $the_post_id = $_GET['edit_post'];


   $query = "SELECT * FROM posts WHERE post_id = " . escape_string($the_post_id) . " ";
   $send_query = query($query);

   confirm($send_query);

   while ($row = fetch_array($send_query)) {
       
       $post_id = $row['post_id'];
       $post_category_id = $row['post_category_id'];
       $post_user = $row['post_user'];
       $post_title = $row['post_title'];
       $post_image = $row['post_image'];

       $post_status = $row['post_status'];
       $post_content = $row['post_content'];
       $post_comment_count = $row['post_comment_count'];

       $post_date = $row['post_date'];
       $post_tags = $row['post_tags'];
       $post_desc = $row['post_desc'];
   }





?>


<?php


if (isset($_POST['update_post'])) {
    
    $post_category_id = escape_string($_POST['post_category']);
    $post_user = escape_string($_POST['post_user']);
    $post_title = escape_string($_POST['post_title']);

    $post_image = escape_string($_FILES['post_image']['name']);
    $post_image_temp = escape_string($_FILES['post_image']['tmp_name']);

    $post_status = escape_string($_POST['post_status']);
      $post_desc  = escape_string($_POST['post_desc']);
    $post_content = escape_string($_POST['post_content']);
  
    $post_date = date('y-m-d');
    $post_tags  = escape_string($_POST['post_tags']);

    move_uploaded_file($post_image_temp, "../images/$post_image");

    if (empty($post_image)) {

    $select_image = "SELECT post_image FROM posts WHERE post_id = " . escape_string($the_post_id) . " ";
    $select_specifique_image = query($select_image);
    confirm($select_specifique_image);
    while ($row = fetch_array($select_specifique_image)) {
        
        $post_image = $row['post_image'];
    }

}


    $query = "UPDATE posts SET ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_user = '{$post_user}', ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_image = '{$post_image}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_desc = '{$post_desc}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_comment_count = '{$post_comment_count}', ";
    $query .= "post_date = now(), ";
    $query .= "post_tags = '{$post_tags}' ";
    $query .= "WHERE post_id = {$the_post_id} "; 

    $send_query = query($query);

    confirm($send_query);

    echo "<p class='bg-success'>Post Updaed <a href='../post.php?p_id=$the_post_id'>View Post</a> Or <a href='posts.php'>View all posts</a><p>";
}

} else {
  header("Location: index.php");
}





?>


<div class="row">
  <div class="box col-md-12">
    <div class="box-inner">
        <div class="box-header well">
            <h2> Edit User</h2>
            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
        <div class="box-content row"> 

        <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label for="post_user">Users</label>
        <select class="form-control" name="post_user">
        <?php echo "<option value='{$post_user}'>{$post_user}</option>"; ?>
        <option>SELECT User</option>

                <?php

        $select_user = "SELECT * FROM users";
        $users_query = query($select_user);
        confirm($send_query);

        while ($row = fetch_array($users_query)) {

        $user_id = $row['user_id'];
        $username = $row['username'];


            echo "<option value='{$username}'>{$username}</option>";

        }

                ?>
        </select>

        </div>
        <div class="form-group">
        <label for="post_title">Title: </label>
        <input value="<?php echo $post_title; ?>" type="text" name="post_title" class="form-control">
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
        <img src="../images/<?php echo $post_image; ?>" class="img-responsive" width="100" heigh="100">
        </div>
        <div class="form-group">
        <label for="post_tags">Tags: </label>
        <input value="<?php echo $post_tags; ?>" type="text" name="post_tags" class="form-control">
        </div>

        <div class="form-group">
        <label for="post_status">Status: </label>
        <select  name="post_status" class="form-control">
        <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
                    <?php
                if ($post_status == 'published') {
                    
                    echo "<option value='draft'>draft</option>";
                } else {
                    echo "<option value='published'>published</option>";
                }
            ?>
        </select>
        </div>
        <div class="form-group">
        <label for="post_content">Content: </label>
        <textarea id="editor1" name="post_content" cols="40" rows="10" class="form-control"><?php echo str_replace('\r\n\r\n', '<br>', $post_content); ?></textarea>
        </div>
        <div class="form-group">
            <label for="post_desc">Description: </label>
            <textarea name="post_desc" cols="40" rows="10" class="form-control"><?php echo $post_desc; ?></textarea>
        </div>
        <div class="form-group">
        <input value="Update post" type="submit" name="update_post" class="btn btn-primary">
        </div>


        </form>
      </div>
    </div>
  </div>
