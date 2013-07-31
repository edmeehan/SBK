<?php echo validation_errors(); ?>

<?php echo form_open('account/new'); ?>
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
                        <?php echo form_input(array('name'=>'acctIDInput','class'=>'span1','disabled'=>'disabled','value' => $acctID)); ?>
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
                <button class="btn btn-link"><?php echo lang('form.button_cancel'); ?></button>
                <button class="btn btn-inverse pull-right"><?php echo lang('form.button_delete'); ?></button>
            </div>
        </div>
    </div>
</form>