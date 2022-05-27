<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="mod-tour-list">
	<?php if ($grouped) : ?>
		<div class="alert alert-warning"><?php echo Jtext::_('TPL_NO_SUPPORT'); ?></div>
	<?php else : ?>
		<?php $i=0; foreach ($list as $item) : ?>
			<?php
				// Custom field
				$extrafields = new JRegistry($item->attribs);
				$price = $extrafields->get('price');
				$person = $extrafields->get('person');
				$day = $extrafields->get('day');

				// Intro Image
				$introImage = json_decode($item->images)->image_intro;
				$bgIntro = '';

				if($introImage) {
					$bgIntro = 'style="background-image: url('.$introImage.');"';
				}
			?>

				<div class="item-inner d-flex">
					<?php if($introImage) :?>
						<div class="intro-image">
							<img src="<?php echo $introImage ;?>" alt="<?php echo $item->title; ?>" />
						</div>
					<?php endif ;?>

					<div class="info-article">
						<?php if ($item->displayCategoryTitle) : ?>
							<div class="category-article-dot">
								<?php echo $item->displayCategoryTitle; ?>
							</div>
						<?php endif; ?>

						<div class="mod-articles-title">
							<h4>
								<?php if ($params->get('link_titles') == 1) : ?>
									<a class="heading-link <?php echo $item->active; ?>" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
								<?php else : ?>
									<?php echo $item->title; ?>
								<?php endif; ?>
							</h4>
						</div>

						<?php if($price) :?>
							<!--<div class="text-danger tour-price">
								<?php echo $price ;?>
							</div>
						<?php endif ;?>-->

						<?php if ($item->displayHits || $params->get('show_author') || $item->displayDate || ($params->get('show_tags', 0) && $item->tags->itemTags) ) : ?>
						<div class="tour-other-info mb-2">
							<?php if ($item->displayHits) : ?>
								<span class="mod-articles-category-hits">
									(<?php echo $item->displayHits; ?>)
								</span>
							<?php endif; ?>

							<?php if ($params->get('show_author')) : ?>
								<span class="mod-articles-category-writtenby">
									<?php echo $item->displayAuthorName; ?>
								</span>
							<?php endif; ?>


							<?php if ($item->displayDate) : ?>
								<span class="mod-articles-category-date">
									<?php echo $item->displayDate; ?>
								</span>
							<?php endif; ?>

							<?php if ($params->get('show_tags', 0) && $item->tags->itemTags) : ?>
								<div class="mod-articles-category-tags">
									<?php echo JLayoutHelper::render('joomla.content.tags', $item->tags->itemTags); ?>
								</div>
							<?php endif; ?>
						</div>
						<?php endif; ?>

						<?php if ($params->get('show_introtext')) : ?>
							<p class="mod-articles-category-introtext">
								<?php echo $item->displayIntrotext; ?>
							</p>
						<?php endif; ?>

						<?php if ($params->get('show_readmore')) : ?>
						<p class="mod-articles-category-readmore">
							<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
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


