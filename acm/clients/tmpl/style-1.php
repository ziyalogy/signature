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

$columns = $helper->get('columns');
$count = $helper->getRows('client-item.client-logo');

$float = 0;

if (100 % $columns) {
    $float = 0.01;
}
?>

<div id="acm-clients-<?php echo $module->id; ?>" class="acm-clients style-1 <?php if (
    $count > $columns
): ?> multi-row <?php endif; ?>">
	 <?php for ($i = 0; $i < $count; $i++):

      $clientName = $helper->get('client-item.client-name', $i);
      $clientLink = $helper->get('client-item.client-link', $i);
      $clientLogo = $helper->get('client-item.client-logo', $i);

      if ($i % $columns == 0) {
          echo '<div class="row">';
      }
      ?>
	
		<div class="col-xs-12 client-item" style="width:<?php echo number_format(
      100 / $columns,
      2,
      '.',
      ' '
  ) - $float; ?>%;">
			<div class="client-img">
				<?php if (
        $clientLink
    ): ?><a target="new" href="<?php echo $clientLink; ?>" title="<?php echo $clientName; ?>"><?php endif; ?>
					<img class="img-responsive" alt="<?php echo $clientName; ?>" src="<?php echo $clientLogo; ?>">
				<?php if ($clientLink): ?></a><?php endif; ?>
			</div>
		</div> 
		
	 	<?php if ($i % $columns == $columns - 1 || $i == $count - 1) {
       echo '</div>';
   } ?>
	 	
 	<?php
  endfor; ?>
</div>