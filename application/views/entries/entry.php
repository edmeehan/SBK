<form action="view_submit" method="get" accept-charset="utf-8">
    <div class="row">
        <section class="span12">
            <fieldset>
            	<legend>Entry Information</legend>
            	<div class="row">
            	    <div class="span4">
            	        <label for="entryDate">Entry Date</label>
            	        <div class="input-prepend">
                            <span class="add-on"><i class="icon-calendar"></i></span>
                            <input class="span2" type="text" name="entryDate" value="" id="entryDate"/>
                        </div>
                        <label for="entryMemo">Entry Memo</label>
                        <textarea name="entryMemo" id="entryMemo"></textarea>
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
                <legend>Entry Ledgers</legend>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>Ledger</th>
                            <th>Account</th>
                            <th>Name</th>
                            <th colspan="2">Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
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
                                <select class="span2">
                                    <option>Asset</option>
                                    <option>Liability</option>
                                    <option>Income</option>
                                    <option>Expense</option>
                                    <option>Equity</option>
                                </select>
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
                            <td>
                                <button title="Remove ledger row" class="btn btn-danger"><i class="icon-remove icon-white"></i></button>
                            </td>
                        </tr>
                        <tr>
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
                                <select class="span2">
                                    <option>Asset</option>
                                    <option>Liability</option>
                                    <option>Income</option>
                                    <option>Expense</option>
                                    <option>Equity</option>
                                </select>
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
                            <td>
                                <button title="Remove ledger row" class="btn btn-danger"><i class="icon-remove icon-white"></i></button>
                            </td>
                        </tr>
                        <tr>
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
                                <select class="span2">
                                    <option>Asset</option>
                                    <option>Liability</option>
                                    <option>Income</option>
                                    <option>Expense</option>
                                    <option>Equity</option>
                                </select>
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
                            <td>
                                <button title="Remove ledger row" class="btn btn-danger"><i class="icon-remove icon-white"></i></button>
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
                
                <button class="btn btn-primary"><i class="icon-ok icon-white"></i> Save Entry</button>
                <button class="btn">Cancel</button>
            </div>
            
        </div>
        
    </div>
</form>