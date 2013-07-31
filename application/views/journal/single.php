<?php include_once(APPPATH.'views/templates/validation-block.php'); ?>
<form action="view_submit" method="get" accept-charset="utf-8">
    <div class="row">
        <section class="span12">
            <fieldset>
            	<legend><?php echo lang('journal.info_fieldset');  ?></legend>
            	<div class="row">
            	    <div class="span4">
            	        <label for="entryDate"><?php echo lang('journal.date_label');  ?></label>
            	        <div class="input-prepend">
                            <span class="add-on"><i class="icon-calendar"></i></span>
                            <input class="span2" type="text" name="entryDate" value="" id="entryDate"/>
                        </div>
                        <label for="entryMemo"><?php echo lang('journal.desc_label');  ?></label>
                        <input type="text" name="" value="" id=""/>
                    </div>
                    <div class="span6">
                        <label for=""><?php echo lang('journal.rec_label');  ?></label>
                        <input type="file" name="some_name" value="" id="some_name"/>
                    </div>
                    <?php if($current != 'journalCreate'): ?>
            	    <div class="span2">
            	        <label for="entryId"><?php echo lang('journal.id_label');  ?></label>
                        <input class="span1" type="text" name="entryId" value="" id="entryId" disabled="disabled"/>
            	    </div>
            	    <?php endif;  ?>
            	</div>
            </fieldset>
        </section>
    </div>
    <div class="row">
        <section class="span12">
            <fieldset>
                <legend><?php echo lang('journal.line_fieldset');  ?></legend>
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
                    <tbody>
                        <tr>
                            <td>
                                <div class="input-append">
                                    <input type="text" class="span2">
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
                                    <input type="text" class="span2">
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
                        <tr>
                            <td>
                                <div class="input-append">
                                    <input type="text" class="span2">
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
                                    <input type="text" class="span2">
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
            </fieldset>
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