function getProducts(){
    $.post( "../ajax.php", { action: "getProducts" }, function( result ) {
        $.each( result.data, function() {
            $('#result').append('ID: ' + this.id + ' NAME: ' + this.product_name + '<br/>');
        });
    }, "json");
}