<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
	$modShow = $params->get('show-link');
	$modCat = $params->get('title-category');
	$modMenu = $params->get('link-category');
?>
<div class="mod-tour-grid">
	<div class="row">
		<?php if ($grouped) : ?>
			<?php foreach ($list as $group_name => $group) : ?>
			<div class="alert alrt-warning"><?php echo Jtext::_('TPL_NO_SUPPORT'); ?></div>
			<?php endforeach; ?>
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

				<?php if($i==0) :?>
					<div class="col-lg-12">
						<div class="item-inner item-lead">
							<div class="row no-gutters">
								<div class="col-lg-6 bg-lead" <?php echo $bgIntro ;?>></div>

								<div class="col-lg-6">
									<div class="info-article">
										<?php if ($item->displayCategoryTitle) : ?>
											<div class="category-article-dot">
												<?php echo $item->displayCategoryTitle; ?>
											</div>
										<?php endif; ?>

										<div class="mod-articles-title">
											<h3>
												<?php if ($params->get('link_titles') == 1) : ?>
													<a class="heading-link <?php echo $item->active; ?>" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
												<?php else : ?>
													<?php echo $item->title; ?>
												<?php endif; ?>
											</h3>
										</div>

										<?php if($price) :?>
											<div class="text-danger tour-price">
												<?php echo $price ;?>
											</div>
										<?php endif ;?>

										<?php if($person || $day) :?>
										<div class="tour-info">

											<?php if($person) :?>
											<span class="tour-person">
												<span class="fas fa-users"></span>
												<?php echo $person.' '.Jtext::_('TPL_PERSON') ;?>
											</span>
											<?php endif ;?>

											<?php if($day) :?>
											<span class="tour-days">
												<span class="far fa-clock"></span>
												<?php echo $day.' '.Jtext::_('TPL_DAY') ;?>
											</span>
											<?php endif ;?>
										</div>
										<?php endif ;?>

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
											<a class="btn btn-secondary mt-3" href="<?php echo $item->link; ?>">
												<?php echo Jtext::_('TPL_BOOK_NOW') ;?>
											</a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php else : ?>
					<div class="col-lg-4">
						<div class="item-inner item-child">
							<div class="info-article-wrap" <?php echo $bgIntro ;?>>
								<div class="info-article">
									<?php if ($item->displayCategoryTitle) : ?>
										<div class="category-article-dot">
											<?php echo $item->displayCategoryTitle; ?>
										</div>
									<?php endif; ?>

									<div class="mod-articles-title">
										<h3 class="text-white">
											<?php if ($params->get('link_titles') == 1) : ?>
												<a class="heading-link <?php echo $item->active; ?>" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
											<?php else : ?>
												<?php echo $item->title; ?>
											<?php endif; ?>
										</h3>
									</div>

									<?php if($price) :?>
										<div class="text-danger tour-price">
											<?php echo $price ;?>
										</div>
									<?php endif ;?>

									<?php if($person || $day) :?>
									<div class="tour-info">

										<?php if($person) :?>
										<span class="tour-person">
											<span class="fas fa-users"></span>
											<?php echo $person.' '.Jtext::_('TPL_PERSON') ;?>
										</span>
										<?php endif ;?>

										<?php if($day) :?>
										<span class="tour-days">
											<span class="far fa-clock"></span>
											<?php echo $day.' '.Jtext::_('TPL_DAY') ;?>
										</span>
										<?php endif ;?>
									</div>
									<?php endif ;?>
								</div>
							</div>
						</div>
					</div>
				<?php endif ;?>
			<?php $i++; endforeach; ?>
		<?php endif; ?>
	</div>

	<?php if($modShow) :?>
		<div class="view-all text-center">
			<a class="btn btn-light" href="<?php  echo JRoute::_("index.php?Itemid={$modMenu}"); ?>" title="<?php echo $modCat ;?>">
				<?php echo $modCat ;?>
			</a>
		</div>
	<?php endif ;?>
</div>


