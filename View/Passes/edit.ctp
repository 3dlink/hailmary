<article class="card shadow-1">
<?php echo $this->Form->create('Pass'); ?>
<?php	echo $this->Form->input('id');?>
    <fieldset>
      <legend>Edit Pass</legend>
      <div class="margenesHorizontales">

				<div class="col-md-12">
	        <div class="form-group">
	          <label>Name</label>
	          <?php echo $this->Form->input('name',array('div'=>false,'label'=>false,'class'=>'form-control','placeholder'=>'ie. Week Pass Deal')); ?>
	        </div>
	      </div>

				<!-- <div class="col-md-6">
	        <div class="form-group">
	          <label>Total number of passes</label>
	          <?php echo $this->Form->input('top',array('div'=>false,'label'=>false,'class'=>'form-control','placeholder'=>'Total Passes')); ?>
	        </div>
	      </div> -->

				<div class="col-md-6">
	        <div class="form-group">
	          <label>Old price ($)</label>
	          <?php echo $this->Form->input('old_price',array('div'=>false,'label'=>false,'class'=>'form-control','placeholder'=>'ie. 39,99')); ?>
	        </div>
	      </div>

				<div class="col-md-6">
	        <div class="form-group">
	          <label>New price ($)</label>
	          <?php echo $this->Form->input('new_price',array('div'=>false,'label'=>false,'class'=>'form-control','placeholder'=>"ie. 9,99 (0 if it's FREE)")); ?>
	        </div>
	      </div>

				<div class="col-md-6">
	        <div class="form-group">
	          <label>Start Date</label>
	          <?php echo $this->Form->input('start',array("div"=>false,"type"=>"text","label"=>false, "class"=>"form-control date","placeholder"=>"Start Date", "required"=>true, "id"=>"start")); ?>
	        </div>
	      </div>

				<div class="col-md-6">
	        <div class="form-group">
	          <label>End Date</label>
	          <?php echo $this->Form->input('end',array("div"=>false,"type"=>"text","label"=>false, "class"=>"form-control date","placeholder"=>"End Date", "required"=>true, "id"=>"end")); ?>
	        </div>
	      </div>

	      <legend>Upload new CSV File - Codes</legend>

				<div class="col-md-12 dlink-dropzone">
	        <label>CSV File</label>
	        <div  class="dropzone"  id ="drop-csv"  name="mainFileUploader">
            <div  class="fallback">
            	<input  name="file"  type="file" />
            </div>
	        </div>
	      </div>
	      <div id="content_csv">
	      </div>

	      <legend style="border-top: 1px solid #e5e5e5;">
	      	Games
	      	<buttom id="add_game" style="float:right" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Game</buttom>
	      </legend>

	      <div id="tile_container">
	      	<table id="table_game" class="table table-striped">
            <tr>
              <th>Name</th>
              <th></th>
            </th>
          <?php foreach ($this->data['Game'] as $key => $value) { ?>
          	<tr class="game_<?php echo $key;?>">
							<td><?php echo ucwords($value['name']); ?></td>
			        <td>
			          <div style="display: block; width: 80px; margin: 0 auto;">
			            <span onclick="delete_game(<?php echo $key;?>);" class="glyphicon glyphicon-remove" style="cursor:pointer"></span>
			          </div>
			        </td>
			      </tr>
          <?php } ?>

          </table>
		    </div>

		   	<div id="content_imgs">
		   		<?php foreach ($this->data['Game'] as $key => $value) { ?>
		   			<input class="game_<?php echo $key;?>" type="hidden" value="<?php echo $value['image'];?>" name="data[Pass][Game][<?php echo $key;?>][image]">
		   			<input class="game_<?php echo $key;?>" type="hidden" value="<?php echo $value['name'];?>" name="data[Pass][Game][<?php echo $key;?>][name]">
		   		<?php } ?>
		   	</div>


        <div class="margenesVerticales" style="text-align:right;margin-top:30px;float:right;">
          <input type = "button" class="btn btn-primary" onclick="window.location.href = WEBROOT+'Passes';" title="Go Back" value = "Back" style="width: 79px;">
          <button type="submit" class="btn btn-primary" id="save">
            Save
          </button>
        </div>
      </div>
    </fieldset>
</article>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Game</h4>
      </div>
      <div class="modal-body">
		      <div class="tile row">
						<div class="col-md-12">
			        <div class="form-group">
			          <label>Name</label>
			          <input id="game_name" name="" class="form-control" placeholder="ie. Phoenix v Adelaide">
			        </div>
			      </div>

						<div class="col-md-12 dlink-dropzone">
			        <label>Tile</label>
			        <div  class="dropzone tiles"  id ="drop_tile"  name="mainFileUploader">
		            <div id="drop_tile_c" class="fallback">
		            	<input  name="file"  type="file" />
		            </div>
			        </div>
			      </div>
		      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="save_game" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
	var x = <?php echo count($this->data['Game']); ?>;

$(document).ready(function() {



  $('.date').datetimepicker({
		format:'YYYY-MM-DD',
    showTodayButton:true
  });

  $('#start').datetimepicker();
  $('#end').datetimepicker({
      useCurrent: false //Important! See issue #1075
  });
  $("#start").on("dp.change", function (e) {
      $('#end').data("DateTimePicker").minDate(e.date);
  });
  $("#end").on("dp.change", function (e) {
      $('#start').data("DateTimePicker").maxDate(e.date);
  });



	$("#drop-csv").dropzone({ url: WEBROOT+"pages/upload/2", maxFilesize: 10, dictDefaultMessage: '<div class="col-xs-12 text-center" style="padding-bottom:20px"><img src="<?php echo $this->webroot; ?>img/file.png" alt="" /></div><p class="dropzone-add-message">Drop here CSV File or <a  class="add-files">Browse in your PC</a></p>',maxFiles: 1, acceptedFiles: ".csv",
		success:function(data){
			$('#content_csv').html('<input type="hidden" value='+data.xhr.response+' name="data[Pass][csv]">');
	  }
	});


	$(".tiles").dropzone({ url: WEBROOT+"pages/upload/1", maxFilesize: 10, dictDefaultMessage: '<div class="col-xs-12 text-center" style="padding-bottom:20px"><img src="<?php echo $this->webroot; ?>img/file.png" alt="" /></div><p class="dropzone-add-message">Drop image here or <a  class="add-files">Browse in your PC</a></p>',maxFiles: 1, acceptedFiles: "image/jpeg,image/png,image/gif",
		success:function(data){
			$('#content_imgs').append('<input class="game_'+x+'" type="hidden" value='+data.xhr.response+' name="data[Pass][Game]['+x+'][image]">');
	  }
	});

});

$('#save_game').click(function(event) {
	if($('#game_name').val() != ''){

		$('#content_imgs').append('<input class="game_'+x+'" type="hidden" value="'+$('#game_name').val()+'" name="data[Pass][Game]['+x+'][name]">');

		$('#table_game').append(
			'<tr class="game_'+x+'">'+
			'<td>'+$('#game_name').val()+'</td>'+
        '<td>'+
          '<div style="display: block; width: 80px; margin: 0 auto;">'+
            '<span onclick="delete_game('+x+');" class="glyphicon glyphicon-remove" style="cursor:pointer"></span>'+
          '</div>'+
        '</td>'+
      '</tr>'
		);
		$('#game_name').val('');
		Dropzone.forElement("#drop_tile").removeAllFiles(true);
		x++;
		$('#myModal').modal('toggle');
	}else{
		alert('nombre vacio');
	}
});

function delete_game(x) {
	if(confirm('Please, confirm you want to delete the game')){
		$('.game_'+x).remove();
	}
}

$('#save').click(function(event) {
  $('#save').html("Saving...");
  $('#save').attr('disabled', 'disabled');
  $('#PassEditForm').submit();
});

</script>
