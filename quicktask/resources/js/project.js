$(document).ready(function(){
    var display = 1;

    function show_hide () {
        if (display == 1){
            document.getElementById("add-form").style.display = "block";
            return display = 0;
        } else {
            document.getElementById("add-form").style.display = "none";
            return display = 1;
        }
    }
    $('#add_product_button').on('click',function(event) {
        console.log("thanh cong jquery");
        show_hide();
    });
    $('.cancel').on('click',function(event) {
        show_hide();
    });

    var display2 = 1;

    function show_hide2 () {
        console.log("vao show_hide");
        if (display2 == 1){
            document.getElementById("add_type_form").style.display = "block";
            return display2 = 0;
        } else {
            document.getElementById("add_type_form").style.display = "none";
            return display2 = 1;
        }
    }
    $('#add_type_button').on('click',function(event) {
        show_hide2();
    });
    $('#cancel_type').on('click',function(event) {
        show_hide();
        show_hide2();
    });

    $("#editProductModal").on("show.bs.modal", function (e) {
        var name = $(e.relatedTarget).data('name');
        var id = $(e.relatedTarget).data('id');
        var price = $(e.relatedTarget).data('price');
        var quantity = $(e.relatedTarget).data('quantity');
        var des = $(e.relatedTarget).data('description');

        console.log(des);
        $('#passing_name').val(name);
        $('#passing_des').val(des);
        $('#passing_id').val(id);
        $('#passing_price').val(price);
        $('#passing_quantity').val(quantity);
    });

    function trans(key, replace = {}) {
        let translation = key.split('.').reduce((t, i) => t[i] || null, window.translations);
        for (var placeholder in replace) {
            translation = translation.replace(`:${placeholder}`, replace[placeholder]);
        }
    
        return translation;
    }

    
});
