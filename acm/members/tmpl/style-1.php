<?php
/**
 * ------------------------------------------------------------------------
 * JA Tour Template
 * ------------------------------------------------------------------------
 * Copyright (C) 2004-2018 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * Author: J.O.O.M Solutions Co., Ltd
 * Websites:  http://www.joomlart.com -  http://www.joomlancers.com
 * This file may not be redistributed in whole or significant part.
 * ------------------------------------------------------------------------
 */

defined('_JEXEC') or die;
	$column 		= $helper->get('number-column');
	$count 			= $helper->getRows('data.img');

	$image 			= $helper->get('img');
	$nameMember 	= $helper->get('name-member');
	$nameOffice 	= $helper->get('name-office');
	$profile_link 	= $helper->get('profile_link');
	$profile_article 	= $helper->get('profile_article');

?>

<div class="acm-members style-1">
	<?php for ( $i = 0; $i < $count; $i++ ) : ?>

		<?php  if ( $i % $column == 0) echo '<div class="row">'; ?>
			<div class="item col-xs-12 col-sm-6 col-lg-<?php echo 12/$column; ?>">
				<div class="single-member overlay">
					<div class="picture" style="background-image:<?php echo $helper->get('data.img', $i); ?>;">
						<img class="img-responsive" src="<?php echo $helper->get('data.img', $i); ?>" alt="" />
					</div>
					<a href="<?php echo $helper->get('profile_link', $i); ?>"><div class="sraff-inner">
						<div class="member-title">
							<?php if($helper->get('name-member', $i)): ?>
								<h3><?php echo $helper->get('name-member', $i); ?></h3>
							<?php endif; ?>

							<?php if($helper->get('name-office', $i)): ?>
								<h6><?php echo $helper->get('name-office', $i); ?></h6>
							<?php endif; ?>
						</div>

						<?php if($helper->get('link-social', $i)): ?>
							<div class="scoial_icons">
				       			<?php echo $helper->get('link-social', $i); ?>
							</div>
				        <?php endif;?>
					</div></a>
		        </div>
			</div>
		<?php if ( ($i%$column==($column-1)) || $i==($count-1) )  echo '</div>'; ?>

	<?php endfor; ?>
</div>