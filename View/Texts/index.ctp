
 <div class="texts index">
 <!--List  Open-->
      <article class="card shadow-1">
          <fieldset>
            <legend>Texts <buttom onclick="window.location.href=WEBROOT+'texts/add';" style="float:right" class="btn btn-primary">Add text</buttom></legend>
            <!--Search Close-->
            <div class="margenesHorizontales">
              <table class="table table-striped">
                <tr>
                  <th>Page</th>
                  <th></th>
                </th>

									<tr>
                    <td>About, FAQ, Contact&nbsp;</td>
	                  <td>
	                    <div style="display: block; width: 80px; margin: 0 auto;">
                        <?php if($this->UserAuth->getGroupId() == 1){ ?>
  	                      <a href="<?php echo $this->webroot;?>texts/edit/1" title="Edit pass" class="menuTable">
  	                        <span class="glyphicon glyphicon-pencil"></span>
  	                      </a>
                        <?php } ?>
	                    </div>                  
	                  </td>
									</tr>
              </table>
            </div> 
          </fieldset>          
      </article>
</div>	