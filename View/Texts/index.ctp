<!-- <div class="texts index">
	<h2><?php echo __('Texts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('about'); ?></th>
			<th><?php echo $this->Paginator->sort('faq'); ?></th>
			<th><?php echo $this->Paginator->sort('contact'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($texts as $text): ?>
	<tr>
		<td><?php echo h($text['Text']['id']); ?>&nbsp;</td>
		<td><?php echo h($text['Text']['about']); ?>&nbsp;</td>
		<td><?php echo h($text['Text']['faq']); ?>&nbsp;</td>
		<td><?php echo h($text['Text']['contact']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $text['Text']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $text['Text']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $text['Text']['id']), array(), __('Are you sure you want to delete # %s?', $text['Text']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Text'), array('action' => 'add')); ?></li>
	</ul>
</div>
 -->

 <div class="passes index">
 <!--List  Open-->
      <article class="card shadow-1">
          <fieldset>
            <legend>Texts <buttom onclick="window.location.href=WEBROOT+'passes/add';" style="float:right" class="btn btn-primary">Add pass</buttom></legend>
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
</div>	