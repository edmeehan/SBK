<?php include_once(APPPATH.'views/templates/validation-block.php'); ?>

<?php if(@$ID):
    echo form_open_multipart('journal/edit/'.$ID,'id="journalForm"');
    else:
    echo form_open_multipart('journal/new','id="journalForm"');
    endif;
?>

    <div class="row">
        <section class="span12">
            <?php echo form_fieldset(lang('journal.info_fieldset')); ?>
        	<div class="row">
        	    <div class="span4">
        	        <div class="control-group <?php if(form_error('date')) echo 'error' ?>">
            	        <?php echo lang('app.date','date');  ?>
            	        <div class="input-prepend">
                            <span class="add-on"><i class="icon-calendar"></i></span>
                            <?php echo form_input('date',set_value('date',@$journal->date),'class="span2" id="datepicker"'); ?>
                        </div>
                        <?php echo form_error('date', '<span class="help-block">', '</span>'); ?>
                    </div>
                    <div class="control-group">
                        <?php echo lang('app.desc','desc');  ?>
                        <?php echo form_input('desc',set_value('desc',@$journal->description)); ?>
                    </div>
                </div>
                <div class="span6">
                    <?php echo lang('journal.file_input','record_file');  ?>
                    <?php echo form_upload('record_file',set_value('record_file',@$record_file)); ?>
                    <?php echo form_hidden('record_id',@$journal->record_id) ?>
                    <?php if($journal->name): ?>
                        <a class="btn" href="/uploads/<?php echo $journal->name; ?>" target="_blank"><i class="icon icon-download"></i> View Record</a>
                    <?php endif; ?>
                </div>
                <?php if($current != 'journalCreate'): ?>
        	    <div class="span2">
        	        <?php echo lang('journal.id_label','entry_id');  ?>
        	        <?php echo form_input('entry_id',set_value('entry_id',@$journal->id),'class="span1" disabled="disabled"'); ?>
        	    </div>
        	    <?php endif;  ?>
        	</div>
            <?php echo form_fieldset_close(); ?>
        </section>
    </div>
    <div class="row">
        <section class="span12">
            <?php echo form_fieldset(lang('journal.line_fieldset')); ?>
                <table id="journalEntry" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="acct"><?php echo lang('journal.acct');  ?></th>
                            <th class="debit"><?php echo lang('journal.debit');  ?></th>
                            <th class="credit"><?php echo lang('journal.credit');  ?></th>
                            <th class="cont"><?php echo lang('journal.contact');  ?></th>
                            <th class="des"><?php echo lang('journal.desc');  ?></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td><?php echo lang('form.table_tot');  ?></td>
                            <td>
                                <div class="input-prepend">
                                    <span class="add-on">$</span>
                                    <input class="span1" type="text" disabled="disabled" value="0.00" id="debitTotal"/>
                                </div>
                            </td>
                            <td>
                                <div class="input-prepend">
                                    <span class="add-on">$</span>
                                    <input class="span1" type="text" disabled="disabled" value="0.00" id="creditTotal"/>
                                </div>
                            </td>
                            <td>
                                <div id="totalAlert" class="alert">
                                    
                                </div>
                            </td>
                            <td>
                                <button id="addLine" class="btn pull-right"><i class="icon-plus-sign"></i> <?php echo lang('form.button_addline');  ?></button>
                            </td>
                        </tr>
                    </tfoot>
                    <tbody id="journalentries">
                        <?php foreach($journal->entries as $entry): ?>
                        <tr>
                            <td class="control-group <?php if(form_error('entry_account_id['.$entry->id.']')) echo 'error' ?>">
                                <?php echo form_hidden('entry[]',set_value('entry[]',$entry->id)); ?>
                                <div class="input-append">
                                    <?php echo form_input('entry_account['.$entry->id.']',NULL,'class="span2 account-input" autocomplete="off"'); ?>
                                    <?php echo form_hidden('entry_account_id['.$entry->id.']', set_value('entry_account_id['.$entry->id.']',@$entry->account_id)); ?>
                                    <div class="btn-group">
                                        <button class="btn dropdown-toggle" data-toggle="modal" data-target="#accountModal">
                                            <i class="icon-list"></i>
                                        </button>
                                    </div>
                                </div>
                                <?php echo form_error('entry_account_id['.$entry->id.']', '<span class="help-block">', '</span>'); ?>
                            </td>
                            <td class="control-group">
                                <div class="input-prepend">
                                    <span class="add-on">$</span>
                                    <?php echo form_number('entry_value_debit['.$entry->id.']',set_value('entry_value_debit['.$entry->id.']',@$entry->value_debit),'class="span1" step="0.01" pattern="[0-9]+([\,|\.][0-9]+)?"'); ?>
                                </div>
                            </td>
                            <td class="control-group">
                                <div class="input-prepend">
                                    <span class="add-on">$</span>
                                    <?php echo form_number('entry_value_credit['.$entry->id.']',set_value('entry_value_credit['.$entry->id.']',@$entry->value_credit),'class="span1" step="0.01" pattern="[0-9]+([\,|\.][0-9]+)?"'); ?>
                                </div>
                            </td>
                            <td class="control-group">
                                <div class="input-append">
                                    <?php echo form_input('entry_contact['.$entry->id.']',NULL,'class="span2 contact-input" autocomplete="off"'); ?>
                                    <?php echo form_hidden('entry_contact_id['.$entry->id.']', set_value('entry_contact_id['.$entry->id.']',@$entry->contact_id)); ?>
                                    <div class="btn-group">
                                        <button class="btn dropdown-toggle" data-toggle="modal" data-target="#contactModal">
                                            <i class="icon-list"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="control-group">
                                <?php echo form_input('entry_desc['.$entry->id.']',set_value('entry_desc['.$entry->id.']',@$entry->description),'class="input-xlarge"'); ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
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

<div id="contactModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			×
		</button>
		<h3 id="myModalLabel"><?php echo lang('contact.title_select');  ?></h3>
	</div>
	<div class="modal-body">
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">
			<?php echo lang('form.button_cancel'); ?>
		</button>
	</div>
</div>

<div id="accountModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			×
		</button>
		<h3 id="myModalLabel"><?php echo lang('account.title_select');  ?></h3>
	</div>
	<div class="modal-body">
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">
			<?php echo lang('form.button_cancel'); ?>
		</button>
	</div>
</div>
<script type="text/javascript" charset="utf-8">
	contactsObj = <?php echo $contact_array; ?>;
	accountsObj = <?php echo $account_array; ?>;
</script>