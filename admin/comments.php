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
                    <a href="#">Comments</a>
                    </li>
                </ul>
            </div>

            <?php
                if (isset($_GET['source'])) {
                    
                $source = $_GET['source'];

                    } else {
                        $source = '';
                    }

                    switch ($source) {
                        case 'add_comment':
                            include "includes/add_comment.php";
                            break;
                            case 'edit_comment':
                            include "includes/edit_comment.php";
                            break;
                        default:
                           include "includes/view_all_comments.php";
                            break;
                    }

            ?>

        </div>
    </div>

    <?php include "includes/admin_footer.php"; ?>
