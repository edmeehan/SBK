<?php if($this->session->flashdata('success')): ?>
    <div class="row">
    	<div class="span12">
    		<div class="alert alert-success">
    		    <button type="button" class="close" data-dismiss="alert">&times;</button>
    		    <?php echo $this->session->flashdata('success'); ?>
    		</div>
    	</div>
    </div>
<?php endif; ?>

<div class="row contact-index">
    <div class="span3">
        <a href="/contact/new" class="btn btn-primary btn-large btn-block"><?php echo lang('contact.title_add');?></a>
        <hr />
        <nav class="well">
        	<ul class="nav nav-list">
        	    <?php foreach($contact as $types): ?>
        	       <li class="">
        	           <a href="#contact-<?php echo $types->label ?>" class="cap"><i class="icon-chevron-right"></i> <?php echo $types->label ?></a>
    	           </li>
        	    <?php endforeach; ?>
        	</ul>
        </nav>
    </div>
    <div class="span8 offset1">
        <?php foreach($contact as $types): ?>
        <section id="#contact-<?php echo $types->label ?>" class="list-group">
        	<h2 class="cap"><?php echo $types->label ?></h2>
        	<table class="table table-striped table-hover">
        	    <thead>
        	        <tr>
        	            <th class="name"><?php echo lang('form.table_name'); ?></th>
        	            <th class="action"><?php echo lang('form.table_action'); ?></th>
        	        </tr>
        	    </thead>
        	    <?php foreach($types->contacts as $contacts): ?>
            	    <tr>
            	    	<td><?php echo $contacts->label ?></td>
            	    	<td>
            	    	    <div class="btn-group pull-right">
            	                <button class="btn btn-small dropdown-toggle" data-toggle="dropdown">
            	                    <i class="icon-chevron-down"></i>
            	                </button>
            	                <ul class="dropdown-menu">
            	                    <li>
            	                        <a href="/contact/edit/<?php echo $contacts->id ?>" class=""><i class="icon-edit"></i> <?php echo lang('form.button_edit') ?></a>
            	                    </li>
            	                    <li>
            	                        <a href="/contact/delete/<?php echo $contacts->id ?>" class=""><i class="icon-remove"></i> <?php echo lang('form.button_delete') ?></a>
            	                    </li>
            	                </ul>
            	            </div>
            	        </td>
            	    </tr>
        	    <?php endforeach; ?>
        	</table>
        </section>
        <?php endforeach; ?>
    </div>
</div>