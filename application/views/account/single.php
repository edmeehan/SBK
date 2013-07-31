<?php include_once(APPPATH.'views/templates/validation-block.php'); ?>

<?php if(@$ID):
    echo form_open('account/edit/'.$ID);
    else:
    echo form_open('account/new');
    endif;
?>
    <div class="row">
        <section class="span12">
            <?php echo form_fieldset($title); ?>
                <div class="row">
                	<div class="span10">
                		<?php echo lang('account.acct_type','acctTypeSelect'); ?>
                		<?php echo form_dropdown('acctTypeSelect',$acctTypeSelect,set_value('acctTypeSelect',@$acctType)); ?>
                		
                		<?php echo lang('account.acct_label','acctLabelInput'); ?>
                		<?php echo form_input('acctLabelInput',set_value('acctLabelInput',@$acctLabel)); ?>

            		</div>
            		<?php if($current != 'accountCreate'): ?>
            		<div class="span2">
                        <?php echo form_label('Account ID','acctIDInput'); ?>
                        <?php echo form_input(array('name'=>'acctIDInput','class'=>'span1','disabled'=>'disabled','value' => @$acctID)); ?>
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
                <a href="/account" class="btn btn-link"><?php echo lang('form.button_cancel'); ?></a>
                <?php if($current != 'accountCreate'): ?>
                    <a href="/account/delete/<?php echo @$ID; ?>" class="btn btn-inverse pull-right"><?php echo lang('form.button_delete'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</form>