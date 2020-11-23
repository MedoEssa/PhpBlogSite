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
                    <a href="#">Dashboard</a>
                    </li>
                </ul>
            </div>
            <div class=" row">
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <a data-toggle="tooltip" title="<?php echo $count_posts = recordCount('posts'); ?> new posts." class="well top-block" href="posts.php">
                        <i class="glyphicon glyphicon-edit"></i>
                        <div>Total Posts</div>

                        <div><?php echo $count_posts = recordCount('posts'); ?></div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <a data-toggle="tooltip" title="<?php echo $count_comments = recordCount('comments'); ?> new comments." class="well top-block" href="comments.php">
                        <i class="glyphicon glyphicon-comment"></i>
                        <div>Total Comments</div>
                       
                        <div><?php echo $count_comments = recordCount('comments'); ?></div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <a data-toggle="tooltip" title="<?php echo $count_users = recordCount('users'); ?> new users." class="well top-block" href="users.php">
                        <i class="glyphicon glyphicon-user blue"></i>
                        <div>Total Users</div>
                        
                        <div><?php echo $count_users = recordCount('users'); ?></div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <a data-toggle="tooltip" title="<?php echo $count_categories = recordCount('categories'); ?> new category." class="well top-block" href="categories.php">
                        <i class="  glyphicon glyphicon-th-list"></i>
                        <div>Total Categories</div>
                       
                        <div><?php echo $count_categories = recordCount('categories'); ?></div>
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php include "includes/admin_footer.php"; ?>