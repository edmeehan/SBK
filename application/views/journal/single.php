<?php include_once(APPPATH.'views/templates/validation-block.php'); ?>

<?php if(@$ID):
    echo form_open('journal/edit/'.$ID);
    else:
    echo form_open('journal/new');
    endif;
?>

    <div class="row">
        <section class="span12">
            <?php echo form_fieldset(lang('journal.info_fieldset')); ?>
        	<div class="row">
        	    <div class="span4">
        	        <?php echo lang('app.date','date');  ?>
        	        <div class="input-prepend">
                        <span class="add-on"><i class="icon-calendar"></i></span>
                        <?php echo form_input('date',set_value('date',@$date),'class="span2" id="datepicker"'); ?>
                    </div>
                    <?php echo lang('app.desc','desc');  ?>
                    <?php echo form_input('desc',set_value('desc',@$desc)); ?>
                </div>
                <div class="span6">
                    <?php echo lang('journal.file_input','record_file');  ?>
                    <?php echo form_upload('record_file',set_value('record_file',@$record_file)); ?>
                </div>
                <?php if($current != 'journalCreate'): ?>
        	    <div class="span2">
        	        <?php echo lang('journal.id_label','entry_id');  ?>
        	        <?php echo form_input('entry_id',set_value('entry_id',@$entry_id),'class="span1" disabled="disabled"'); ?>
        	    </div>
        	    <?php endif;  ?>
        	</div>
            <?php echo form_fieldset_close(); ?>
        </section>
    </div>
    <div class="row">
        <section class="span12">
            <?php echo form_fieldset(lang('journal.line_fieldset')); ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><?php echo lang('journal.acct');  ?></th>
                            <th><?php echo lang('journal.debit');  ?></th>
                            <th><?php echo lang('journal.credit');  ?></th>
                            <th><?php echo lang('journal.contact');  ?></th>
                            <th><?php echo lang('journal.desc');  ?></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td><?php echo lang('form.table_tot');  ?></td>
                            <td>0.00</td>
                            <td>0.00</td>
                            <td colspan="2"></td>
                        </tr>
                    </tfoot>
                    <tbody id="journalentries">
                        <tr>
                            <td>
                                <div class="input-append">
                                    <input type="text" class="span2 account-input">
                                    <div class="btn-group">
                                        <button class="btn dropdown-toggle" data-toggle="" tabindex="">
                                            <i class="icon-list"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="input-prepend">
                                    <span class="add-on">$</span>
                                    <input class="span1" type="text" name="" value="" id=""/>
                                </div>
                            </td>
                            <td>
                                <div class="input-prepend">
                                    <span class="add-on">$</span>
                                    <input class="span1" type="text" name="" value="" id=""/>
                                </div>
                            </td>
                            
                            <td>
                                <div class="input-append">
                                    <input type="text" class="span2 contact-input">
                                    <div class="btn-group">
                                        <button class="btn dropdown-toggle" data-toggle="" tabindex="">
                                            <i class="icon-list"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <input type="text" name="" value="" id=""/>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <button class="btn btn-mini"><i class="icon-plus-sign"></i> <?php echo lang('form.button_addline');  ?></button>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            <?php echo form_fieldset_close(); ?>
        </section>
    </div>
    <div class="row">
        <div class="span12">
            <div class="form-actions">
                <button class="btn btn-primary"><i class="icon-ok icon-white"></i> <?php echo lang('form.button_submit'); ?></button>
                <a href="/journal" class="btn btn-link"><?php echo lang('form.button_cancel'); ?></a>
                <?php if($current != 'journalCreate'): ?>
                    <a href="/journal/delete/<?php echo @$ID; ?>" class="btn btn-inverse pull-right"><?php echo lang('form.button_delete'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript" charset="utf-8">
	contactsObj = <?php echo $contact_array; ?>;
	accountsObj = <?php echo $account_array; ?>;
</script>
