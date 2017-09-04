function getLeads(){
    $.get( "../lead-api.php", { action: "getLeads" }, function( result ) {
        $.each( result.data, function() {
            $('#result').append('ID: ' + this.id + ' NAME: ' + this.lead_name + ' PHONE: ' + this.lead_phone + ' PRODUCT_id: ' + this.product_id + '<br/>');
        });
    }, "json");
}



function updateLead(){

    var data = {
        id: $( "#leadID" ).val(),
        lead_name : $('#leadName').val(),
        lead_phone: $('#leadPhone').val(),
        product_id: $('#productID').val()
    };
    $.ajax(
        {
            url:"../lead-api.php",
            type: 'PUT',
            data:  { action: "updateLead", data: data },
            dataType: "json",
            success: function(result) {
                if(result.status == 0){
                    alert ('USER WAS UPDATED SUCCESSFULLY');
                } else {
                    alert('ERROR');
                }
            }
        });
}


function initForm(){
    getLeadsIds();
    getProductsIds()
}

function getProductsIds(){
    $.get( "../lead-api.php", { action: "getProductsIds" }, function( result ) {
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
    $.get( "../lead-api.php", { action: "getLeadsIds" }, function( result ) {
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
    $.get( "../lead-api.php", { action: "getLeadById", id : id }, function( result ) {
        callBack(result.data);
    }, "json");
}



$( "#leadID" ).change(function(e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    getLeadById(valueSelected, fillForm);

});

function deleteLead(){
    $.ajax(
        {
            url:"../lead-api.php",
            type: 'DELETE',
            data:  { action: "deleteLeadById", id: $( "#leadID" ).val()},
            dataType: "json",
            success: function(result) {
                if(result.status == 0){
                    alert ('USER WAS DELETED SUCCESSFULLY')
                } else {
                    alert('ERROR');
                }
            }
        });
}


function createLead(){
    
        var data = {
            lead_name : $('#leadName').val(),
            lead_phone: $('#leadPhone').val(),
            product_id: $('#productID').val()
        }
        $.post( "../lead-api.php", { action: "createLead", data: data }, function( result ) {
            if(result.status == 0){
                alert ('USER WAS CREATED SUCCESSFULLY')
            } else {
                alert('ERROR');
            }
        }, "json");
    }