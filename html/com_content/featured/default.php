<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// If the page class is defined, add to class as suffix.
// It will be a separate class if the user starts it with a space
?>
<div class="blog-featured" itemscope itemtype="https://schema.org/Blog">
	<?php if ($this->params->get('show_page_heading') != 0) : ?>
	<div class="page-header">
		<h1>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
		</h1>
	</div>
	<?php endif; ?>
	<?php if ($this->params->get('page_subheading')) : ?>
		<h2>
			<?php echo $this->escape($this->params->get('page_subheading')); ?>
		</h2>
	<?php endif; ?>

	<?php $leadingcount = 0; ?>
	<?php if (!empty($this->lead_items)) : ?>
		<div class="blog-items items-leading <?php echo $this->params->get('blog_class_leading'); ?>">
			<?php foreach ($this->lead_items as &$item) : ?>
				<div class="blog-item"
					itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
					<div class="blog-item-content"><!-- Double divs required for IE11 grid fallback -->
						<?php
						$this->item = & $item;
						echo $this->loadTemplate('item');
						?>
					</div>
				</div>
				<?php $leadingcount++; ?>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	<?php
		$introcount = count($this->intro_items);
		$counter = 0;
	?>
	<?php if (!empty($this->intro_items)) : ?>
		<?php foreach ($this->intro_items as $key => &$item) : ?>

			<?php
			$key = ($key - $leadingcount) + 1;
			$rowcount = (((int) $key - 1) % (int) $this->columns) + 1;
			$row = $counter / $this->columns;

			if ($rowcount === 1) : ?>

			<div class="items-row cols-<?php echo (int) $this->columns; ?> <?php echo 'row-' . $row; ?> row">
			<?php endif; ?>
			<div class="col col-md-<?php echo 12/ $this->columns; ?> col-sm-12">
				<div class="item column-<?php echo $rowcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?>"
					itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
				<?php
						$this->item = &$item;
						echo $this->loadTemplate('item');
				?>
				</div>
				<?php $counter++; ?>
			</div>
				<?php if (($rowcount == $this->columns) or ($counter == $introcount)) : ?>

			</div>
			<?php endif; ?>

		<?php endforeach; ?>
	<?php endif; ?>

	<?php if (!empty($this->link_items)) : ?>
		<div class="items-more">
		<h3><?php echo JText::_('TPL_CONTENT_MORE_ARTICLES'); ?></h3>
		<?php echo $this->loadTemplate('links'); ?>
		</div>
	<?php endif; ?>

	<?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->pagesTotal > 1)) : ?>
		<div class="w-100 block-pagination">
			<?php if ($this->params->def('show_pagination_results', 1)) : ?>
				<p class="counter float-right pt-3 pr-2">
					<?php echo $this->pagination->getPagesCounter(); ?>
				</p>
			<?php endif; ?>
			<?php echo $this->pagination->getPagesLinks(); ?>
		</div>
	<?php endif; ?>

</div>
