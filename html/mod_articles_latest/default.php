<?php
/**
 * ------------------------------------------------------------------------
 * ja_justitia_tpl
 * ------------------------------------------------------------------------
 * Copyright (C) 2004-2011 Buildal Systems (U) Co., Ltd. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * Author: Buildal Systems (U) Co., Ltd
 * Websites:  http://www.buildal.ug -  http://www.buildal.ug
 * This file may not be redistributed in whole or significant part.
 * ------------------------------------------------------------------------
 */

defined('_JEXEC') or die(); ?>
<ul class="latestnews<?php echo $params->get('moduleclass_sfx'); ?>">
<?php foreach ($list as $item): ?>
	<li class="clearfix" >
		<div class="pic-article">
			<?php if (json_decode($item->images)->image_intro): ?>
				<img src="<?php echo json_decode($item->images)->image_intro; ?>" alt="" />
			<?php endif; ?>
		</div>

		<div class="info-article">
			<div class="category-name">
				<a href="<?php echo JRoute::_(
        ContentHelperRoute::getCategoryRoute($item->catid)
    ); ?>" ><?php echo $item->category_title; ?></a>
			</div>
			<div class="title-article">
				<h6>
					<a href="<?php echo $item->link; ?>" itemprop="url">
						<span itemprop="name">
							<?php echo $item->title; ?>
						</span>
					</a>
				</h6>
			</div>
		</div>
		
	</li>
<?php endforeach; ?>
</ul>
