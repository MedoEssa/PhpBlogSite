<!-- INCLUDES HEADER -->
<?php include "includes/header.php"; ?>


<!-- INCLUDES FEATURES IMAGES -->
<?php include "includes/feature-image.php"; ?>

<!-- POSTS START -->
<div class="st-content-area">
  <h2 class='category_title'>Posts</h2>
	<div class="container">
		<div class="site-content row" id="content">
			<div class="st-primary-wrapper">
				<div id="primary" class="content-area">
					<main>
						<div class="row">
							<div class="col-md-8">

							<?php


             if (isset($_GET['page'])) {
            
                    $page = $_GET['page'];
                  } else {
                    $page = "";
                  }

                  if ($page == "" || $page == 1) {
                    
                    $page_1 = 0;
                  } else {
                    $page_1 = ($page * 5) - 5;
                  }

                  $query = "SELECT * FROM posts WHERE post_status = 'published' ";
                  $send_query = query($query);
                  confirm($send_query);

                  $count = mysqli_num_rows($send_query);

                  $count = ceil($count / 5);

                  if ($count < 1) {
                    
                    echo "no posts";

                  } else {


              $query = "SELECT * FROM posts LIMIT $page_1, 5 ";
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
                      <a href="/blog/author/<?php echo $post_user; ?>"><?php echo $post_user; ?></a>
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
                <p><?php echo substr($post_content, 0,200) ?>...</p>
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
    
      <?php

      } }  ?>


        <!-- PAGINATION SYSTEM START -->
  <div class="pagination">
    <ul>
          <?php 

  for($i=1;$i<=$count;$i++) {

    if ($i == $page) {
      echo "<li><a class='active-link' href='index.php?page={$i}'>{$i}</a></li>";

    } else {
      echo "<li><a href='/blog/page/{$i}'>{$i}</a></li>";
    }

    
  }

       ?>

    </ul>
  </div>
  <!-- PAGINATION SYSTEM END -->

    </div>

      <!-- SIDEBAR -->

            <?php include "includes/sidebar.php"; ?>

            <!-- SIDEBAR -->

  </div>
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