<form action="view_submit" method="get" accept-charset="utf-8">
    <div class="row">
        <section class="span12">
            <fieldset>
                <legend><?php echo $title; ?></legend>
                <div class="row">
                	<div class="span10">
                	    <label for="">Account Type</label>
                		<select name="" id="">
                		    <option value="1">Asset</option>
                		    <option value="2">Blah</option>
                		    <option value="3">Blah</option>
                		</select>
                		
                		<label for="">Account Label</label>
                		<input type="text" name="" value="" id=""/>
            		</div>
            		<div class="span2">
                        <label for="entryId">Account ID</label>
                        <input class="span1" type="text" name="entryId" value="" id="entryId" disabled="disabled"/>
                    </div>
                </div>
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