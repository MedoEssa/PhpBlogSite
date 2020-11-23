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
                    <a href="#">Profile</a>
                    </li>
                </ul>
            </div>

            <?php

                if (isset($_SESSION['username'])) {
                  
                  $the_username = $_SESSION['username'];


                   $query = "SELECT * FROM users WHERE username = '{$the_username}' ";
                   $send_query = query($query);

                  confirm($send_query);
                   while ($row = mysqli_fetch_array($send_query)) {
                       
                       $user_id = $row['user_id'];
                       $username = $row['username'];
                       $user_firstname = $row['user_firstname'];
                       $user_lastname = $row['user_lastname'];
                       $user_email = $row['user_email'];
                       $user_image = $row['user_image']; 
                       $user_password = $row['user_password'];
                       $user_bio = $row['user_bio'];
                       $user_role = $row['user_role'];
                       

                   }

                  }

                ?>
            
             <div class="row">
                    <div class="box col-md-8">
                        <div class="box-inner">
                            <div class="box-header well">
                                <h2> Profile</h2>
                                <div class="box-icon">
                                    <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                                    <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                                    <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content row"> 
                                <form action="" method="post">
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
                                        <input type="submit" name="update_profile" class="btn btn-primary">
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

        </div>
    </div>

    <?php include "includes/admin_footer.php"; ?>