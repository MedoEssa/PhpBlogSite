</div>

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="js/jquery.cookie.js"></script>

<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>

<script src='js/jquery.dataTables.min.js'></script>

<script src="bower_components/chosen/chosen.jquery.min.js"></script>

<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>

<script src="js/jquery.noty.js"></script>

<script src="bower_components/responsive-tables/responsive-tables.js"></script>

<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>

<script src="js/jquery.raty.min.js"></script>

<script src="js/jquery.iphone.toggle.js"></script>

<script src="js/jquery.autogrow-textarea.js"></script>

<script src="js/jquery.uploadify-3.1.min.js"></script>

<script src="js/jquery.history.js"></script>

<script src="js/charisma.js"></script>

 <script type="text/javascript">
        $(document).ready(function(event){
            $("#selectAllBox").click(function(){
                if (this.checked) {
                    $(".checkBoxes").each(function(){
                        this.checked = true;
                        
                    });
                } else {
                    $(".checkBoxes").each(function(){
                        this.checked = false;
                    });
                }
            });
            

             var div_box = "<div id='load-screen'><div id='loading'></div></div>";
            $("body").prepend(div_box);
            $('#load-screen').fadeOut(1000, function(){
                $(this).remove();
            });

        });

          function loadUsersOnline(){
            $.get("functions.php?onlineusers=result", function(data){

                $(".usersonline").text(data);
            });
        }
        loadUsersOnline();

        setInterval(function(){
            loadUsersOnline();
        },500);

    </script>


    

      <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
  <script>
      CKEDITOR.replace( 'editor1' );
  </script>



</body>

<!-- Mirrored from usman.it/themes/charisma/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2019 11:45:25 GMT -->
</html>
