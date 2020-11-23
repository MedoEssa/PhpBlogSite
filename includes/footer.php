<footer class="site-footer">
<div id='toTop'>
	<i class="fa fa-arrow-up"></i>
</div>
	<div class="footer-logo">
		<a href="#">
		<img src="/blog/images/logo2.png">
		</a>
	</div>
	<div class="copyright">
		<div class="copyright-social">
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
		<div class="copy-text">
		Copyright at 2019. Admania All Rights Reserved
		</div>
	</div>
</footer>


   <!-- bootstrap js -->

  <script src="/blog/js/jquery.min.js"></script>
  <script src="/blog/js/popper.min.js"></script>
  <script src="/blog/js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>

  <script type="text/javascript">
  	$(window).scroll(function() {
    if ($(this).scrollTop()) {
        $('#toTop').fadeIn();
    } else {
        $('#toTop').fadeOut();
    }
});

$("#toTop").click(function () {
   //1 second of animation time
   //html works for FFX but not Chrome
   //body works for Chrome but not FFX
   //This strange selector seems to work universally
   $("html, body").animate({scrollTop: 0}, 1000);
});
  </script>


</body>
</html>