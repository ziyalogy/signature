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
$moduleTitle = $module->title;
$count = $helper->getRows('data.author');
$columns = $helper->get('columns');
?>

<div id="acm-testimonial-<?php echo $module->id; ?>" class="acm-testimonial style-2">
	<div class="container">
		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="testimonial-item-wrap">
					<div class="testimonial-content">
						<div class="owl-carousel owl-theme">
							<?php for ($i = 0; $i < $count; $i++): ?>
								<div class="testimonial-item">

									<div class="testimonial-item-inner">
										<div class="testimonial-top mb-4">
											
											<!-- Description -->
											<?php if ($helper->get('data.desc', $i)): ?>
												<div class="testimonial-desc">
													<?php echo $helper->get('data.desc', $i); ?>
												</div>
											<?php endif; ?>
										</div>

										<div class="testimonial-bottom mt-2 mt-sm-4">
											<div class="d-flex align-items-center">
												<?php if ($helper->get('data.img-author', $i)): ?>
												<div class="testimonial-avatar">
														<img class="testimonial-img" alt="" src="<?php echo $helper->get(
                  'data.img-author',
                  $i
              ); ?>">
												</div>
												<?php endif; ?>

												<div class="testimonial-info">
													<div class="avatar"></div>
													<div class="txt-info">
														<!-- Author -->
														<?php if ($helper->get('data.author', $i)): ?>
															<p class="testimonial-author mt-0 mb-2"><?php echo $helper->get(
                   'data.author',
                   $i
               ); ?> </p>
														<?php endif; ?>

														<div class="testimonial-rating">
															<span class="stars-vote" style="width: <?php echo $helper->get(
                   'data.t-vote',
                   $i
               ); ?>%"></span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endfor; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>

<script>
(function($){
  jQuery(document).ready(function($) {
    var owl = $('#acm-testimonial-<?php echo $module->id; ?> .owl-carousel');
		owl.owlCarousel({
			addClassActive: true,
			margin: 30,
			nav : false,
			loop: true,
			dots: <?php echo $count > 3 ? 'true' : 'false'; ?>,
			autoplay: true,
			autoplaySpeed: 2600,
			autoplayTimeout: 4000,
			smartSpeed: 2800,
			responsive : {
		    0 : {
		        items: 1,
		    },
		    576 : {
		        items: 2,
		    },
		    768 : {
		        items: 2,
		    },
		    992 : {
		        items: <?php echo 12 / $helper->get('columns'); ?>,
		    }
		}
		});
  });
})(jQuery);
</script>