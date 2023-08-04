$(document).ready(function () {


    $(".num-order").change(function () {

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

                $("#sub_total-" + dataSTTS.id).text(data.sub_total);
                $("#total-price span").text(data.total);
                document.querySelector("#num").innerHTML = data.num_order;
                document.querySelector(".desc span").innerHTML = data.num_order;
                document.querySelector(".price-box").innerHTML = data.total;

            },
            error: function (xhr, ajaxOptions, thrownError) {

                alert(xhr.status);
                alert(thrownError);

            }


        })


    })
})
