<?php


// Helper Function 


function redirect($location){

	header("Location: $location");
}


function query($sql){

	global $connection;

	return mysqli_query($connection, $sql);
}


function confirm($result){

	global $connection;

	if (!$result) {
		
		die("FAILED " . mysqli_error($connection));
	}
}


function escape_string($string){

	global $connection;

	return mysqli_escape_string($connection,$string);
}


function fetch_array($send_query){

	return mysqli_fetch_array($send_query);
}


// Display Categoies on Navigation 
function category() {
	$query = "SELECT * FROM categories"; // Select all categories on row caregories
	$send_query = query($query); // Send Qyery To Database
	// Conifirm Query is Done
	confirm($send_query);

	while ($row = fetch_array($send_query)) { // lought to row categories and fetch data
		
		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];

		$category_class = '';
		$registration_class = '';
		$registration = 'login.php';

		$pageName = basename($_SERVER['PHP_SELF']);

		if (isset($_GET['cat_id']) && $_GET['cat_id'] == $cat_id ) {
			
			$category_class = "active";
		} else if ($pageName == $registration) {
			$registration_class = 'active';
		}

		echo "<li id='$category_class' class='nav-item current-page-item'>
			<a class='nav-link' href='/blog/category/{$cat_id}'>{$cat_title}</a>
		</li>";

	}

}


// DISPLAY THREE LATEST POSTS

function latest_posts() {

	$query = "SELECT * FROM posts LIMIT 3 ";

	$send_query = query($query);

	while ($row = fetch_array($send_query)) {
	
	$post_id = $row['post_id'];
	$post_category_id = $row['post_category_id'];
	$post_user = $row['post_user'];
	$post_title = $row['post_title'];
	$post_tags = $row['post_tags'];
	$post_status = $row['post_status'];
	$post_content = $row['post_content'];
	$post_image = $row['post_image'];
	$post_desc = $row['post_desc'];
	$post_date = $row['post_date'];
	$post_comment_count = $row['post_comment_count'];

	$post_titl = str_replace(" ", "-", $post_title);

	$get_latest_posts = <<<DELIMETER

    <div class="side pop-media">
		<ul>
			<li class="side-pop-img">
				<a href="#"><img src="/blog/images/{$row['post_image']}" class="rounded d-block img-fluid recent-post-img wp-post-image"></a>
			</li>
			<li class="side-pop-content media-body">
				<h6><a href="/blog/post/{$row['post_id']}/$post_titl">{$row['post_title']}</a></h6>
			</li>
		</ul>
	</div>

DELIMETER;

   echo $get_latest_posts;

   }


}


function users_online() {

	if (isset($_GET['onlineusers'])) {
		global $connection;

		if (!$connection) {
			
			session_start();

			include("../includes/config.php");

			$session = session_id();
			$time = time();
			$time_out_in_seconds = 05;
			$time_out = $time - $time_out_in_seconds;

			$query = "SELECT * FROM users_online WHERE session = '$session' ";
			$send_query = mysqli_query($connection, $query);
			if (!$send_query) {
			    die("Some Error on " . mysqli_error($connection));
			}
			$count = mysqli_num_rows($send_query);

			if ($count == NULL) {
			    
			    mysqli_query($connection, "INSERT INTO users_online(session, timee) VALUES('$session', '$time')" );
			} else {
			    mysqli_query($connection, "UPDATE users_online SET timee = '$time' WHERE session = '$session'" );
			}

			$user_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE timee > '$time_out'");

			echo mysqli_num_rows($user_online_query);
		}
	

	

	

   }

}

users_online();


/***************SLIDER*******************/

function front_slider_image() {

	$query = "SELECT * FROM posts LIMIT 10";
            $send_query = query($query);

            confirm( $send_query);

            while ($row = mysqli_fetch_array($send_query)) {
                
                $post_id = $row['post_id'];
                $post_user = $row['post_user'];
                $post_title = $row['post_title'];
                $post_image = $row['post_image'];


	$get_front_slider_img = <<<DELIMETER

    <div class="sp-slide">
        <img class="sp-image" src="/blog/images/{$row['post_image']}"
            data-src="/blog/images/{$row['post_image']}"
            data-retina="http://bqworks.com/slider-pro/images/image1_large.jpg"/>

        <div class="sp-caption">{$row['post_title']}</div>
    </div>

DELIMETER;

   echo $get_front_slider_img;

   }


}


function side_slider_image() {

	$query = "SELECT * FROM posts LIMIT 10";
            $send_query = query($query);

            confirm( $send_query);

            while ($row = mysqli_fetch_array($send_query)) {
                
                $post_id = $row['post_id'];
                $post_user = $row['post_user'];
                $post_title = $row['post_title'];
                $post_image = $row['post_image'];


	$get_side_slider_img = <<<DELIMETER

    <div class="sp-thumbnail">
        <div class="sp-thumbnail-image-container">
            <img class="sp-thumbnail-image" src="/blog/images/{$row['post_image']}"/>
        </div>
        <div class="sp-thumbnail-text">
            <div class="sp-thumbnail-title">{$row['post_user']}</div>
            <div class="sp-thumbnail-description">{$row['post_title']}</div>
        </div>
    </div>
DELIMETER;

   echo $get_side_slider_img;

   }


}


function recordCount($table){

	$query = "SELECT * FROM " . $table;
	$selct_all_post = query($query);

	$result = mysqli_num_rows($selct_all_post);

	confirm($result);

	return $result;
}








?>




