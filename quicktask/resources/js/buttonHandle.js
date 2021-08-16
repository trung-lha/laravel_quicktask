$(document).ready(function() {

    function fetch_data(event) {
        $.ajax({
            url: "",
            method: "get",
            success: function(data) {
                $('#load_data_ajax').html(data);
            },
        });
    }
    // fetch_data();
    $('#add_button').on('click', function(event) {
        event.preventDefault();
        var code = $('#code_add_form').val();
        var name = $('#name_add_form').val();
        var price = $('#price_add_form').val();
        var quantity = $('#quantity_add_form').val();
        let hasError = false;
        if (name == '' || price == '' || quantity == '' || code == '') {
            hasError = true
        }
        if (!hasError) {
            $.ajax({
                url: "http://localhost:8888/PHP_MVC/san-pham-add",
                method: "POST",
                data: {
                    code: code,
                    name: name,
                    price: price,
                    quantity: quantity
                },
                success: function(data) {
                    console.log(data);
                    if (data == "1") {
                        alert('Product added successfully!!');
                        $('#add_product')[0].reset();
                        show_hide();
                        fetch_data();
                    } else {
                        event.preventDefault();
                        alert('Product code you have entered is already exits !!');
                    }
                },
            });
        }
    });
    //delete data
    $(document).on('click', '.del_data', function() {
        var id = $(this).data('id_del');
        $("#confirm_delete").on('click', function() {
            $('#confirm_delete').attr('data-dismiss', "modal")
            $.ajax({
                url: "http://localhost:8888/PHP_MVC/san-pham-delete",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    $('#alert_notify').alert('close');
                    // alert('Delete product successfully');
                    fetch_data();
                },
            });
        })

    });

    //upadate product
    function isDigit(string) {
        var regex = /^[0-9]+$/i;
        var checked = regex.test(string);
        return checked;
    }
    $(document).on('click', '.save_data', function() {
        var id = $(this).data('id_update');
        var currentRow = $(this).closest("tr");
        var code = (currentRow.find("td:eq(0)").text());
        var name = currentRow.find("td:eq(1)").text();
        var price = (currentRow.find("td:eq(2)").text());
        var quantity = (currentRow.find("td:eq(3)").text());

        if (isDigit(price) && isDigit(quantity)) {
            price = parseInt(price);
            quantity = parseInt(quantity);
            $.ajax({
                url: "http://localhost:8888/PHP_MVC/san-pham-update",
                method: "POST",
                data: {
                    id: id,
                    code: code,
                    name: name,
                    price: price,
                    quantity: quantity,
                },
                success: function(data) {
                    console.log(data);
                    if (data == "1") {
                        alert('Product information update successfully!!');
                        fetch_data();
                    } else {
                        alert('Product code have to unique !!');
                    }
                },
            });
        } else {
            alert("You entered wrong data");
        }
    });

    // xu ly logic giao dien khi click cac button
    $(document).on('click', '.update_data', function() {
        var id = $(this).data('id_del');
        var id_string = $(this).data('id_string');
        var allProducts = id_string.split('/');
        var newArr = allProducts.splice(0, allProducts.length - 1);
        for (let index = 0; index < newArr.length; index++) {
            const element = newArr[index];
            if (id == element) {
                $("#code_" + id).attr("contenteditable", true);
                $("#name_" + id).attr("contenteditable", true);
                $("#price_" + id).attr("contenteditable", true);
                $("#quantity_" + id).attr("contenteditable", true);
                $("#code_" + id).css("background-color", "#cbcede");
                $("#name_" + id).css("background-color", "#cbcede");
                $("#price_" + id).css("background-color", "#cbcede");
                $("#quantity_" + id).css("background-color", "#cbcede");
                $("#action_" + id).css("background-color", "#cbcede");
                $("#update_" + id).css({
                    "display": "none"
                });
                $("#delete_" + id).css({
                    "display": "none"
                });
                $("#save_" + id).css({
                    "display": "block"
                });
                $("#cancel_" + id).css({
                    "display": "block"
                });
            } else {
                $("#update_" + element).css({
                    "display": "block"
                });
                $("#delete_" + element).css({
                    "display": "block"
                });
                $("#update_" + element).attr("disabled", true);
                $("#delete_" + element).attr("disabled", true);
                $("#save_" + element).css({
                    "display": "none"
                });
                $("#cancel_" + element).css({
                    "display": "none"
                });
            }
        }
    })
    $(document).on('click', '.cancel_data', function() {
        var id = $(this).data('id_del');
        var id_string = $(this).data('id_string');
        var allProducts = id_string.split('/');
        var newArr = allProducts.splice(0, allProducts.length - 1);
        for (let index = 0; index < newArr.length; index++) {
            const element = newArr[index];
            if (id == element) {
                $("#code_" + id).attr("contenteditable", false);
                $("#name_" + id).attr("contenteditable", false);
                $("#price_" + id).attr("contenteditable", false);
                $("#quantity_" + id).attr("contenteditable", false);
                $("#code_" + id).css("background-color", "");
                $("#name_" + id).css("background-color", "");
                $("#price_" + id).css("background-color", "");
                $("#quantity_" + id).css("background-color", "");
                $("#action_" + id).css("background-color", "");
                $("#update_" + id).css({
                    "display": "block"
                });
                $("#delete_" + id).css({
                    "display": "block"
                });
                $("#save_" + id).css({
                    "display": "none"
                });
                $("#cancel_" + id).css({
                    "display": "none"
                });
            } else {
                $("#update_" + element).css({
                    "display": "block"
                });
                $("#delete_" + element).css({
                    "display": "block"
                });
                $("#update_" + element).attr("disabled", false);
                $("#delete_" + element).attr("disabled", false);
                $("#save_" + element).css({
                    "display": "none"
                });
                $("#cancel_" + element).css({
                    "display": "none"
                });
            }
        }
        fetch_data();
    });
});