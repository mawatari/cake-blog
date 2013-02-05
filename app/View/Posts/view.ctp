<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Post');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($post['Post']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Title'); ?></dt>
			<dd>
				<?php echo h($post['Post']['title']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Body'); ?></dt>
			<dd>
				<?php echo h($post['Post']['body']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Author'); ?></dt>
			<dd>
				<?php echo $this->Html->link($post['Author']['name'], array('controller' => 'authors', 'action' => 'view', $post['Author']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h($post['Post']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($post['Post']['modified']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Post')), array('action' => 'edit', $post['Post']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Post')), array('action' => 'delete', $post['Post']['id']), null, __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Posts')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Post')), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Authors')), array('controller' => 'authors', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Author')), array('controller' => 'authors', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

