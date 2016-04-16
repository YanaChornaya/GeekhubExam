
		<!--site-footer-->
		<footer class="site-footer" >
			<div class="container">
				<div class="logo-social">
					<?php if (get_theme_mod('logo-img')): ?>
						<img src="<?php echo get_theme_mod('logo-img') ?>" alt="logo">
					<?php endif; ?>
					<span class="copyright"><?php echo date('Y'); ?>© lawyer.</span>
					<?php my_social_media_icons(); ?>
				</div>
				<?php if (is_active_sidebar('footer-sidebar')) :
					dynamic_sidebar('footer-sidebar');
				endif; ?>

			</div>
		</footer>
		<!--/site-footer-->
	</div>
	<!--/wrapper-->

	<?php wp_footer(); ?>

</body>
</html>
