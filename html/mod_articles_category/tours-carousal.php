<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$colOwl = 3;

$catids = $params->get('catid');
if(isset($catids) && $catids['0'] != ''){
	$catid = $catids[0];	
	$jacategoriesModel = JCategories::getInstance('content');
	$jacategory = $jacategoriesModel->get($catid);
}
?>
<div id="category-<?php echo $module->id; ?>" class="category-module<?php echo $moduleclass_sfx; ?> mod-owl mod-owl2">
	<div class="owl-carousel owl-theme">
		<?php if ($grouped) : ?>
			<?php echo JText::_('TPL_NOT_SUPPORT_GROUP'); ?>
		<?php else : ?>
			<?php $i = 0; foreach ($list as $item) : ?>
				<?php 
					$images = json_decode($item->images);
				?>
				<div class="item-inner">
					<div class="intro-image">
						<?php if($images->image_intro): ?>
							<?php echo JLayoutHelper::render('joomla.content.intro_image', $item); ?>
						<?php else :?>
							<span><img src="../../images/no-image.jpg"></span>
						<?php endif ;?>
					</div>
					<div class="info-detail">
						<?php if ($item->displayCategoryTitle) : ?>
							<span class="mod-articles-category-category">
								<?php echo $item->displayCategoryTitle; ?>
							</span>
						<?php endif; ?>
							
						<?php if ($params->get('link_titles') == 1) : ?>
							<h2 class="mod-articles-category-title">
								<a class="<?php echo $item->active; ?>" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
							</h2>
						<?php else : ?>
							<h2>
								<?php echo $item->title; ?>
							</h2>
						<?php endif; ?>

						<div class="meta">
							<?php if ($item->displayHits) : ?>
								<span class="mod-articles-category-hits">
									<?php echo $item->displayHits; ?>
								</span>

								<?php if ($params->get('show_author')) : ?>
									<span class="mod-articles-category-writtenby">
										<?php echo JLayoutHelper::render('joomla.content.info_block.author_property', array('item' => $item, 'params' => $item->params)); ?> 
									</span>
								<?php endif; ?>
							<?php endif; ?>

							<?php if ($item->displayDate) : ?>
								<span class="mod-articles-category-date">
									<i class="fa fa-calendar" aria-hidden="true"></i><?php echo $item->displayDate; ?>
								</span>
							<?php endif; ?>
						</div>

						<?php if ($params->get('show_introtext')) : ?>
							<p class="mod-articles-category-introtext">
								<?php echo $item->displayIntrotext; ?>
							</p>
						<?php endif; ?>

						<?php if ($params->get('show_tags', 0) && $item->tags->itemTags) : ?>
							<div class="mod-articles-category-tags">
								<?php echo JLayoutHelper::render('joomla.content.tags', $item->tags->itemTags); ?>
							</div>
						<?php endif; ?>

						<?php if ($params->get('show_readmore')) : ?>
							<p class="mod-articles-category-readmore">
								<a class="<?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
									<?php if ($item->params->get('access-view') == false) : ?>
										<?php echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
									<?php elseif ($readmore = $item->alternative_readmore) : ?>
										<?php echo $readmore; ?>
										<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
									<?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
										<?php echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
									<?php else : ?>
										<?php echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
										<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
									<?php endif; ?>
								</a>
							</p>
						<?php endif; ?>
					</div>
				</div>
			<?php $i++; endforeach; ?>
		<?php endif; ?>
	</div>

	<?php 
	//Get category info
	if(isset($jacategory)) : ?>
	<!--<div class="text-center">
		<a class="btn btn-primary category-link" href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($jacategory->id));?>">
			<?php echo JText::_('TPL_VIEW_MORE'); ?>
		</a>
	</div>-->
	<?php endif;
	//End add
	?>
</div>

<script>
(function($){
  jQuery(document).ready(function($) {
    $("html[dir='ltr'] #category-<?php echo $module->id; ?> .owl-carousel").owlCarousel({
    	addClassActive: true,
      items: <?php echo $colOwl; ?>,
      margin: 30,
    	responsiveClass:true,
      responsive:{
        0:{
            items:1
        },
        480: {
        	items: 1
        },
        979:{
            items:3
        },
        1199:{
            items:4
        }
    	},
      loop: true,
      nav : true,
      navText: ['<i class="fa fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
      dots: false,
      autoplay: true
    });

    $("html[dir='rtl'] #category-<?php echo $module->id; ?> .owl-carousel").owlCarousel({
    	addClassActive: true,
      items: <?php echo $colOwl; ?>,
      margin: 30,
    	responsiveClass:true,
      responsive:{
        0:{
            items:1
        },
        480: {
        	items: 2
        },
        979:{
            items:4
        },
        1199:{
            items:4
        }
    	},
      loop: true,
      nav : true,
      navText: ['<i class="fa fa fa-chevron-right"></i>','<i class="fa fa-chevron-left"></i>'],
      dots: true,
      autoplay: true,
      rtl: true
    });
  });
})(jQuery);
</script>