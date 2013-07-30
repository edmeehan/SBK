<form action="view_submit" method="get" accept-charset="utf-8">
    <div class="row">
        <section class="span12">
            <fieldset>
            	<legend>Journal Entry Information</legend>
            	<div class="row">
            	    <div class="span4">
            	        <label for="entryDate">Entry Date</label>
            	        <div class="input-prepend">
                            <span class="add-on"><i class="icon-calendar"></i></span>
                            <input class="span2" type="text" name="entryDate" value="" id="entryDate"/>
                        </div>
                        <label for="entryMemo">Entry Description</label>
                        <input type="text" name="" value="" id=""/>
                    </div>
                    <div class="span6">
                        <label for="">Entry Record</label>
                        <input type="file" name="some_name" value="" id="some_name"/>
                    </div>
            	    <div class="span2">
            	        <label for="entryId">Entry ID</label>
                        <input class="span1" type="text" name="entryId" value="" id="entryId" disabled="disabled"/>
            	    </div>
            	</div>
            </fieldset>
        </section>
    </div>
    <div class="row">
        <section class="span12">
            <fieldset>
                <legend>Journal Entry Lines</legend>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Account</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>Client/Vendor/Other</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td>Totals:</td>
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
                                <button class="btn btn-mini"><i class="icon-plus-sign"></i> Add a line</button>
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
                
                <button class="btn btn-primary"><i class="icon-ok icon-white"></i> Save</button>
                <button class="btn btn-link">Cancel</button>
                <button class="btn btn-inverse pull-right">Delete</button>
            </div>
            
        </div>
        
    </div>
</form>