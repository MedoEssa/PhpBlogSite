  <?php

if (isset($_POST['checkBoxArray'])) {
    
    foreach ($_POST['checkBoxArray'] as $key => $postValueId) {
        
        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options) {
            case 'approved':
                $query = "UPDATE comments SET comment_status = '{$bulk_options}' WHERE comment_id = " . escape_string($postValueId) . " ";
                $approved_comment = query($query);

                // CONFIRM RESULT
               confirm($approved_comment);

                break;

            case 'unapproved':
                $query = "UPDATE comments SET comment_status  = '{$bulk_options}' WHERE comment_id = " . escape_string($postValueId) . " ";
                $unapproved_comment = query($query);

                // CONFIRM RESULT
               confirm($unapproved_comment);

                break;

            case 'delete':
               $query = "DELETE FROM comments WHERE comment_id = " . escape_string($postValueId) . " ";
                $delete_comment = query($query);

                // CONFIRM RESULT
               confirm($delete_comment);

               // Location :
               header("Location: comments.php");
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
                <h2> All Comments</h2>
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
                                <option value="">Select Options</option>
                                <option value="approved">approved</option>
                                <option value="unapproved">unapproved</option>
                                <option value="delete">Delete</option>
                            </select>
                        </div>

                        <div class="col-xs-4">
                            <input type="submit" name="submit" class="btn btn-success" value="apply">
                        </div>
                    </div>
                    <table class="table table-striped table-hovered">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="" id="selectAllBox"></th>
                                <th>ID</th>
                                <th>Comment post id</th>
                                <th>Author</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>content</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php

                            $query = "SELECT * FROM comments";
                                    $send_query = query($query);
                                   confirm($send_query);

                                    while ($row = fetch_array($send_query)) {

                                    $comment_id = $row['comment_id'];
                                    $comment_post_id = $row['comment_post_id'];
                                    $comment_author = $row['comment_author'];
                                    $comment_email = $row['comment_email'];
                                    $comment_status = $row['comment_status'];
                                    $comment_content = $row['comment_content'];
                                    $comment_date = $row['comment_date'];

                                    ?>

                                   <tr>
                                        <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value="<?php echo $comment_id; ?>"></td>
                                        <td><?php echo $comment_id; ?></td>
                                        <td><?php echo $comment_post_id; ?></td>
                                        <td><?php echo $comment_author; ?></td>
                                        <td><?php echo $comment_email; ?></td>
                                        <td><?php echo $comment_status; ?></td>
                                        <td><?php echo $comment_content; ?></td>
                                        <td><a href="#"><?php echo $comment_date; ?></a></td>
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