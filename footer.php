<!--Footer-->
		<footer>
			<div class="container text-center">
				<div class="site-sns">
                <?php 
				
				for($i=0;$i<9; $i++){
					$social_icon = meris_options_array('social_icon_'.$i);
					$social_link = meris_options_array('social_link_'.$i);
					if($social_link !=""){
					echo '<a href="'.$social_link.'" target="_blank"><i class="'.$social_icon.'"></i></a>';
					}
					}
					?>
					
				</div>
				<div class="site-info">
					<?php echo meris_options_array('copyright');?>
				</div>
			</div>
		</footer>
	</div>	
    <?php wp_footer();?>
</body>
</html>