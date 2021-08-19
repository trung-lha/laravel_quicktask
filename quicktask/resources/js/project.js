$(document).ready(function(){
    var display = 1;

    function showHideAddProductForm () {
        if (display == 1){
            document.getElementById("add-form").style.display = "block";
            return display = 0;
        } else {
            document.getElementById("add-form").style.display = "none";
            return display = 1;
        }
    }
    $('#add_product_button').on('click',function(event) {
        showHideAddProductForm();
    });
    $('.cancel').on('click',function(event) {
        showHideAddProductForm();
    });

    var display2 = 1;

    function showHideAddTypeForm () {
        if (display2 == 1){
            document.getElementById("add_type_form").style.display = "block";
            return display2 = 0;
        } else {
            document.getElementById("add_type_form").style.display = "none";
            return display2 = 1;
        }
    }
    $('#add_type_button').on('click',function(event) {
        showHideAddTypeForm();
    });
    $('#cancel_type').on('click',function(event) {
        showHideAddProductForm();
        showHideAddTypeForm();
    });

    $("#editProductModal").on("show.bs.modal", function (e) {
        var name = $(e.relatedTarget).data('name');
        var id = $(e.relatedTarget).data('id');
        var price = $(e.relatedTarget).data('price');
        var quantity = $(e.relatedTarget).data('quantity');
        var des = $(e.relatedTarget).data('description');

        $('#passing_name').val(name);
        $('#passing_des').val(des);
        $('#passing_id').val(id);
        $('#passing_price').val(price);
        $('#passing_quantity').val(quantity);
    });
});
