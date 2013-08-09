var contactsArray = [], accountsArray = [];

$(function(){
    $('#datepicker').datepicker({
      format: 'mm-dd-yyyy'
    });
    
    singleArray(contactsObj,contactsArray);
    singleArray(accountsObj,accountsArray);
    
    $('.account-input','#journalentries').typeahead({
        source:accountsArray,
        //minLength:2,
        //items:5
    });
    
    $('.contact-input','#journalentries').typeahead({
        source:contactsArray,
        //minLength:2,
        //items:5
    });
})

function singleArray(objName,arrayName){
    var length = objName.length;
    for (var i=0; i < length; i++) {
      arrayName.push(objName[i].label)
    };
}
