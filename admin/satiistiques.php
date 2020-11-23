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
                    <a href="#">Satistic</a>
                    </li>
                </ul>
            </div>
            <div class=" row">
<?php $count_posts = recordCount('posts'); ?>
<?php $count_comments = recordCount('comments'); ?>
<?php $count_users = recordCount('users'); ?>
<?php $count_categories = recordCount('categories'); ?>
                <script type="text/javascript">
      google.load("visualization", "1.1", {packages:["bar"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            
            <?php
                                      
    $element_text = ['All Posts', 'Comments', 'Users', 'Categories'];       
    $element_count = [$count_posts, $count_comments, $count_users, $count_categories];


    for($i =0;$i < 4; $i++) {
    
        echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
     
    
    
    }
                                                            
            ?>

           
               
     
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
      }
    </script>
      <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
            </div>
        </div>
    </div>

<?php include "includes/admin_footer.php"; ?>