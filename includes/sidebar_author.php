<aside id="secondary" class="col-md-4 widget-area">
	<!-- SEARCH FORM WIDGET START -->
	<section id="search" class="widget-search card widget">
		<form method="post" class="searchform durja-searchform" action="/blog/search.php">
			<div class="input-group">
				<input type="text" name="search" class="form-control s" placeholder="Search for...">
				<span class="input-group-btn">
					<button name="search-query" class="btn btn-secondary search-button" type="submit"><i class="fa fa-search"></i>
					</button>
				</span>
			</div>
		</form>
	</section>
	<!-- SEARCH FORM WIDGET END -->	

	<!-- ABOUT US WIDGET START -->
	<section id="durja-about-widget2" class="widget card durja-about-widget">
		<div class="card-header">
			<h6 class="widget-title mb-0">About</h6>
		</div>
		<?php

$query = "SELECT * FROM users WHERE username = '{$post_user}' ";
$send_query = query($query);
confirm($send_query);
while ($row = fetch_array($send_query)) {
	
	$username = $row['username'];
	$user_image = $row['user_image'];
	$user_bio = $row['user_bio'];
}

		?>
		<div class="durja-about-widget">
			<div class="durja-about-img">
				<a href="#">
					<img width="100" src="/blog/images/<?php echo $user_image; ?>">
				</a>
			</div>
			<div class="card-block">
				<p><?php echo $user_bio; ?> </p>
			</div>
		</div>
	</section>
	<!-- ABOUT US WIDGET END -->

	<!-- RESENT POST WIDGET START -->
	<section id="durja_latest_posts_widget-2" class="widget card durja_latest_posts_widget">
		<div class="card-header">
			<h6 class="widget-title mb-0">Latest Posts</h6>
		</div>
		<div class="card-block">

			<?php latest_posts(); ?>
			
		</div>
	</section>
	<!-- RESENT POST WIDGET END -->

		<!-- TAGS WIDGET START -->
	<section class="widget card widget_tag_cloud">
		<div class="card-header">
			<h6 class="widget-title mb-0">Categories</h6>
		</div>
		<div class="card-block tag-cloud">
			<ul>
				<?php

$query = query("SELECT * FROM categories");
confirm($query);

while ($row = fetch_array($query)) {
	
	$cat_id = $row['cat_id'];
	$cat_title = $row['cat_title'];

	echo "<li><a href='/blog/category/{$cat_id}'>{$cat_title}</a></li>";
}

				?>
			</ul>
		</div>
	</section>
	<!-- TAGS WIDGET END -->

	<!-- SOCIAL MEDIA BUTTON START -->
<section class="widget card">
	<div class="card-header">
	    <h6 class="widget-title mb-0">Social Icon</h6>
	</div>
	<div class="card-block">
		<div class="admania-widget-social">
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
			<i class="fa fa-google-plus"></i>
			</a>
			<a href="#">
			<i class="fa fa-linkedin"></i>
			</a>
			<a href="#">
			<i class="fa fa-rss"></i>
			</a>
		</div>
	</div>

</section>

<!-- SOCIAL MEDIA BUTTON END -->



	<!-- NEWSLETTER START -->
	<section class="widget card widget_mc4wp_form_widget">
		<form>
			<div class="duja-newsletter">
				<div class="card-block">
					<h6 class="title">
						<i class="fa fa-money"></i>
						 Interested in Discounts?
					</h6>
					<p class="text-muted">
						<small>Subscribe here and get email when we offer discounts!</small>
					</p>
					<p>
						<input class="form-control" type="text" name="email" placeholder="Your email address..">
					</p>
					<p>
						<input type="submit" name="send" value="sing-up" class="btn btn-primary">
					</p>
				</div>
			</div>
		</form>
	</section>
</aside>