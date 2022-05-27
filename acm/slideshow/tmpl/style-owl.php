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

$count = $helper->getRows('data.title');
?>

<div class="acm-slideshow acm-owl">
  <div class="container-hd">
  	<div id="acm-slideshow-<?php echo $module->id; ?>" >
  		<div class="owl-carousel owl-theme">
  				<?php for ($i = 0; $i < $count; $i++):

          $bgSlide = '';

          if ($helper->get('data.image', $i)) {
              $bgSlide =
                  'style="background-image: url(' .
                  $helper->get('data.image', $i) .
                  ');"';
          }
          ?>
  				<div class="item">
            <div class="background" <?php echo $bgSlide; ?>></div>          

            <div class="slider-content">
              <div class="slider-content-inner <?php echo $helper->get(
                  'data.item-effect',
                  $i
              ); ?>">


  				      <?php if ($helper->get('data.title', $i)): ?>
  				        <h1 class="slide-title text-white mt-0 mb-2 mb-lg-4">
  				          <?php if ($helper->get('data.btn-link', $i)): ?>
  					         <a href="<?php echo $helper->get(
                    'data.btn-link',
                    $i
                ); ?>" title="<?php echo $helper->get(
    'data.title',
    $i
); ?>" class="heading-link">
  				          <?php endif; ?>

    					       <?php echo $helper->get('data.title', $i); ?>

          				  <?php if ($helper->get('data.btn-link', $i)): ?>
          					</a>
          				  <?php endif; ?>
        				  </h1>
                <?php endif; ?>
                
                <?php if ($helper->get('data.desc', $i)): ?>
                  <p class="mt-0 mb-1 mb-md-3 description slider-desc"><?php echo $helper->get(
                      'data.desc',
                      $i
                  ); ?></p>
                <?php endif; ?>

                <?php if (
                    $helper->get('data.btn-link', $i) ||
                    $helper->get('data.btn-link-2', $i)
                ): ?>
                <div class="slide-action">
                  <?php if ($helper->get('data.btn-link', $i)): ?>
                    <a href="<?php echo $helper->get(
                        'data.btn-link',
                        $i
                    ); ?>" class="btn btn-<?php echo $helper->get(
    'data.btn-type',
    $i
); ?>">
                      <?php echo $helper->get('data.button', $i); ?>
                    </a>
                  <?php endif; ?>

                  <?php if ($helper->get('data.btn-link-2', $i)): ?>
                    <a href="<?php echo $helper->get(
                        'data.btn-link-2',
                        $i
                    ); ?>" class="btn btn-<?php echo $helper->get(
    'data.btn-type-2',
    $i
); ?>">
                      <?php echo $helper->get('data.button-2', $i); ?>
                    </a>
                  <?php endif; ?>
                </div>
                <?php endif; ?>

              </div>
            </div>
  				</div>
  			 	<?php
      endfor; ?>
  		</div>
  	</div>
  </div>
</div>

<script>
(function($){
  jQuery(document).ready(function($) {
    $("#acm-slideshow-<?php echo $module->id; ?> .owl-carousel").owlCarousel({
      addClassActive: true,
      items: 1,
      singleItem : true,
      itemsScaleUp : true,
      nav : false,
      navText : ["<i class='fas fa-arrow-up'></i>", "<i class='fas fa-arrow-down'></i>"],
      dots: false,
      merge: false,
      mergeFit: true,
      slideBy: 1,
      animateOut: 'fadeOut',
      autoplaySpeed: 1200,
      autoplayTimeout: <?php echo $helper->get('auto-time'); ?>,
      smartSpeed: 1400,
      loop: <?php echo $helper->get('loop'); ?>,
      autoplay: <?php echo $helper->get('autoplay'); ?>
    });
  });
})(jQuery);
</script>