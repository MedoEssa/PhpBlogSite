  <?php

if (isset($_POST['checkBoxArray'])) {
    
    foreach ($_POST['checkBoxArray'] as $key => $postValueId) {
        
        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options) {
            case 'admin':
                $query = "UPDATE users SET user_role = '{$bulk_options}' WHERE user_id = " . escape_string($postValueId) . " ";
                $update_user_role_to_admin = query($query);

                // CONFIRM RESULT
               confirm($update_user_role_to_admin);

                break;

            case 'subscriber':
                $query = "UPDATE users SET user_role = '{$bulk_options}' WHERE user_id = " . escape_string($postValueId) . " ";
                $set_user_role_subscriber = query($query);

                // CONFIRM RESULT
               confirm($set_user_role_subscriber);

                break;

            case 'delete':
                $query = "DELETE FROM users WHERE user_id = " . escape_string($postValueId) . " ";
                $delete_user_query = query($query);

                // CONFIRM RESULT
                confirm($delete_user_query);

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
                <h2> All Users</h2>
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
                                <option value="admin">admin</option>
                                <option value="subscriber">subscriber</option>
                                <option value="delete">delete</option>
                            </select>
                        </div>

                        <div class="col-xs-4">
                            <input type="submit" name="submit" class="btn btn-success" value="apply">
                            <a class="btn btn-primary" href="users.php?source=add_user">Add New</a>
                        </div>
                    </div>
                    <table class="table table-striped table-hovered">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="" id="selectAllBox"></th>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Image</th>
                                <th>Role</th>
                                <th>Date</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                $query = "SELECT * FROM users";
                                $send_query = query($query);
                                confirm($send_query);

                                while ($row = fetch_array($send_query)) {

                                $user_id = $row['user_id'];
                                $username = $row['username'];
                                $user_firstname = $row['user_firstname'];
                                $user_lastname = $row['user_lastname'];
                                $user_image = $row['user_image'];
                                $user_email = $row['user_email'];
                                $user_password = $row['user_password'];
                                $user_role = $row['user_role'];

                                ?>

                                 <tr>
                                     <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value="<?php echo $user_id; ?>"></td>
                                    <td><?php echo $user_id; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td><?php echo $user_firstname; ?></td>
                                    <td><?php echo $user_lastname; ?></td>
                                    <td><img width="50" height="50" class="img-responsive" src="../images/<?php echo $user_image; ?>"></td>
                                   <td><?php echo $user_role; ?></td>
                                   <td>2019-12-06</td>
                                   <td><a href="users.php?source=edit_user&edit_user=<?php echo $user_id; ?>">Edit</a></td>
                                </tr>

                             <?php }

                        ?>
                           
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>