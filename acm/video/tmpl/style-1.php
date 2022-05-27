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
$app = JFactory::getApplication();
$template = $app->getTemplate();
?>

<div id="acm-video-<?php echo $mod; ?>" class="acm-video style-1">
  <div class="container-hd">
    <div class="row no-gutters">
      <div class="col-xl-6">
        <div class="video-description t4-palette-secondary">
          <h2 class="text-white mt-0">
            <?php echo $helper->get('ft-desc'); ?>
          </h2>

          <?php if ($helper->get('ft-link-title')): ?>
          <div class="btn-actions">
            <a target="new"href="<?php echo $helper->get(
                'ft-link'
            ); ?>" class="btn btn-primary"><span class="fa fa-download"></span>
              <?php echo $helper->get('ft-link-title'); ?>
            </a>
          </div>
          <?php endif; ?>
        </div>
      </div>

    	<div class="video-item col-xl-6">
    		<?php if ($helper->get('ft-bg')): ?>
    			<div class="ft-bg" style="background-image: url('<?php echo $helper->get(
           'ft-bg'
       ); ?>');"></div>
    		<?php endif; ?>

    		<?php if ($helper->get('id-video')): ?>
    			<div class="play-icon">
            <a id="myvideo-<?php echo $mod; ?>" class="html5lightbox" data-group="myvideo" href="https://www.youtube.com/watch?v=<?php echo $helper->get(
    'id-video'
); ?>" title="">
              <span class="d-none">play</span>
              <span class="fa fa-play"></span>
            </a>
          </div>
    		<?php endif; ?>
    	</div>
    </div>
  </div>
</div>

<script>
(function($){
	jQuery(document).ready(function($) {
    //Popup video
    $("#acm-video-<?php echo $mod; ?> .html5lightbox").html5lightbox({
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