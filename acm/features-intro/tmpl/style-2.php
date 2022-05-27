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
$count = $helper->getRows('title');
$columns = $helper->get('columns');
?>

<div class="acm-features style-2">
	<div class="container">
		<div class="features-wrap">
			<?php for ($i = 0; $i < $count; $i++): ?>
				<?php if ($i % $columns == 0) {
        echo '<div class="row">';
    } ?>
				<div class="col-sm-12 col-md-6 col-lg-<?php echo 12 / $columns; ?>">
					<div class="features-item">
						<?php if ($helper->get('font-icon', $i)): ?>
							<div class="font-icon text-primary h2">
								<span class="<?php echo $helper->get('font-icon', $i); ?>"></span>
							</div>
						<?php endif; ?>

						<?php if ($helper->get('img-icon', $i) && !$helper->get('font-icon', $i)): ?>
							<div class="img-icon mask-icon">
								<img src="<?php echo $helper->get('img-icon', $i); ?>" alt="" />
							</div>
						<?php endif; ?>
						
						<div class="features-content">
							<?php if ($helper->get('title', $i)): ?>
								<h3>
									<?php if ($helper->get('link', $i)): ?>
										<a class="heading-link" href="<?php echo $helper->get('link', $i); ?>">
									<?php endif; ?>

									<?php echo $helper->get('title', $i); ?>

									<?php if ($helper->get('link', $i)): ?>
										</a>
									<?php endif; ?>
								</h3>
							<?php endif; ?>
							
							<?php if ($helper->get('description', $i)): ?>
								<span><?php echo $helper->get('description', $i); ?></span>
							<?php endif; ?>
						</div>

						<?php if ($i % $columns == $columns - 1 || $i == $count - 1) {
          echo '</div>';
      } ?>
					</div>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</div>