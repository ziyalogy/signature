<?php
/**
T4 Overide
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
//use Joomla\Component\Content\Administrator\Extension\ContentComponent;
use T4\Helper\J3J4;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = $params->get('access-edit');
$user    = Factory::getUser();
$info    = $params->get('info_block_position', 0);

// Check if associations are implemented. If they are, define the parameter.
$assocParam = (Associations::isEnabled() && $params->get('show_associations'));

// Custom field
$extrafields = new JRegistry($this->item->attribs);
$price = $extrafields->get('price');
$person = $extrafields->get('person');
$day = $extrafields->get('day');

$tourGallery = $extrafields->get('tour-gallery');
$titleGallery = $extrafields->get('gallery-title');
$descGallery = $extrafields->get('gallery-desc');

$tourPlan = $extrafields->get('tour-plan');

$location = $extrafields->get('location');
$mapLat = $extrafields->get('map-lat','');
$mapLon = $extrafields->get('map-lon','');
$mapInfo = $extrafields->get('map-info','');
$mapOption = $extrafields->get('map-option');

$colOwl = $params->get('show_col');
?>
<div id="category-<?php echo $module->id; ?>" class="category-module<?php echo $moduleclass_sfx; ?> mod-grid">
	<div class="container">
		<div class="row equal-height equal-height-child">
			<?php if ($grouped) : ?>
				<?php foreach ($list as $group_name => $group) : ?>
				<li>
					<div class="mod-articles-category-group"><?php echo JText::_($group_name); ?></div>
					<ul>
						<?php foreach ($group as $item) : ?>
							<li>
								<?php if ($params->get('link_titles') == 1) : ?>
									<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
										<?php echo $item->title; ?>
									</a>
								<?php else : ?>
									<?php echo $item->title; ?>
								<?php endif; ?>

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

								<?php if ($item->displayCategoryTitle) : ?>
									<span class="mod-articles-category-category">
										(<?php echo $item->displayCategoryTitle; ?>)
									</span>
								<?php endif; ?>

								<?php if ($item->displayDate) : ?>
									<span class="mod-articles-category-date"><?php echo $item->displayDate; ?></span>
								<?php endif; ?>

								<?php if ($params->get('show_tags', 0) && $item->tags->itemTags) : ?>
									<div class="mod-articles-category-tags">
										<?php echo JLayoutHelper::render('joomla.content.tags', $item->tags->itemTags); ?>
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
													<?php if ($params->get('show_readmore_title', 0) != 0) : ?>
														<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
													<?php endif; ?>
											<?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
												<?php echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
											<?php else : ?>
												<?php echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
												<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
											<?php endif; ?>
										</a>
									</p>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</li>
				<?php endforeach; ?>
			<?php else : ?>
				<?php foreach ($list as $item) : ?>
					<?php 
						$customs 			= LayoutHelper::getCustomFields2($item, 'article');
						$images = json_decode($item->images);
					;?>
					<div class="col col-sm-6 col-md-6 col-lg-4">
						<div class="item-inner">
							<div class="info-top">
								<div class="intro-image">
									<?php if($images->image_intro): ?>
										<?php echo JLayoutHelper::render('joomla.content.intro_image', $item); ?>
									<?php else :?>
										<span>No Image</span>
									<?php endif ;?>

									<?php if(!empty($customs['rent-or-sale'])) :?>
										<span class="tag-label label-<?php echo $customs['rent-or-sale']->value ;?>"><?php echo Jtext::_('TPL_FOR').' '.$customs['rent-or-sale']->value ;?></span>
									<?php endif ;?>

									<span class="featured-label featured-label-<?php if($item->featured): echo 'yes'; else: echo 'no'; endif; ?>">
										<i class="icon ion-ios-heart"></i>
									</span>
								</div>

								<div class="info-detail">
									<?php if ($params->get('link_titles') == 1) : ?>
										<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
									<?php else : ?>
										<?php echo $item->title; ?>
									<?php endif; ?>

									<div class="meta">
										<?php if ($item->displayHits) : ?>
											<span class="mod-articles-category-hits">
												<?php echo $item->displayHits; ?>
											</span>
										<?php endif; ?>

										<?php if ($item->displayCategoryTitle) : ?>
											<span class="mod-articles-category-category">
												<?php echo $item->displayCategoryTitle; ?>
											</span>
										<?php endif; ?>

										<?php if ($item->displayDate) : ?>
											<span class="mod-articles-category-date">
												<?php echo $item->displayDate; ?>
											</span>
										<?php endif; ?>
									</div>

									<?php if(!empty($customs['address'])) :?>
										<div class="ct-field field-address">
											<span class="icon ion-ios-pin"></span>
											<?php echo $customs['address']->value ;?>		
										</div>
									<?php endif ;?>

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

							<div class="ct-field-footer">
								<?php if((!empty($customs['area'])) || !empty($customs['bathrooms']) || !empty($customs['bedrooms'])) :?>
								<div class="ct-field-row">
									<!-- Field Area -->
									<?php if(!empty($customs['area'])) :?>
									<div class="ct-field field-area">
										<div class="ct-field-label">
											<?php echo Jtext::_('TPL_AREA') ;?>
										</div>

										<div class="ct-field-value">
											<?php echo $customs['area']->value.' '.$customs['value-of-area']->value ;?>
										</div>
									</div>
									<?php endif ;?>
									<!-- // Field Area -->

									<!-- Field Bathrooms -->
									<?php if(!empty($customs['bathrooms'])) :?>
									<div class="ct-field field-bathrooms">
										<div class="ct-field-label">
											<?php echo Jtext::_('TPL_BATHROOMS') ;?>
										</div>

										<div class="ct-field-value">
											<?php echo $customs['bathrooms']->value ;?>
										</div>
									</div>
									<?php endif ;?>
									<!-- // Field Bathrooms -->

									<!-- Field Bedrooms -->
									<?php if(!empty($customs['bedrooms'])) :?>
									<div class="ct-field field-bedrooms">
										<div class="ct-field-label">
											<?php echo Jtext::_('TPL_BEDROOMS') ;?>
										</div>

										<div class="ct-field-value">
											<?php echo $customs['bedrooms']->value ;?>
										</div>
									</div>
									<?php endif ;?>
									<!-- // Field Bedrooms -->
								</div>
								<?php endif ;?>

								<div class="ct-field-row">
									<!-- Field Bedrooms -->
									<?php if(!empty($customs['price'])) :?>
									<div class="ct-field field-price">
										<div class="ct-field-value">
											<?php echo $customs['currency']->value.''.$customs['price']->value ;?> / 
										</div>
										<div class="value-type"><?php echo $customs['value-of-price']->value ;?></div>
									</div>
									<?php endif ;?>
									<!-- // Field Bedrooms -->

									<?php if ($params->get('show_author')) : ?>
										<div class="ct-field mod-articles-category-writtenby">
											<?php echo JLayoutHelper::render('joomla.content.info_block.author_property', array('item' => $item, 'params' => $item->params)); ?> 
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>