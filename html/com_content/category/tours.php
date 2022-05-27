<?php
/**
T4 Overide
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\FileLayout;

$app = Factory::getApplication();

$this->category->text = $this->category->description;
$app->triggerEvent('onContentPrepare', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$this->category->description = $this->category->text;

$results = $app->triggerEvent('onContentAfterTitle', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$afterDisplayTitle = trim(implode("\n", $results));

$results = $app->triggerEvent('onContentBeforeDisplay', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$beforeDisplayContent = trim(implode("\n", $results));

$results = $app->triggerEvent('onContentAfterDisplay', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$afterDisplayContent = trim(implode("\n", $results));

// init columns value if not set
if (empty($this->columns)) $this->columns = 1;

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

		  <?php //if(!empty($tourPlan)) :?>
		  <!--<li class="nav-item">
		    <a class="nav-link" id="plan-tab" data-toggle="tab" href="#plan" role="tab" aria-controls="plan" aria-selected="true">
		    	<span class="fas fa-binoculars"></span>
		    	Travel Ideas
		    </a>
		  </li>-->
		  <?php //endif ;?>

		  <?php //if(!empty($tourGallery)) :?>
		  <li class="nav-item">
		    <a class="nav-link" id="gallery-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="gallery" aria-selected="true">
		    	<span class="fas fa-map-marked-alt"></span>
		    	Places
		    </a>
		  </li>
		  <?php //endif ;?>

		  <?php //if($mapOption) :?>
		  <li class="nav-item">
		    <a class="nav-link" id="accomodation-tab" data-toggle="tab" href="#accomodation" role="tab" aria-controls="accomodation" aria-selected="true">
		    	<span class="fas fa-hotel"></span>
				Accomodation		    
			</a>
		  </li>
		  <?php// endif; ?>

		  <?php //if($accomodationList) :?>
		  <li class="nav-item">
		    <a class="nav-link" id="activities-tab" data-toggle="tab" href="#ctivities" role="tab" aria-controls="ctivities" aria-selected="true">
		    	<span class="fas fa-hotel"></span>
		    	Activities
		    </a>
		  </li>
		  <?php //endif; ?>
		</ul>
	</div>
	</div>
</div>



<div class="row">
<div class = "container">
<div class="com-content-category-blog blog layout-view-tours-list  <?php echo $this->pageclass_sfx;?>"  itemscope itemtype="https://schema.org/Blog">
<div class="tab-content" id="tourContent">
	<div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
	

	<?php if ($this->params->get('show_page_heading')) : ?>
		<div class="page-header">
			<h1> <?php //echo $this->escape($this->params->get('page_heading')); ?> </h1>
		</div>
	<?php endif; ?>

	
	
	<?php echo $afterDisplayTitle; ?>

	<?php if ($this->params->get('show_cat_tags', 1) && !empty($this->category->tags->itemTags)) : ?>
		<?php $this->category->tagLayout = new FileLayout('joomla.content.tags'); ?>
		<?php echo $this->category->tagLayout->render($this->category->tags->itemTags); ?>
	<?php endif; ?>

	<?php if ($beforeDisplayContent || $afterDisplayContent || $this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
		<div class="category-desc clearfix">
		<span class="h3"><?php echo $this->category->title; ?></span>
			<?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
				<img src="<?php echo $this->category->getParams()->get('image'); ?>" alt="<?php echo htmlspecialchars($this->category->getParams()->get('image_alt'), ENT_COMPAT, 'UTF-8'); ?>">
			<?php endif; ?>
			<?php echo $beforeDisplayContent; ?>
			<?php if ($this->params->get('show_description') && $this->category->description) : ?>
				<?php echo HTMLHelper::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
			<?php endif; ?>
			<?php echo $afterDisplayContent; ?>
		</div>
	<?php endif; ?>
	
	<?php echo JHtml::_('content.prepare', '{loadposition kenya_tours}'); ?>
<?php echo JHtml::_('content.prepare', '{loadposition rwanda_tours}'); ?>
<?php echo JHtml::_('content.prepare', '{loadposition tz_tours}'); ?>
<?php echo JHtml::_('content.prepare', '{loadposition uganda_tours}'); ?>
	
	</div>
	
	
	
	<div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
	<div class = "container">
	<span class="h3">Places to visit in <?php echo $this->category->title; ?></span>
	<?php echo JHtml::_('content.prepare', '{loadposition kenya_places}'); ?>
	<?php echo JHtml::_('content.prepare', '{loadposition rwanda_places}'); ?>
	<?php echo JHtml::_('content.prepare', '{loadposition tz_places}'); ?>
	<?php echo JHtml::_('content.prepare', '{loadposition uganda_places}'); ?>
	</div>
	</div>
	
	<div class="tab-pane fade" id="ctivities" role="tabpanel" aria-labelledby="ctivities-tab">
	<div class = "container">
	<span class="h3">Activities in <?php echo $this->category->title; ?></span>
	<?php echo JHtml::_('content.prepare', '{loadposition uganda_activities}'); ?>
	<?php echo JHtml::_('content.prepare', '{loadposition kenya_activities}'); ?>
	<?php echo JHtml::_('content.prepare', '{loadposition rwanda_activities}'); ?>
	<?php echo JHtml::_('content.prepare', '{loadposition tz_activities}'); ?>
	</div>
	</div>
	
	<div class="tab-pane fade" id="accomodation" role="tabpanel" aria-labelledby="accomodation-tab">
	<div class = "container">
	<span class="h3">Where to stay in <?php echo $this->category->title; ?></span>
	<?php echo JHtml::_('content.prepare', '{loadposition kenya_hotels}'); ?>
	<?php echo JHtml::_('content.prepare', '{loadposition rwanda_hotels}'); ?>
	<?php echo JHtml::_('content.prepare', '{loadposition tz_hotels}'); ?>
	<?php echo JHtml::_('content.prepare', '{loadposition uganda_hotels}'); ?>
	</div>
	</div>
	
	
	</div>
	

</div>
</div>
</div>
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