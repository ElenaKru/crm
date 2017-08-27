function updateLead(){

    var data = {
        id: $( "#leadID" ).val(),
        lead_name : $('#leadName').val()
    }
    $.post( "../ajax.php", { action: "updateLead", data: data }, function( result ) {

        // $.each( result.data, function() {
        //     $('#result').append('ID: ' + this.id + ' NAME: ' + this.lead_name + ' PHONE: ' + this.lead_phone + ' PRODUCT_id: ' + this.product_id + '<br/>');
        // });
    }, "json");
}

function getLeads(){
    $.post( "../ajax.php", { action: "getLeads" }, function( result ) {
        $.each( result.data, function() {
            $('#result').append('ID: ' + this.id + ' NAME: ' + this.lead_name + ' PHONE: ' + this.lead_phone + ' PRODUCT_id: ' + this.product_id + '<br/>');
        });
    }, "json");
}

function initForm(){
    getLeadsIds();
    getProductsIds()
}

function getProductsIds(){
    $.post( "../ajax.php", { action: "getProductsIds" }, function( result ) {
        $.each( result.data, function() {
            $('#productID').append($('<option>', {
                value: this.id,
                text: this.id
            }));
        });
        $("#productID").trigger("change");
    }, "json");
}


function getLeadsIds(){
    $.post( "../ajax.php", { action: "getLeadsIds" }, function( result ) {
        $.each( result.data, function() {
           $('#leadID').append($('<option>', {
               value: this.id,
               text: this.id
           }));
        });
        $("#leadID").trigger("change");
    }, "json");
}

function fillForm(data){
     $('#leadName').val(data.lead_name);
     $('#leadPhone').val(data.lead_phone);
     $('#productID').val(data.product_id);
}

function getLeadById(id, callBack){
    $.post( "../ajax.php", { action: "getLeadById", id : id }, function( result ) {
        callBack(result.data);
    }, "json");
}



$( "#leadID" ).change(function(e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    getLeadById(valueSelected, fillForm);

});