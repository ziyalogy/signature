<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_categories
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="categories-module<?php echo $moduleclass_sfx; ?> mod-grid row">
<?php require JModuleHelper::getLayoutPath('mod_articles_categories', $params->get('layout', 'grid') . '_items'); ?>
</div>
