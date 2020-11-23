<!-- INCLUDE DB -->
<?php include "includes/config.php"; ?>

<!-- INCLUDE FUNCTIONS -->
<?php include "admin/functions.php"; ?>

<?php session_start(); ?>

<!DOCTYPE html>
<html lang="En">
<head>
	<title>Durja</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

	<?php
if (isset($_GET['p_id'])) {
	
	$the_post_id = $_GET['p_id'];

}
	$query = "SELECT * FROM posts WHERE post_id = " . escape_string($the_post_id) . " ";
              $send_query = query($query);
              confirm($send_query);
             while ($row = fetch_array($send_query)) {
                
                $post_id = $row['post_id'];
                $post_tags = $row['post_tags'];      
                $post_desc = $row['post_desc'];

                ?>

                <meta name="keyword" content="<?php echo $post_tags; ?>">
                <meta name="description" content="<?php echo $post_desc; ?>">

<?php }


	?>
	
	<link rel="stylesheet" type="text/css" href="/blog/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/blog/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="/blog/css/style.css">
	<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> -->
	<link href="https://fonts.googleapis.com/css?family=Lora&display=swap" rel="stylesheet">
	<script type="text/javascript" src="/blog/js/jquery-1.11.0.min.js"></script>


</head>

<!-- INCLUDE NAVIGATION -->
<?php include "includes/navigation.php"; ?>


<!-- POSTS START -->
<div class="st-content-area">
	<div class="container">
		<div class="site-content row" id="content">
			<div class="st-primary-wrapper">
				<div id="primary" class="content-area">
					<main>
						<div class="row">
							<div class="col-md-8">

							<?php

							if (isset($_GET['p_id'])) {
								
								$the_post_id = $_GET['p_id'];
							}

							$post_views_count_query = "UPDATE posts SET post_views_count = 	post_views_count + 1 WHERE post_id = " . escape_string($the_post_id) . " ";
								$send_post_views_query = query($post_views_count_query);

								confirm($send_post_views_query);

							    // Display all Posts
							    $query = "SELECT * FROM posts WHERE post_id = " . escape_string($the_post_id) . " ";
								$send_query = query($query);
								confirm($send_query);

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
									$post_views_count = $row['post_views_count'];

									?>

									<article class="stiky">
										<div class="card">
											<a href="#" class="dj-thumb-link">
												<img width="1000" height="579" src="/blog/images/<?php echo $post_image; ?>" class="card-img-top d-block img-fluid w-100 wp-post-image">
											</a>
											<div class="card-block">
												<header class="entry-header">
													<h4 class="entry-title card-title"><a href="#"><?php echo $post_title; ?></a></h4>
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
														<span class="views-link meta-span">
											                <i class="fa fa-eye"></i>
											                <a href="#">
											                  <?php echo $post_views_count; ?>
											                </a>
											            </span>
														<span class="comments-link meta-span">
															<i class="fa fa-comments-o"></i>
															<a href="#">

															<?php

											              $comment_query = "SELECT * FROM comments WHERE comment_post_id = $post_id ";
													        $send_count_query = query($comment_query);

													        confirm($send_count_query);

													        while ($row = fetch_array($send_count_query)) {
													            $comment_id = $row['comment_id'];
													            $comment_post_id = $row['comment_post_id'];

													        }
													        
													         $count_comments = mysqli_num_rows($send_count_query);


													          ?>
													          <?php echo $count_comments; ?>
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
											              <?php

											                    $categories_query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";

											                    $send_categories_query = mysqli_query($connection, $categories_query);

											                    while ($row = mysqli_fetch_array($send_categories_query)) {

											                        $cat_id = $row['cat_id'];
											                        $cat_title = $row['cat_title'];
											                        
											                        ?>
											                         <span class="cat-links">
											                      <i class="fa fa-folder-open-o" title="Categories"></i>
											                      <a href="/blog/category/<?php echo $cat_id; ?>"><?php echo $cat_title; ?> </a>
											                  </span>

											                    <?php }
											                ?>
											              <span class="tag-links">
											                  <i class="fa fa-tags" title="Tags"></i>
											                  <a href="#"><?php echo $post_tags; ?> </a>
											              </span>
											            </div>
													<div class="col-md-4">
														<div class="share-button text-right">
															<ul>
																<a href="#">
																<i class="fa fa-facebook"></i>
																</a>
																<a href="#">
																<i class="fa fa-twitter"></i>
																</a>
																<a href="#">
																<i class="fa fa-instagram"></i>
																</a>
																<a href="#">
																<i class="fa fa-youtube"></i>
																</a>
																<a href="#">
																<i class="fa fa-pinterest"></i>
																</a>
																<a href="#">
																<i class="fa fa-linkedin"></i>
																</a>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</article>

								<?php }
							 ?>

							 				<!-- COMMENT AREA -->

				<article class="stiky">
					<div class="card">
						<div class="card-block">
							<header class="entry-header">
							    <h4>Comment</h4>
							</header>
						</div>
						<div class="card-footer entry-footer">
							<?php

								if (isset($_POST['add_comment'])) {

								    $comment_author = escape_string($_POST['comment_author']);
									$comment_email = escape_string($_POST['comment_email']);
									$comment_content = escape_string($_POST['comment_content']);
										if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
											
											$add_comment_query = "INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) VALUES($the_post_id,'{$comment_author}','{$comment_email}','{$comment_content}','unapproved',now() )";

										$send_comment_query = query($add_comment_query);

										confirm($send_comment_query);
											
									} else {
										echo "<script>alert('Field Can not be empty !')</script>";
									}
									
								}
					

				        ?>
							<form action="" method="post">
								<div class="form-group">
									<label for="comment_author">Username</label>
									<input type="text" name="comment_author" class="form-control" placeholder="Enter your name">
								</div>
								<div class="form-group">
									<label for="comment_email">Email</label>
									<input type="email" name="comment_email" class="form-control" placeholder="Enter your Email">
								</div>
								<div class="form-group">
									<label for="comment_content">Comment</label>
									<textarea name="comment_content" class="form-control"> </textarea>
								</div>
								<div class="form-group">
									<input name="add_comment" type="submit" value="Add Comment" class="btn btn-primary">
								</div>
							</form>
						</div>
					</div>
				</article>


				<!-- DISPLAY COMMENTS -->

				<div class="comments">
					<div class="card">
						<div class="card-header">
							<h6 class="text-center"><?php

							if ($count_comments > 1) {
								echo $count_comments . " " . "Comments";
							} else {
								
								echo $count_comments . " " . "Comment";
							}

							 ?> </h6>
						</div>

						<?php

                     // DISPLAY COMMENTS 

			         $query = query("SELECT * FROM comments WHERE comment_post_id  = {$the_post_id} ");
			         confirm($query);

			         while ($row = fetch_array($query)) {
			         	
			         	$comment_id = $row['comment_id'];
			         	$comment_author = $row['comment_author'];
			         	$comment_date = $row['comment_date'];
			         	$comment_content = $row['comment_content'];
			         


			         	?>

			         	<div class="card-block">
							<div class="row">
								<div class="col-md-2">
									<img src="/blog/images/image6.png" alt="autor-avatar" class="avatar">
								</div>
								<div class="col-md-10">
									<h6 class="author"><?php echo $comment_author; ?></h6>
									<p>
										<span class="posted-on meta-span">
											<i class="fa fa-calendar-check-o"></i>
											<a href="#"><time><?php echo $comment_date; ?></time></a>
										</span>
					                </p>
					                <p>
					                	<?php echo $comment_content; ?>
					                </p>
								</div>
							</div>
						</div>
						<hr>


			          <?php }



						?>


						
						
					</div>
				</div>

	                        </div><!-- end col 8 -->
	                        	 <!-- SIDEBA FOR POST -->
            
                                <?php include "includes/sidebar_post.php"; ?>				
                        </div><!-- end row -->
					</main>
				</div>




			</div>
            <!-- POSTS END -->

           

			
		</div>
	</div>
</div>

<!-- ST AREA END -->

<!-- FOOTER START -->

 <?php include "includes/footer.php"; ?>






