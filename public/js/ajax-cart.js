$(document).ready(function () {


    $("#num-order").change(function () {

        var dataSTTS = {

            id: $(this).attr('data-id'),
            num_order: $(this).val()
        };

        $.ajax({

            url: '?mod=carts&action=updateCart',
            method: 'POST',
            data: dataSTTS,
            dataType: 'json',
            success: function (data) {

                $("#sub_total").text(data.sub_total);
                $("#total-price span").text(data.total);
                document.querySelector("#num").innerHTML = data.num_order;

            },
            error: function (xhr, ajaxOptions, thrownError) {

                alert(xhr.status);
                alert(thrownError);

            }


        })


    })
})