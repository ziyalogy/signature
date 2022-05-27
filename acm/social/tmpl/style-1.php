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
$count = $helper->getRows('link');
?>

<div class="social-follow-wrap">
  <div class="social-follow d-flex">
  	<?php for ($i = 0; $i < $count; $i++): ?>
    	<div class="social-inner mr-2">
    		<a href="<?php echo $helper->get(
          'link',
          $i
      ); ?>" title="<?php echo $helper->get('title', $i); ?>">
          <span class="<?php echo $helper->get('font-icon', $i); ?>"></span>
    			<span class="d-none"><?php echo $helper->get('title', $i); ?></span>
    		</a>
    	</div>
    <?php endfor; ?>
  </div>
</div>
