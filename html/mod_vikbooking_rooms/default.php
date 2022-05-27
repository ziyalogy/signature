<?php
/**
 * @package     VikBooking
 * @subpackage  mod_vikbooking_rooms
 * @author      Alessio Gaggii - e4j - Extensionsforjoomla.com
 * @copyright   Copyright (C) 2018 e4j - Extensionsforjoomla.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        https://e4j.com
 */

// no direct access
defined('_JEXEC') or die;

$currencysymb = $params->get('currency');
$widthroom = $params->get('widthroom');
$pagination = $params->get('pagination');
$navigation = $params->get('navigation');
$autoplayparam = $params->get('autoplay');
$autoplaytime = $params->get('autoplaytime');
$totalpeople = $params->get('shownumbpeople');
$showdetails = $params->get('showdetailsbtn');
$roomdesc = $params->get('showroomdesc');
$getdesc = $params->get('mod_desc');
$getshowcarats = $params->get('show_carats');
$loop = $params->get('get_loop');

$get_module_class = $params->get('moduleclass_sfx');

if($navigation == 1) {
	$show_navigation = 'true';
} else {
	$show_navigation = 'false';
}

if($pagination == 1) {
	$show_pagination = 'true';
} else {
	$show_pagination = 'false';
}

if($loop == 1) {
	$loop_status = 'true';
} else {
	$loop_status = 'false';
}

if($autoplayparam == 1) {
	$show_autoplay = 'true';
} else {
	$show_autoplay = 'false';
}

$numb_xrow = $params->get('numb_roomrow');

$document = JFactory::getDocument();
$document->addStyleSheet(JURI::root().'modules/mod_vikbooking_rooms/src/owl.carousel.min.css');
//$document->addStyleSheet(JURI::root().'modules/mod_vikbooking_rooms/src/owl.theme.default.min.css');
$document->addStyleSheet(JURI::root().'modules/mod_vikbooking_rooms/mod_vikbooking_rooms.css');

$randid = isset($module) && is_object($module) && property_exists($module, 'id') ? $module->id : rand(1, 999);

if (intval($params->get('loadjq')) == 1 ) {
	JHtml::_('jquery.framework', true, true);
	JHtml::_('script', JURI::root().'modules/mod_vikbooking_rooms/src/jquery.min.js', false, true, false, false);
}
JHtml::_('script', JURI::root().'modules/mod_vikbooking_rooms/src/owl.carousel.min.js', false, true, false, false);

?>
<div class="vbmodroomscontainer wrap">
	<?php if (!empty($getdesc)) { ?>
		<div class="vbmodroom-desc"><?php echo $getdesc; ?></div>
	<?php } ?>
	<div>
		<div id="vbo-modrooms-<?php echo $randid; ?>" class="owl-carousel owl-theme vbmodrooms">
			<?php
				foreach ($rooms as $c) {
				$carats = VikBooking::getRoomCaratOriz($c['idcarat']);
			?>
			<div class="vbmodrooms-item">
				<div class="vbmodroomsboxdiv">
					<?php
					if (!empty($c['img'])) {
					?>
						<img src="<?php echo JURI::root(); ?>components/com_vikbooking/resources/uploads/<?php echo $c['img']; ?>" class="vbmodroomsimg"/>
					<?php
					}
					?>
					<div class="vbinf">
						<div class="vbmodrooms-divblock">
					        <span class="vbmodroomsname"><?php echo $c['name']; ?></span>
					        <?php
							if ($totalpeople == 1) {
							?>
					        	<span class="vbmodroomsbeds"><?php echo $c['totpeople']; ?> <?php echo JText::_('VBMODROOMSBEDS'); ?></span>	
					        <?php }
							?>	
						</div>
						<?php
						if ($showcatname) {
						?>
							<span class="vbmodroomscat"><?php echo $c['catname']; ?></span>
						<?php
						}
						?>		
						<?php
						if ($roomdesc) {
						?>	
							<span class="vbmodroomsdesc"><?php echo $c['smalldesc']; ?></span>		
						<?php
						}
						?>	
						<?php			
								if($carats) {
									if($getshowcarats == 1) { ?>
									<div class="vbmodrooms-carats">
										<?php echo $carats; ?>
									</div>
								<?php 
									} 
								} ?>							
							<?php
						if ($c['cost'] > 0) {
						?>
							<div class="vbmodroomsroomcost">
								<span class="vbo_currency"><?php echo $currencysymb; ?></span> 
								<span class="vbo_price"><?php echo modvikbooking_roomsHelper::numberFormat($c['cost']); ?></span>
							<?php
							if (array_key_exists('custpricetxt', $c) && !empty($c['custpricetxt'])) {
							?>
								<span class="vbmodroomslabelcost"><?php echo $c['custpricetxt']; ?></span>
							<?php
							}
							?>
							</div>
						<?php
						}
						?>
					</div>
					<?php
					if ($showdetails == 1) {
						?>
					<span class="vbmodroomsview"><a href="<?php echo JRoute::_('index.php?option=com_vikbooking&view=roomdetails&roomid='.$c['id'].'&Itemid='.$params->get('itemid')); ?>"><?php echo JText::_('VBMODROOMSCONTINUE'); ?></a></span>
						<?php
					}
					?>
				</div>	
			</div>
		<?php
		} ?>
		</div>
	</div>
</div>

<script type="text/javascript">
jQuery(document).ready(function(){ 
	jQuery("#vbo-modrooms-<?php echo $randid; ?>").owlCarousel({
		items : <?php echo $numb_xrow; ?>,
		autoplay : <?php echo $show_autoplay; ?>,
		nav : <?php echo $show_navigation; ?>,
		navText : ['<?php echo JText::_('VBMODROOMSPREV'); ?>', '<?php echo JText::_('VBMODROOMSNEXT'); ?>'],
		dots : <?php echo $show_pagination; ?>,
		loop : <?php echo $loop_status; ?>,
		lazyLoad : true,
		responsiveClass: true,
		autoHeight:true,
		margin: 30,
		responsive: {
			0: {
				items: 1,
				nav: true
			},
			<?php if($numb_xrow == 1) { ?>
				600: {
					items:1,
					nav: true
				},
			<?php } else { ?>
				600: {
					items:1,
					nav: true
				},
			<?php } ?>
			<?php if($numb_xrow == 1) { ?>
				820: {
					items: 1,
					nav: true
				},
			<?php } else if($numb_xrow == 2) { ?>
				820: {
					items: 2,
					nav: true
				},
			<?php } else { ?>
				820: {
					items: 2,
					nav: true
				},
			<?php } ?>
			1200: {
				items: <?php echo $numb_xrow; ?>,
				nav: true
			}
		}		
	});

	<?php if($show_navigation == "false") { ?>
		jQuery("#vbo-modrooms-<?php echo $randid; ?> .owl-nav").addClass('owl-disabled');
	<?php } ?>
});
</script>
