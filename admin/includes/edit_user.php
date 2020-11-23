
<?php

if (isset($_GET['edit_user'])) {
    
    $the_user_id = $_GET['edit_user'];


   $query = "SELECT * FROM users WHERE user_id = " . escape_string($the_user_id) . " ";
   $send_query = query($query);

   confirm($send_query);

   while ($row = fetch_array($send_query)) {
       
       $user_id = $row['user_id'];
       $username = $row['username'];
       $user_firstname = $row['user_firstname'];
       $user_lastname = $row['user_lastname'];
       $user_image = $row['user_image'];

       $user_role = $row['user_role'];
       $user_password = $row['user_password'];
       $user_email = $row['user_email'];
       $user_bio = $row['user_bio'];
      
   }





?>


<?php



if (isset($_POST['update_user'])) {
    
       $username = escape_string($_POST['username']);
       $user_firstname = escape_string($_POST['user_firstname']);
       $user_lastname = escape_string($_POST['user_lastname']);

      

       $user_image = escape_string($_FILES['user_image']['name']);
       $user_image_temp = escape_string($_FILES['user_image']['tmp_name']);


       $user_role = escape_string($_POST['user_role']);
       $user_password = escape_string($_POST['user_password']);
       $user_email = escape_string($_POST['user_email']);
       $user_bio = escape_string($_POST['user_bio']);
       $user_date = date('y-m-d');

    move_uploaded_file($user_image_temp, "../images/$user_image");

    $query = "UPDATE users SET ";
    $query .= "username = '{$username}', ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_image = '{$user_image}', ";
    $query .= "user_role = '{$user_role}', ";
    $query .= "user_password = '{$user_password}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_date = now(), ";
    $query .= "user_bio = '{$user_bio}' ";
    $query .= "WHERE user_id = {$the_user_id} "; 

    $send_query = query($query);

    confirm($send_query);

    echo "<p class='bg-success'>user Updaed <a href='../post.php?user_id=$the_user_id'>View Post</a> Or <a href='users.php'>View all users</a><p>";
}

} else {
  header("Location: index.php");
}





?>

<div class="row">
                    <div class="box col-md-8">
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
                                <form action="" method="post"  enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6 px-1">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input value="<?php echo $username; ?>" type="text" class="form-control" placeholder="Username" name="username">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label for="user_email">Email address</label>
                                                <input value="<?php echo $user_email; ?>" name="user_email" type="email" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 px-1">
                                            <div class="form-group">
                                                <label for="user_firstname">Firstname</label>
                                                <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" placeholder="Username" name="user_firstname">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label for="user_lastname">Lastname</label>
                                                <input value="<?php echo $user_lastname; ?>" name="user_lastname" type="text" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="user_image">Picture</label>
                                        <input value="<?php echo $user_image; ?>" type="file" name="user_image" class="form-control">
                                    </div>
                                   <div class="row">
                                        <div class="col-md-6 px-1">
                                            <div class="form-group">
                                                <label for="user_role">Status: </label>
                                                <select  name="user_role" class="form-control">
                                                <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
                                                            <?php
                                                        if ($user_role == 'admin') {
                                                            
                                                            echo "<option value='subscriber'>subscriber</option>";
                                                        } else {
                                                            echo "<option value='admin'>admin</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label for="user_password">Password</label>
                                                <input autocomplete="off" name="user_password" type="password" class="form-control" placeholder="Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="user_bio">About Me</label>
                                                <textarea name="user_bio" rows="4" cols="80" class="form-control" placeholder="Here can be your description"><?php echo $user_bio; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="update_user" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-body">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src="../images/<?php echo $user_image; ?>" alt="...">
                                        <h5 class="title"><?php echo $user_firstname . " " . $user_lastname; ?></h5>
                                    </a>
                                    <p class="description">
                                        <?php echo $username; ?>
                                    </p>
                                </div>
                                <p class="description text-center">
                                    <?php echo $user_bio; ?>
                                </p>
                            </div>
                            <hr>
                            <div class="button-container mr-auto ml-auto">
                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                    <i class="fa fa-facebook-square"></i>
                                </button>
                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                    <i class="fa fa-twitter"></i>
                                </button>
                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                    <i class="fa fa-google-plus-square"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>