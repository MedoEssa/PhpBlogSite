
<!-- INCLUDES HEADER -->
<?php include "includes/header.php"; ?>


<!-- POSTS START -->
<div class="st-content-area">
	<div class="container">
		<div class="site-content row" id="content">
			<div class="st-primary-wrapper col-lg-8">
				<div id="primary" class="content-area">
					<main>
						<div class="row">
							<div class="col-md-12">

							<?php

							// DISPLAY RESULTS
							 if (isset($_POST['search-query'])) {

	$search = $_POST['search'];

	$query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";

	$send_query = query($query);

	confirm($send_query);

	$count = mysqli_num_rows($send_query);

	$message = "";

	if ($count == 0) {
		

		echo "<h2 class='serch-result'>No Result</h2>";
         

		} else {

			echo "<h4 class='search_title'>All results about <span class='theme-color'>$search </span></h4>";

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

?>

	 

        <article class="stiky">
			<div class="card">
				<a href="/blog/post/<?php echo $post_id; ?>/<?php echo str_replace(" ", "-", $post_title); ?>" class="dj-thumb-link">
					<img width="1000" height="579" src="/blog/images/<?php echo $post_image; ?>" class="card-img-top d-block img-fluid w-100 wp-post-image">
				</a>
				<div class="card-block">
					<header class="entry-header">
						<h4 class="entry-title card-title"><a href="/blog/post/<?php echo $post_id; ?>/<?php echo str_replace(" ", "-", $post_title); ?>"><?php echo $post_title; ?></a></h4>
						<div class="entry-meta">
							<span class="posted-on meta-span">
								<i class="fa fa-calendar-check-o"></i>
								<a href="#"><time><?php echo $post_date; ?></time></a>
							</span>
							<span class="byline meta-span">
								<i class="fa fa-user-o"></i>
								<span>
									<a href="#"><?php echo $post_user; ?></a>
								</span>
							</span>
							<span class="comments-link meta-span">
								<i class="fa fa-comments-o"></i>
								<a href="#">
									<?php echo $post_comment_count; ?>
								</a>
							</span>
						</div>
					</header>
					<div class="entry-excerpet entry-summary">
						<p><?php echo $post_content; ?></p>
					</div>
				</div>
				<div class="card-footer entry-footer">
					<div class="row align-items-center">
						<div class="col-md-8 tag">
							<span class="tag-links">
								<i class="fa fa-tags" title="Tags"></i>
								<a href="#"><?php echo $post_tags; ?> </a>
							</span>
						</div>
						<div class="col-md-4">
							<div class="read-more text-right">
								<h6>
									<small>
										<a href="/blog/post/<?php echo $post_id; ?>/<?php echo str_replace(" ", "-", $post_title); ?>">Read More
											<i class="fa fa-arrow-right "></i>
										</a>
									</small>
								</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>

						<?php } } }  ?>

	                        </div>					
                        </div>
					</main>
				</div>
			</div>
            <!-- POSTS END -->

            <!-- SIDEBAR -->

            <?php include "includes/sidebar.php"; ?>
			
		</div>
	</div>
</div>

<!-- ST AREA END -->

<!-- FOOTER START -->

 <?php include "includes/footer.php"; ?>