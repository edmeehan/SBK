var journalManager, lineTemplate;

$(function(){
    // create journalManager Obj
    journalManager = new JournalManager();
    
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd'
    });
    
    
    
})

function JournalManager(){
	this.data = {};
	this.form = {};
	this.totals = {};
	this.template = {};
	// Importated Data
	this.data.accounts = accountsObj;
	this.data.contacts = contactsObj;
	// Form Elements
	this.form.$form = $('#journalForm');
	this.form.$entryTable = $('#journalEntry');
	this.form.$addLine = $('#addLine');
	// Totals
	this.totals.$credit = $('#creditTotal');
	this.totals.$debit = $('#debitTotal');
	this.totals.$alert = $('#totalAlert');
	
	this.init();
}

JournalManager.prototype.init = function(){
	// create single arrays for typeahead search
	this.setArray('accounts','accountsArray');
	this.setArray('contacts','contactsArray');
	// Init form
	this.update();
	this.setForm();
	this.setTotals();
	this.form.$addLine.click(this,this.addLine);
	this.form.$form.submit(this,this.submitForm);
}

JournalManager.prototype.update = function(){
	this.form.$accountLabel = 	$('input[name^="entry_account["]','#journalEntry');
	this.form.$accountID = 		$('input[name^="entry_account_id["]','#journalEntry');
	this.form.$contactLabel = 	$('input[name^="entry_contact["]','#journalEntry');
	this.form.$contactID = 		$('input[name^="entry_contact_id["]','#journalEntry');
	this.form.$debit = 			$('input[name^="entry_value_debit["]','#journalEntry');
	this.form.$credit = 		$('input[name^="entry_value_credit["]','#journalEntry');
	// Form listeners
	this.form.$debit.blur({obj:this,label:'debit'},this.setValue);
	this.form.$credit.blur({obj:this,label:'credit'},this.setValue);
	// Type ahead
	this.form.$accountLabel.typeahead({
        source:this.data.accountsArray
    });    
    this.form.$contactLabel.typeahead({
        source:this.data.contactsArray
    });
}

JournalManager.prototype.getID = function(label,arrayName){
	return $.inArray(label,this.data[arrayName]);
}

JournalManager.prototype.getLabel = function(index,arrayName){
	return this.data[arrayName][index];
}

JournalManager.prototype.setArray = function(objName,arrayName){
    var length = this.data[objName].length;
    this.data[arrayName] = [];   
    for (var i=0; i < length; i++) {
      this.data[arrayName].push(this.data[objName][i].label);
    };
}

JournalManager.prototype.setForm = function(){
	// Set Account Labels
	for (var i=0; i < this.form.$accountID.length; i++) {
	  var label = this.getLabel(this.form.$accountID.eq(i).val(),'accountsArray')
	  this.form.$accountLabel.eq(i).val(label);
	};
	// Set Contact Labels
	for (var i=0; i < this.form.$contactID.length; i++) {
	  var label = this.getLabel(this.form.$contactID.eq(i).val(),'contactsArray')
	  this.form.$contactLabel.eq(i).val(label);
	};
}

JournalManager.prototype.setFormID = function(){
	// Set Account Labels
	for (var i=0; i < this.form.$accountID.length; i++) {
	  var id = this.getID(this.form.$accountLabel.eq(i).val(),'accountsArray')
	  this.form.$accountID.eq(i).val(id);
	};
	// Set Contact Labels
	for (var i=0; i < this.form.$contactID.length; i++) {
	  var id = this.getID(this.form.$contactLabel.eq(i).val(),'contactsArray')
	  this.form.$contactID.eq(i).val(id);
	};
}

JournalManager.prototype.setTotals = function(){
	var debitTotal = 0, creditTotal = 0;
	this.form.$debit.each(function(index,element){
		var value = $(element).val();
		if(value != ''){
			debitTotal += parseFloat(value);
		}
	})
	this.form.$credit.each(function(index,element){
		var value = $(element).val();
		if(value != ''){
			creditTotal += parseFloat(value);
		}
	})
	if(creditTotal != debitTotal){
		this.setTotalAlert(creditTotal-debitTotal);
	}else{
		this.setTotalAlert(false);
	}
	
	this.totals.$credit.val(creditTotal);
	this.totals.$debit.val(debitTotal);
}

JournalManager.prototype.setValue = function(event){
	var index, $this;
	$this = $(this);
	if(event.data.label === 'debit'){
		index = event.data.obj.form.$debit.index($this);
		if($this.val() !== ''){
			event.data.obj.form.$credit.eq(index).val('');
		}
	}else if(event.data.label === 'credit'){
		index = event.data.obj.form.$credit.index($this);
		if($this.val() !== ''){
			event.data.obj.form.$debit.eq(index).val('');
		}
	}

	event.data.obj.setTotals();
}

JournalManager.prototype.setTotalAlert = function(value){
	if(value !== false){
		this.totals.$alert.show().html('<strong>Oops!</strong> your off by $'+Math.abs(value));
	}else{
		this.totals.$alert.hide();
	}
}

JournalManager.prototype.submitForm = function(event){
	event.data.setFormID();
	
}

JournalManager.prototype.addLine = function(event){
	var key,lineTemplate,$newLine;
	
	key = 'newline-'+Number(new Date()).toString(16).substr(-5, 5);
	
	lineTemplate =	'<tr class="'+key+'">';
	lineTemplate +=		'<td>';
	lineTemplate +=			'<div class="input-append">';
	lineTemplate +=				'<input type="hidden" value="'+key+'" name="entry[]">'
	lineTemplate +=				'<input type="text" class="span2 account-input" value="" name="entry_account['+key+']">';
	lineTemplate +=         	'<input type="hidden" value="" name="entry_account_id['+key+']">';
	lineTemplate +=         	'<div class="btn-group">';
	lineTemplate +=         		'<button class="btn dropdown-toggle" data-toggle="modal" data-target="#accountModal">';
	lineTemplate +=         			'<i class="icon-list"></i>';
	lineTemplate +=              	'</button>';
	lineTemplate +=       		'</div>';
	lineTemplate +=    		'</div>';
	lineTemplate += 	'</td>';
	lineTemplate +=     '<td>';
	lineTemplate +=     	'<div class="input-prepend">';
	lineTemplate +=         	'<span class="add-on">$</span>';
	lineTemplate +=             '<input type="text" class="span1" value="" name="entry_value_debit['+key+']">';
	lineTemplate +=       	'</div>';
	lineTemplate +=    	'</td>';
	lineTemplate +=    	'<td>';
	lineTemplate +=    		'<div class="input-prepend">';
	lineTemplate +=       		'<span class="add-on">$</span>';
	lineTemplate +=              '<input type="text" class="span1" value="" name="entry_value_credit['+key+']">';
	lineTemplate +=        	'</div>';
	lineTemplate +=    	'</td>';
	lineTemplate +=     '<td>';
	lineTemplate +=     	'<div class="input-append">';
	lineTemplate +=         	'<input type="text" class="span2 contact-input" value="" name="entry_contact['+key+']">';
	lineTemplate +=             '<input type="hidden" value="" name="entry_contact_id['+key+']">';
	lineTemplate +=           	'<div class="btn-group">';
	lineTemplate +=             	'<button class="btn dropdown-toggle" data-toggle="modal" data-target="#contactModal">';
	lineTemplate +=                 	'<i class="icon-list"></i>';
	lineTemplate +=                	'</button>';
	lineTemplate +=       		'</div>';
	lineTemplate +=    		'</div>';
	lineTemplate +=  	'</td>';
	lineTemplate +=    	'<td>';
	lineTemplate +=     	'<input type="text" class="input-xlarge" value="" name="entry_desc['+key+']">';   
	lineTemplate +=   	'</td>';
	lineTemplate +=	'</tr>';
	
	event.data.form.$entryTable.append(lineTemplate);
	
	event.data.update();
	
	$('.'+key+' .account-input','#journalEntry').focus();
		
	return false;
}