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

?>
<div class="tourdets">
	<div class = "container">
<div class="tour-nav-tabs">
		<ul class="nav nav-tabs" id="tour" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">
		    	<span class="fas fa-info-circle"></span>
		    	<?php echo Jtext::_('TPL_INFOMATION') ;?>
		    </a>
		  </li>

		  <?php if(!empty($tourPlan)) :?>
		  <li class="nav-item">
		    <a class="nav-link" id="plan-tab" data-toggle="tab" href="#plan" role="tab" aria-controls="plan" aria-selected="true">
		    	<span class="far fa-calendar"></span>
		    	<?php echo Jtext::_('TPL_TOUR_PLAN') ;?>
		    </a>
		  </li>
		  <?php endif ;?>



		  <?php if($mapOption) :?>
		  <li class="nav-item">
		    <a class="nav-link" id="map-tab" data-toggle="tab" href="#map" role="tab" aria-controls="map" aria-selected="true">
		    	<span class="fas fa-map-marked-alt"></span>
		    	<?php echo Jtext::_('TPL_TOUR_MAP') ;?>
		    </a>
		  </li>
		  <?php endif; ?>

		  <?php //if($accomod-ationList) :?>
		  <li class="nav-item">
		    <a class="nav-link" id="package-tab" data-toggle="tab" href="#package" role="tab" aria-controls="package" aria-selected="true">
		    	<span class="fas fa-hotel"></span>
		    	Tours
		    </a>
		  </li>
		  <?php //endif; ?>
		  
		  		  <?php if(!empty($tourGallery)) :?>
		  <li class="nav-item">
		    <a class="nav-link" id="gallery-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="gallery" aria-selected="true">
		    	<span class="far fa-images"></span>
		    	<?php echo Jtext::_('TPL_TOUR_GALLERY') ;?>
		    </a>
		  </li>
		  <?php endif ;?>


		</ul>
	</div>
	</div>
</div>
<div class = "container">
<div class="row">

<div class="col-sm-4">
	

<div class="tour-top-info clearfix">
		<div class="pull-left">
			<?php if($params->get('show_category')) :?>
				<div class="category-article-dot">
		    	<?php echo LayoutHelper::render('joomla.content.info_block.category', array('item' => $this->item, 'params' => $params)); ?>
		    </div>
		  <?php endif;?>

			<?php if ($params->get('show_title') || $params->get('show_author')) : ?>
			<!--<div class="page-header">
				<?php if ($params->get('show_title')) : ?>
					<h2 itemprop="headline">
						<?php echo $this->escape($this->item->title); ?>
					</h2>
				<?php endif; ?>

				<?php if (J3J4::checkUnpublishedContent($this->item)) : ?>
					<span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
				<?php endif; ?>

				<?php if (strtotime($this->item->publish_up) > strtotime(Factory::getDate())) : ?>
					<span class="badge badge-warning"><?php echo Text::_('JNOTPUBLISHEDYET'); ?></span>
				<?php endif; ?>

				<?php if ((strtotime($this->item->publish_down) < strtotime(Factory::getDate())) && $this->item->publish_down != Factory::getDbo()->getNullDate()) : ?>
					<span class="badge badge-warning"><?php echo Text::_('JEXPIRED'); ?></span>
				<?php endif; ?>

			</div>-->
			<?php endif; ?>

			
		</div>

		<div class="pull-right">
				


			<?php if (!$this->print) : ?>
				<?php if ($canEdit || $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
					<?php echo LayoutHelper::render('joomla.content.icons', array('params' => $params, 'item' => $this->item, 'print' => false)); ?>
				<?php endif; ?>
			<?php else : ?>
				<?php if ($useDefList) : ?>
					<div id="pop-print" class="btn hidden-print">
						<?php echo HTMLHelper::_('icon.print_screen', $this->item, $params); ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>


	</div>

               <div class="booking">
			   <div class="tourpic">
	<?php echo LayoutHelper::render('joomla.content.full_image', $this->item); ?>
		  </div>
                  <?php echo JHtml::_('content.prepare', '{loadposition tours_here}'); ?>
               </div>
	  </div>
<div class="com-content-article item-page<?php echo $this->pageclass_sfx; ?> view-tour-detail col-sm-8">

	<meta itemprop="inLanguage" content="<?php echo ($this->item->language === '*') ? Factory::getApplication()->get('language') : $this->item->language; ?>">

	<?php if ($this->params->get('show_page_heading')) : ?>
	<!--<div class="page-header">
		<h1> <?php // echo $this->escape($this->params->get('page_heading')); ?> </h1>
	</div>-->
	<?php endif; ?>

	<?php if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && $this->item->paginationrelative) {
		echo $this->item->pagination;
	}	?>

	<?php // Todo Not that elegant would be nice to group the params ?>
	<?php $useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date')
	|| $params->get('show_hits') || $params->get('show_parent_category') || $params->get('show_author') || $assocParam); ?>

	<?php if (!$useDefList && $this->print) : ?>
		<div id="pop-print" class="btn hidden-print clearfix">
			<?php echo HTMLHelper::_('icon.print_screen', $this->item, $params); ?>
		</div>
	<?php endif; ?>

	

	

	

	<div class="tab-content" id="tourContent">
	  <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
	  <?php if($person || $day) :?>
			<div class="page-tour-info">

				<?php if($person) :?>
				<span class="tour-person">
					<span class="fas fa-users"></span>
					<h4><?php echo $person.' '.Jtext::_('TPL_PERSON') ;?></h4>
				</span>
				<?php endif ;?>

				<?php if($day) :?>
				<span class="tour-days">
					<span class="far fa-calendar"></span>
					<h4><?php echo $day.' '.Jtext::_('TPL_DAY') ;?></h4>
				</span>
				<?php endif ;?>

				<?php if($price) :?>
				<span class="tour-price">
					<span class="far fa-dollar-sign"></span>
					<h4><?php echo $price ;?></h4>
				</span>
			<?php endif ;?>
			</div>
			<?php endif ;?>
	  		<?php if ($params->get('access-view')) : ?>
					<?php //echo LayoutHelper::render('joomla.content.full_image', $this->item); ?>
				<?php endif ;?>

				<?php if ($info == 0 && $params->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
					<?php $this->item->tagLayout = new FileLayout('joomla.content.tags'); ?>
					<?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
				<?php endif; ?>

				<?php // Content is generated by content plugin event "onContentBeforeDisplay" ?>
				<?php echo $this->item->event->beforeDisplayContent; ?>

				<?php if (isset($urls) && ((!empty($urls->urls_position) && ($urls->urls_position == '0')) || ($params->get('urls_position') == '0' && empty($urls->urls_position)))
					|| (empty($urls->urls_position) && (!$params->get('urls_position')))) : ?>
					<?php echo $this->loadTemplate('links'); ?>
				<?php endif; ?>

				<?php if ($params->get('access-view')) : ?>
					<?php if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && !$this->item->paginationrelative) :
						echo $this->item->pagination;
					endif; ?>

				<?php if (isset ($this->item->toc)) : echo $this->item->toc; endif; ?>

				<div itemprop="articleBody" class="com-content-article__body">
					<?php echo $this->item->text; ?>
				</div>

				<?php if ($info == 1 || $info == 2) : ?>
					<?php if ($useDefList) : ?>
						<?php echo LayoutHelper::render('joomla.content.info_block', array('item' => $this->item, 'params' => $params, 'position' => 'below')); ?>
					<?php endif; ?>

					<?php if ($params->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
						<?php $this->item->tagLayout = new FileLayout('joomla.content.tags'); ?>
						<?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
					<?php endif; ?>
				<?php endif; ?>

				<?php
					if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && !$this->item->paginationrelative) :
						echo $this->item->pagination;
					endif;
				?>

				<?php if (isset($urls) && ((!empty($urls->urls_position) && ($urls->urls_position == '1')) || ($params->get('urls_position') == '1'))) : ?>
					<?php echo $this->loadTemplate('links'); ?>
				<?php endif; ?>

				<?php // Optional teaser intro text for guests ?>
				<?php elseif ($params->get('show_noauth') == true && $user->get('guest')) : ?>
					<?php echo LayoutHelper::render('joomla.content.intro_image', $this->item); ?>
					<?php echo HTMLHelper::_('content.prepare', $this->item->introtext); ?>
					<?php // Optional link to let them register to see the whole article. ?>
				
					<?php if ($params->get('show_readmore') && $this->item->fulltext != null) : ?>
					<?php $menu = Factory::getApplication()->getMenu(); ?>
					<?php $active = $menu->getActive(); ?>
					<?php $itemId = $active->id; ?>
					<?php $link = new Uri(Route::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false)); ?>
					<?php $link->setVar('return', base64_encode(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language))); ?>

					<p class="com-content-article__readmore readmore">
						<a href="<?php echo $link; ?>" class="register">
						<?php $attribs = json_decode($this->item->attribs); ?>
						<?php
						if ($attribs->alternative_readmore == null) :
							echo Text::_('COM_CONTENT_REGISTER_TO_READ_MORE');
						elseif ($readmore = $attribs->alternative_readmore) :
							echo $readmore;
							if ($params->get('show_readmore_title', 0) != 0) :
								echo HTMLHelper::_('string.truncate', $this->item->title, $params->get('readmore_limit'));
							endif;
						elseif ($params->get('show_readmore_title', 0) == 0) :
							echo Text::sprintf('COM_CONTENT_READ_MORE_TITLE');
						else :
							echo Text::_('COM_CONTENT_READ_MORE');
							echo HTMLHelper::_('string.truncate', $this->item->title, $params->get('readmore_limit'));
						endif; ?>
						</a>
					</p>
					<?php endif; ?>
				<?php endif; ?>

				<?php
					if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && $this->item->paginationrelative) :
						echo $this->item->pagination;
					endif;
				?>

				<?php // Content is generated by content plugin event "onContentAfterDisplay" ?>
				<?php echo $this->item->event->afterDisplayContent; ?>
	  </div>

  	<?php if(!empty($tourPlan)) :?>
	  <div class="tab-pane fade" id="plan" role="tabpanel" aria-labelledby="plan-tab">
			<div class="plan-info">
				<div id="accordion" class="plan-list">
					<?php $i=0; foreach ($tourPlan as $key=>$value) : $i++; ?>
						<div class="plan-item">
							<div class="plan-title h4 <?php if($i!=1) echo 'collapsed' ;?>" data-toggle="collapse" data-target="#collapse-<?php echo $i ;?>" aria-expanded="true" aria-controls="collapse-<?php echo $i ;?>">
									<span class="fas fa-circle"></span>
									<?php echo $value->plan_day; ?>	
								</div>
							<div id="collapse-<?php echo $i ;?>" class="plan-content collapse <?php if($i==1) echo 'show' ;?>" aria-labelledby="headingOne" data-parent="#accordion"><?php echo $value->plan_info; ?></div>
						</div>
					<?php endforeach ;?>
				</div>
			</div>
	  </div>
		<?php endif ;?>

		<?php if(!empty($tourGallery)) :?>
	  <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
	  	<?php if($titleGallery) :?>
	  		<h3><?php echo $titleGallery ;?></h3>
	  	<?php endif ;?>

	  	<?php if($descGallery) :?>
	  		<div class="desc"><?php echo $descGallery ;?></div>
	  	<?php endif ;?>

	  	<ul class="gallery-wrap">
	  		<?php $i=0; foreach ($tourGallery as $key=>$value) : $i++; ?>
					<li>
						<a href="<?php echo $value->gallery_img; ?>" data-parent=".gallery-wrap"  data-toggle="lightbox" data-gallery="gallery" >
							<img src="<?php echo $value->gallery_img; ?>" alt="<?php echo $value->gallery_alt; ?>" />
						</a>
					</li>
				<?php endforeach ;?>
	  	</ul>
	  </div>
	  <?php endif ;?>

	  <?php if($mapOption) :?>
	  <div class="tab-pane fade" id="map" role="tabpanel" aria-labelledby="map-tab">
	  	<div class="map">
				{jamap locations='{"location":{"0":"<?php echo $location ;?>"},"latitude":{"0":"<?php echo $mapLat ;?>"},"longitude":{"0":"<?php echo $mapLon ;?>"},"info":{"0":"<?php echo $mapInfo ;?>"}}' }{/jamap}
			</div>
  	</div>
	  <?php endif ;?>
	  
	  <div class="tab-pane fade" id="package" role="tabpanel" aria-labelledby="package-tab">
   <div class="destination_accomodations">
       <h3>Tours with <?php echo $this->item->title; ?></h3>
		 <?php echo JHtml::_('content.prepare', '{loadposition activity_packages}'); ?>
		 
		 <!--tours with this activity-->
		 <?php // Content is generated by content plugin event "onContentAfterTitle" ?>
	<?php echo $this->item->event->afterDisplayTitle; ?>

	<?php if ($useDefList && ($info == 0 || $info == 2)) : ?>
		<?php echo LayoutHelper::render('joomla.content.info_block', array('item' => $this->item, 'params' => $params, 'position' => 'above')); ?>
	<?php endif; ?>
      </div>
   </div>
	  
	  
	</div>
</div>

	</div>
		</div>
<div class = "row">
<div class="container">
<?php echo JHtml::_('content.prepare', '{loadposition toursrelated}'); ?>
</div>
</div>

<script type="application/ld+json">
{
	"@context": "http://schema.org",
	"@type": "Article",
	"headline": "<?php echo $this->item->title; ?>",
	"inLanguage": "<?php echo JFactory::getConfig()->get('language'); ?>",
	"author": "<?php echo $this->item->author; ?>",
	"datePublished": "<?php echo $this->item->publish_up; ?>",
	"dateModified": "<?php echo $this->item->modified; ?>",
	"mainEntityOfPage": "WebPage",
	"articleBody": <?php echo json_encode(preg_replace('/\s+/', ' ', strip_tags($this->item->text))); ?>,
	"image": 
	{
		"@type": "imageObject",
		"url": "<?php echo JUri::base().$images->image_fulltext; ?>",
		"height": "auto",
		"width": "auto"
	},
	"publisher": 
	{
		"@type": "Organization",
		"name": "<?php echo $this->item->author; ?>",
		"logo": 
		{
			"@type": "imageObject",
			"url": "<?php echo JURI::base(); ?>/templates/<?php echo JFactory::getApplication()->getTemplate() ?>/images/logo.png"
		}
	}
}
</script>

<script>
	(function($){
		$('.tour-nav-tabs').prependTo($('#t4-main-body > .t4-section-inner'));

		// Popup Gallery Images
    if ($('.gallery-wrap').length > 0) {
      $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
        event.preventDefault();
        return $(this).ekkoLightbox();
      }); 
    }
	})(jQuery);
</script>