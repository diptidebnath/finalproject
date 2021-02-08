<!-- FOOTER -->
<footer class="primary_bg">
	<div class="container py-5 clearfix">
		<div class="row">
			<div class="col-md-4 mt-4 mt-md-2">

				<?php
				if (is_active_sidebar('footer-sidebar-1')) {
					dynamic_sidebar('footer-sidebar-1');
				}
				?>
			</div><!-- end col-lg-3 -->

			<div class="col-md-4 mt-4 mt-md-2">

				<?php
				if (is_active_sidebar('footer-sidebar-2')) {
					dynamic_sidebar('footer-sidebar-2');
				} ?>
			</div>
			<!-- end col-lg-3 -->

			<div class="col-md-4 mt-4 mt-md-2">

				<?php
				if (is_active_sidebar('footer-sidebar-3')) {
					dynamic_sidebar('footer-sidebar-3');
				} ?>

			</div><!-- end col-lg-3 -->

		</div>

	</div>

</footer>



<?php wp_footer(); ?>

</body>

</html>