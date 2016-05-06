<div class="passes index">
 <!--List  Open-->
      <article class="card shadow-1">
          <fieldset>
            <legend>Passes <buttom onclick="window.location.href=WEBROOT+'passes/add';" style="float:right" class="btn btn-primary">Add pass</buttom></legend>
            <!--Search Close-->
            <div class="margenesHorizontales">
              <table class="table table-striped">
                <tr>
                  <th>Name</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th></th>
                </th>

                <?php foreach ($passes as $item): ?>
									<tr>
                    <td><?php echo h($item['Pass']['name']); ?>&nbsp;</td>
                    <td><?php echo h($item['Pass']['start']); ?>&nbsp;</td>
                    <td><?php echo h($item['Pass']['end']); ?>&nbsp;</td>
	                  <td>
	                    <div style="display: block; width: 80px; margin: 0 auto;">
                        <?php if($this->UserAuth->getGroupId() == 1){ ?>
  	                      <a href="<?php echo $this->webroot;?>passes/edit/<?php echo $item['Pass']['id'];?>" title="Edit pass" class="menuTable">
  	                        <span class="glyphicon glyphicon-pencil"></span>
  	                      </a>
  	                      <a href="<?php echo $this->webroot;?>passes/delete/<?php echo $item['Pass']['id'];?>" onclick="if (confirm(&quot;Please, confirm you want to delete the pass&quot;)) { return true; } return false;" class="menuTable" title="Delete pass">
  	                        <span class="glyphicon glyphicon-remove"></span></a>
                            <?php if($item['Pass']['active'] == 1){ ?>
                              <a href="<?php echo $this->webroot;?>passes/makeInactive/<?php echo $item['Pass']['id'];?>" title="Make Inactive" class="menuTable">
                                <span class="glyphicon glyphicon-eye-close"></span>
                              </a>
                            <?php }else{ ?>
                              <a href="<?php echo $this->webroot;?>passes/makeActive/<?php echo $item['Pass']['id'];?>" title="Make Active" class="menuTable">
                                <span class="glyphicon glyphicon-eye-open"></span>
                              </a>
                            <?php } ?>
                        <?php } ?>
	                    </div>                  
	                  </td>
									</tr>
								<?php endforeach; ?>
              </table>
            </div> 
          </fieldset>          
      </article>

<ul class="pagination">
<?php
  echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
  echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
  echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
?>
</ul>

</div>	