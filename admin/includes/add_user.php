<?php

if (isset($_POST['add_user'])) {
    
    $username = escape_string($_POST['username']);
    $user_firstname = escape_string($_POST['user_firstname']);
    $user_lastname = escape_string($_POST['user_lastname']);
    $user_email = escape_string($_POST['user_email']);

    $user_image = escape_string($_FILES['user_image']['name']);
    $user_image_temp = escape_string($_FILES['user_image']['tmp_name']);

    $user_password = escape_string($_POST['user_password']);
    $user_role = escape_string($_POST['user_role']);
    $user_bio = escape_string($_POST['user_bio']);

    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array("cost" => 10));

    move_uploaded_file($user_image_temp, "../images/$user_image");

    $query = "INSERT INTO users(username,user_firstname,user_lastname,user_email,user_image,user_role,user_password,user_bio) VALUES ('{$username}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_image}','{$user_role}','{$user_password}','{$user_bio}') ";
    $send_query = query($query);
    confirm($send_query);

    echo "Users Created Success" . " " . "<a href='users.php'>View Users</a>";
}



?>




<div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="glyphicon glyphicon-edit"></i> Add User</h2>
                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content row"> 
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username">Username: </label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="user_firstname">Firstname: </label>
                            <input type="text" name="user_firstname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="user_lastname">Lastname: </label>
                            <input type="text" name="user_lastname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="user_email">Email: </label>
                            <input type="email" name="user_email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="user_image">Photo: </label>
                            <input type="file" name="user_image" class="form-control">
                            <p><small>size: 15M</small></p>
                        </div>
                        <div class="form-group">
                            <label for="user_role">USER ROLE</label>
                            <select name="user_role" class="form-control">
                                <option>SELECT ROLE</option>
                                <option value="admin">admin</option>
                                <option value="subscriber">subscriber</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user_password">Password: </label>
                            <input type="password" name="user_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="user_bio">Biographie: </label>
                            <textarea class="form-control" name="user_bio" cols="40" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="add_user" class="btn btn-primary">
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
