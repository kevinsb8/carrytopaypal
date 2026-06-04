$(document).ready(function(){
    $(".add-to-cart").click(function(){
        var id = $(this).data("id");
        $.post("add_to_cart.php", {product_id: id}, function(res){
            alert(res);
        });
    });
});