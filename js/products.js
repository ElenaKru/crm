function getProducts(){
    $.get( "../product-api.php", { action: "getProducts" }, function( result ) {
        $.each( result.data, function() {
            $('#result').append('ID: ' + this.id + ' NAME: ' + this.product_name + '<br/>');
        });
    }, "json");
}



function updateProduct(){
    
        var data = {
            id: $( "#productID" ).val(),
            product_name : $('#productName').val()
        };

    $.ajax(
        {
            url:"../product-api.php",
            type: 'PUT',
            data:  { action: "updateProduct", data: data },
            dataType: "json",
            success: function(result) {
                if(result.status == 0){
                    alert ('PRODUCT WAS UPDATED SUCCESSFULLY');
                } else {
                    alert('ERROR');
                }
            }
        });
}

    //     $.post( "../product-api.php", { action: "updateProduct", data: data }, function( result ) {
    //         if(result.status == 0){
    //             alert ('PRODUCT WAS UPDATED SUCCESSFULLY')
    //         } else {
    //             alert('ERROR');
    //         }
    //     }, "json");
    // }
    
    

    
    function getProductsIds(){
        $.get( "../product-api.php", { action: "getProductsIds" }, function( result ) {
            $.each( result.data, function() {
                $('#productID').append($('<option>', {
                    value: this.id,
                    text: this.id
                }));
            });
            $("#productID").trigger("change");
        }, "json");
    }
    



    function deleteProduct(){
        $.ajax(
            {
                url:"../product-api.php",
                type: 'DELETE',
                data:  { action: "deleteProduct", id: $( "#productID" ).val()},
                dataType: "json",
                success: function(result) {
                    if(result.status == 0){
                        alert ('PRODUCT WAS DELETED SUCCESSFULLY')
                    } else {
                        alert('ERROR');
                    }
                }
            });
    }


    // function deleteProduct(){
    //     $.post( "../product-api.php", { action: "deleteProduct", id: $( "#productID" ).val()}, function( result ) {
    //         if(result.status == 0){
    //             alert ('PRODUCT WAS DELETED SUCCESSFULLY')
    //         } else {
    //             alert('ERROR');
    //         }
    //     }, "json");
    // }



function createProduct(){

    var data = {
        product_name : $('#productName').val()
    }
    $.post( "../product-api.php", { action: "createProduct", data: data }, function( result ) {
        if(result.status == 0){
            alert ('PRODUCT WAS CREATED SUCCESSFULLY')
        } else {
            alert('ERROR');
        }
    }, "json");
}