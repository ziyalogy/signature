
         
		 
		 
		 <?php
   /**
    * ------------------------------------------------------------------------
    * Signature Template
    * ------------------------------------------------------------------------
    * Copyright (C) 2004-2018 Buildal Systems (U) Co., Ltd. All Rights Reserved.
    * @license - Copyrighted Commercial Software
    * Author: Buildal Systems (U) Co., Ltd
    * Websites:  http://www.buildal.ug -  http://www.buildal.ug
    * This file may not be redistributed in whole or significant part.
    * ------------------------------------------------------------------------
    */

   defined('_JEXEC') or die();
   $column = $helper->get('number-column');
   $count = $helper->getRows('data.img');

   $image = $helper->get('img');
   $nameMember = $helper->get('name-member');
   $nameOffice = $helper->get('name-office');
   ?>

<div class="acm-members style-1">
	<?php for ($i = 0; $i < $count; $i++): ?>

		<?php if ($i % $column == 0) {
      echo '<div class="row">';
  } ?>
			<div class="item col-xs-12 col-sm-6 col-lg-<?php echo 12 / $column; ?>">
				<div class="single-member">
					<div class="picture">
						<a href="#personbio"><img class="img-responsive" src="<?php echo $helper->get(
          'data.img',
          $i
      ); ?>" alt="" /></a>
						<?php if ($helper->get('name-member', $i)): ?>
								<h3 class="personname"><?php echo $helper->get('name-member', $i); ?></h3>
							<?php endif; ?>
						
						<?php if ($helper->get('name-office', $i)): ?>
								<h6><?php echo $helper->get('name-office', $i); ?></h6>
							<?php endif; ?>
					</div>
					
					
					<!--<div class="sraff-inner">
						<a href="#personbio">
							<div class="member-title">
							<?php if ($helper->get('name-member', $i)): ?>
								<h3><?php echo $helper->get('name-member', $i); ?></h3>
							<?php endif; ?>

							<?php if ($helper->get('name-office', $i)): ?>
								<h6><?php echo $helper->get('name-office', $i); ?></h6>
							<?php endif; ?>
							</div>
							<?php if ($helper->get('link-social', $i)): ?>
							<div class="bio_story">
				       			<a href="#personbio">See bio</a>
							</div>
				        <?php endif; ?>
						</a>
						
						
						
				        
						
				        
					</div>-->
					
		        </div>
				
			</div>
			
			
			<!-- Team Bio Modal -->
						
						<?php if ($helper->get('link-social', $i)): ?>
						
         <div class="modal fade" id="personbio" tabindex="-1" role="dialog" aria-labelledby="personbioTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title" id="personbioLongTitle"><h3><?php echo $helper->get(
                         'name-member',
                         $i
                     ); ?></h3></h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     
							<div class="biostory">
				       			<?php echo $helper->get('link-social', $i); ?>
							</div>
                  </div>
               </div>
            </div>
         </div>
		 <?php endif; ?>
         <!-- Team Bio Modal -->
						
			
			
		<?php if ($i % $column == $column - 1 || $i == $count - 1) {
      echo '</div>';
  } ?>

	<?php endfor; ?>
	
	
	
</div>

