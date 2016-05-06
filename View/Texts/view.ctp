<div class="texts view">
<h2><?php echo __('Text'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($text['Text']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('About'); ?></dt>
		<dd>
			<?php echo h($text['Text']['about']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Faq'); ?></dt>
		<dd>
			<?php echo h($text['Text']['faq']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact'); ?></dt>
		<dd>
			<?php echo h($text['Text']['contact']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Text'), array('action' => 'edit', $text['Text']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Text'), array('action' => 'delete', $text['Text']['id']), array(), __('Are you sure you want to delete # %s?', $text['Text']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Texts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Text'), array('action' => 'add')); ?> </li>
	</ul>
</div>
