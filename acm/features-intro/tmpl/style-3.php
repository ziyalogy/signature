<?php
/**
 * ------------------------------------------------------------------------
 * Signature Template
 * ------------------------------------------------------------------------
 * Copyright (C) 2004-2018 Buildal Systems (U) Co., Ltd. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * Author: Buildal Systems (U) Co., Ltd
 * Websites:  http://www.buildal.ug -  http://www.buildal.ug
 * This file may not be redistributed in whole or significant part.
 * ------------------------------------------------------------------------
 */
defined('_JEXEC') or die();
$mod = $module->id;
?>

<div id="acm-features-<?php echo $mod; ?>" class="acm-features style-3">
	<div class="container">
		<div class="row">
			<?php if ($helper->get('img-feature')): ?>
				<div class="col-lg-3 col-md-12 col-sm-12">
					<div class="ft-image">
						<div class="img-feature">
							<img src="<?php echo $helper->get('img-feature'); ?>" alt=""/>
						</div>

						<?php if ($helper->get('id-video')): ?>
			    			<div class="play-icon">
					            <!--<a id="myvideo-<?php echo $mod; ?>" class="html5lightbox" data-group="myvideo" href="https://www.youtube.com/watch?v=<?php
          //echo$helper->get('id-video');
          ?>" title="">
					              <span class="d-none">play</span>
					              <span class="fa fa-play"></span>
					            </a>-->
					        </div>
			    		<?php endif; ?>
			    	</div>
				</div>
			<?php endif; ?>

			<div class="col-lg-9 col-md-12 col-sm-12">
				<div class="ft-content">
					<h3><?php echo $helper->get('title'); ?></h3>

					<?php if ($helper->get('description')): ?>
						<?php echo $helper->get('description'); ?>
					<?php endif; ?>

					<?php if ($helper->get('link')): ?>

						<a class="btn btn-secondary mt-3" href="<?php echo $helper->get('link'); ?>">
							<?php echo $helper->get('link-title'); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
(function($){
	jQuery(document).ready(function($) {
    //Popup video
    $("#acm-features-<?php echo $mod; ?> .html5lightbox").html5lightbox({
      autoslide: true,
      showplaybutton: false,
      jsfolder: "<?php echo JUri::base(true) .
          '/templates/' .
          $template .
          '/js/html5lightbox/'; ?>"
    });
	});
})(jQuery);
</script>