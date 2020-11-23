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

<table class="table">
	<thead>
		<tr>
			<th>Id</th>
			<th>Comment post id</th>
			<th>Author</th>
			<th>Email</th>
			<th>Comment</th>
			<th>status</th>
			<th>Approved</th>
			<th>Unapproved</th>
			<th>Date</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
			<?php


// DISPLAY ALL COMMENTS ON ADMIN
		$query = "SELECT * FROM comments WHERE comment_post_id =" . mysqli_real_escape_string($connection, $_GET['p_id']) . " ";
		$send_query = query($query);

		// CONIRM RESULT
		confirm($send_query);

		while ($row = fetch_array($send_query)) {
			
			$comment_id = $row['comment_id'];
			$comment_post_id = $row['comment_post_id'];
			$comment_author = $row['comment_author'];
			$comment_email = $row['comment_email'];
			$comment_content = $row['comment_content'];
			$comment_status = $row['comment_status'];
			$comment_date = $row['comment_date'];


        echo "<tr>";
			echo "<th>{$comment_id}</th>";
			echo "<th>{$comment_post_id}</th>";
			echo "<th>{$comment_author}</th>";
			echo "<th>{$comment_email}</th>";
			echo "<th>{$comment_content}</th>";
			echo "<th>{$comment_status}</th>";
			echo "<th><a href='comments.php?approve={$comment_id}'>Approve</a></th>";
			echo "<th><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></th>";
			echo "<th>{$comment_date}</th>";
			echo "<th><a href='post_comments.php?delete={$comment_id}&p_id=" . $_GET['p_id'] ."'>Delete</a></th>";
		echo "</tr>";

			
		}



		?>
		
	</tbody>
</table>

<?php

// APPROVED COMMENT

if (isset($_GET['approve'])) {
	
	$the_comment_id = $_GET['approve'];

	$query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = " . escape_string($the_comment_id) . " ";

	$approved_comment = query($query);

	confirm($approved_comment);

	header("Location: comments.php");
}

// UNAPPROVED COMMENT

if (isset($_GET['unapprove'])) {
	
	$the_comment_id = $_GET['unapprove'];

	$query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = " . escape_string($the_comment_id) . " ";
	$unapproved_comment = query($query);

	confirm($unapproved_comment);

	header("Location: comments.php");
}


?>

<?php

// DELETE COMMENT

if (isset($_GET['delete'])) {
	
	$the_comment_id = $_GET['delete'];

	$query = "DELETE FROM comments WHERE comment_id = " . escape_string($the_comment_id) . " ";
	// SEND REQUEST
	$delete_comment_query = query($query);

	// CONFIRM RESULT
	confirm($delete_comment_query);

	header("Location: post_comments.php?p_id=" . $_GET['p_id'] . "");
}





?>




     </div>
    </div>

    <?php include "includes/admin_footer.php"; ?>