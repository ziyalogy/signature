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
$column = 1;
?>

<div id="acm-testimonial-<?php echo $module->id; ?>" class="acm-testimonial style-1">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 mb-5 mb-lg-0">
				<div class="mod-title h2 color-palette">
					<?php echo $moduleTitle; ?>
				</div>

				<?php if ($count > 2): ?>
					<div class="owl-control">
						<button type="button" id="owl-prew">
							<span  class="fas fa-arrow-left"></span>
						</button>

						<button type="button" id="owl-next">
							<span class="fas fa-arrow-right"></span>
						</button>
					</div>
				<?php endif; ?>
			</div>

			<div class="col-lg-8">
				<div class="testimonial-item-wrap">
					<div class="testimonial-content">
						<div class="owl-carousel owl-theme">
							<?php for ($i = 0; $i < $count; $i++): ?>
								<div class="testimonial-item">
									<div class="quote-mask">
										<svg width="50" height="40" viewBox="0 0 50 40" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M21.875 2.10182C22.4503 2.10182 22.9167 1.63129 22.9167 1.05091C22.9167 0.47053 22.4503 0 21.875 0C9.79955 0.0138913 0.0138171 9.88615 4.75698e-05 22.0684V28.3737C-0.0180188 34.7764 5.11225 39.9817 11.4588 40C17.8055 40.0182 22.9652 34.8425 22.9832 28.4399C23.0013 22.0371 17.871 16.8318 11.5245 16.8136C7.77699 16.8028 4.25961 18.6361 2.10005 21.7258C2.29292 10.8426 11.0853 2.11729 21.875 2.10182Z" fill="#4359BA"/>
											<path d="M38.5415 16.814C34.8156 16.817 31.3243 18.6495 29.1833 21.7258C29.3762 10.8425 38.1686 2.11719 48.9582 2.10182C49.5335 2.10182 49.9999 1.63129 49.9999 1.05091C49.9999 0.47053 49.5335 0 48.9582 0C36.8828 0.0138913 27.097 9.88615 27.0833 22.0684V28.3737C27.0833 34.7578 32.2133 39.9333 38.5415 39.9333C44.8698 39.9333 49.9998 34.7578 49.9998 28.3737C49.9998 21.9895 44.8699 16.814 38.5415 16.814Z" fill="#4359BA"/>
										</svg>

									</div>

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
			items: <?php echo $count > 2 ? '2' : '1'; ?>,
			addClassActive: true,
			itemsScaleUp : true,
			margin: 30,
			nav : false,
			loop: <?php echo $count > 2 ? 'true' : 'false'; ?>,
			dots: <?php echo $count > 2 ? 'true' : 'false'; ?>,
			autoPlay: false,
			responsive : {
		    0 : {
	        items: 1,
		    },
		    992 : {
	        items: 2,
		    }
			}
		});

		<?php if ($count > 2): ?>
			$('#owl-next').click(function() {
			    owl.trigger('next.owl.carousel');
			})
			// Go to the previous item
			$('#owl-prew').click(function() {
			    owl.trigger('prev.owl.carousel');
			})
		<?php endif; ?>
  });
})(jQuery);
</script>