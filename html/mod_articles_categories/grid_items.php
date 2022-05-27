<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_categories
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$input  = JFactory::getApplication()->input;
$option = $input->getCmd('option');
$view   = $input->getCmd('view');
$id     = $input->getInt('id');
$i 			= 1;

foreach ($list as $item) : ?>
	<?php
		$introImage = json_decode($item->params)->image;
		$bgIntro = '';

		if($introImage) {
			$bgIntro = 'style="background-image: url('.$introImage.')"';
		}
	;?>

	<div class="col-12 col-sm-<?php echo ($i==2) ? '3' : '3' ;?>">
		<div class="item-wrap">
			<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)); ?>" class="bg-intro" <?php echo $bgIntro ;?>></a>
			<div class="item-inner">
				<h3>
					<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)); ?>">
					<?php echo $item->title; ?>
					</a>
				</h3>

				<?php if ($params->get('show_description', 0)) : ?>
					<div class="desc">
						<?php echo JHtml::_('content.prepare', $item->description, $item->getParams(), 'mod_articles_categories.content'); ?>
					</div>
				<?php endif; ?>

				<?php if ($params->get('numitems')) : ?>
				<div class="numitems">
					<span class="far fa-map"></span> <?php echo $item->numitems.' '.Jtext::_('TPL_TOURS'); ?>
				</div>
				<?php endif; ?>
			</div>

			<?php if ($params->get('show_children', 0) && (($params->get('maxlevel', 0) == 0)
				|| ($params->get('maxlevel') >= ($item->level - $startLevel)))
				&& count($item->getChildren())) : ?>
				<div class="alert alert-warning">
					<?php echo Jtext::_('TPL_NO_SUPPORT_SHOW_CHILDREN'); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php $i++; endforeach; ?>
