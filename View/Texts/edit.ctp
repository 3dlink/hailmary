<article class="card shadow-1">
<?php echo $this->Form->create('Text'); ?>
<?php	echo $this->Form->input('id');?>
    <fieldset>
      <legend>Add Texts</legend>
      <div class="margenesHorizontales">

				<div class="col-md-12">
	        <div class="form-group">
	          <label>About</label>
	          <?php echo $this->Form->input('about',array('div'=>false,'label'=>false,'class'=>'form-control','placeholder'=>'About')); ?>
	        </div>
	      </div>

				<div class="col-md-12">
	        <div class="form-group">
	          <label>FAQs</label>
	          <?php echo $this->Form->input('faq',array('div'=>false,'label'=>false,'class'=>'form-control','placeholder'=>'FAQs')); ?>
	        </div>
	      </div>

				<div class="col-md-12">
	        <div class="form-group">
	          <label>Contact</label>
	          <?php echo $this->Form->input('contact',array('div'=>false,'label'=>false,'class'=>'form-control','placeholder'=>"Contact")); ?>
	        </div>
	      </div>


        <div class="margenesVerticales" style="text-align:right;margin-top:30px;float:right;">
          <input type = "button" class="btn btn-primary" onclick="window.location.href = WEBROOT+'texts';" title="Go Back" value = "Back" style="width: 79px;">
          <button type="submit" class="btn btn-primary">
            Save
          </button>
        </div>
      </div>
    </fieldset>
</article>