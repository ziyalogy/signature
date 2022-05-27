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
$count = $helper->getRows('info-title');
$column = $helper->get('columns');
?>

<div class="acm-features style-1">
	<div class="features-intro">
		<div class="row large-gutters">
			<?php if ($helper->get('intro-img')): ?>
			<div class="col-lg-7 mb-3 mb-lg-0">
				<img src="<?php echo $helper->get('intro-img'); ?>" alt="" />
			</div>
			<?php endif; ?>

			<?php if ($helper->get('description')): ?>
			<div class="col-lg-5 mt-xl-4">
				<?php echo $helper->get('description'); ?>
			</div>
			<?php endif; ?>
		</div>
	</div>

	<?php if ($count): ?>
		<div class="features-details">
			<?php for ($i = 0; $i < $count; $i++): ?>
				<?php if ($i % $column == 0) {
        echo '<div class="row">';
    } ?>
					<div class="col-12 col-sm-6 col-xl-<?php echo 12 / $column; ?>">
						<div class="features-detail d-flex content-mask-primary">

							<?php if ($helper->get('info-img', $i)): ?>
							<div class="info-img">
								<img src="<?php echo $helper->get('info-img', $i); ?>" alt="" />
							</div>
							<?php endif; ?>

							<div class="info-text">
								<?php if ($helper->get('info-title', $i)): ?>
								<h4 class="h2 color-palette m-0">
									<?php echo $helper->get('info-title', $i); ?>
								</h4>
								<?php endif; ?>

								<?php if ($helper->get('info-text', $i)): ?>
								<p class="m-0">
									<?php echo $helper->get('info-text', $i); ?>
								</p>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php if ($i % $column == $column - 1 || $i == $count - 1) {
        echo '</div>';
    } ?>
			<?php endfor; ?>
		</div>
	<?php endif; ?>
</div>
