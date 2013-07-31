<?php if(validation_errors()): ?>
<div class="row">
    <div class="span12">
        <div class="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Something is wrong</h4>
            <ul>
            <?php echo validation_errors('<li>','</li>'); ?>
            </ul>
        </div>
    </div>
</div>
<? endif; ?>

<?php if(@$ID):
    echo form_open('contact/edit/'.$ID);
    else:
    echo form_open('contact/new');
    endif;
?>
    <div class="row">
        <section class="span12">
            <?php echo form_fieldset($title); ?>
                <div class="row">
                	<div class="span10">
                		<?php echo lang('contact.contact_type','contactTypeSelect'); ?>
                		<?php echo form_dropdown('contactTypeSelect',$contactTypeSelect,set_value('contactTypeSelect',@$contactType)); ?>
                		
                		<?php echo lang('contact.contact_label','contactLabelInput'); ?>
                		<?php echo form_input('contactLabelInput',set_value('contactLabelInput',@$contactLabel)); ?>

            		</div>
            		<?php if($current != 'contactCreate'): ?>
            		<div class="span2">
                        <?php echo form_label('Contact ID','contactIDInput'); ?>
                        <?php echo form_input(array('name'=>'contactIDInput','class'=>'span1','disabled'=>'disabled','value' => @$contactID)); ?>
                    </div>
                    <?php endif; ?>
                </div>
            <?php echo form_fieldset_close(); ?>
        </section>
    </div>
    <div class="row">
        <div class="span12">
            <div class="form-actions">
                <button class="btn btn-primary"><i class="icon-ok icon-white"></i> <?php echo lang('form.button_submit'); ?></button>
                <a href="/contact" class="btn btn-link"><?php echo lang('form.button_cancel'); ?></a>
                <?php if($current != 'contactCreate'): ?>
                    <a href="/contact/delete/<?php echo @$ID; ?>" class="btn btn-inverse pull-right"><?php echo lang('form.button_delete'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</form>