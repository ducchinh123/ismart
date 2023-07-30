$(document).ready(function () {

    $(".search-prod").on("input", function () {

        var title = $(this).val();

        $.ajax({

            url: '?mod=home&action=showResult',
            method: 'POST',
            data: { title: title },
            dataType: 'json',
            success: function (data) {

                var htmls = data.map(item => {

                    return ` <li>
                    <div class="item-prod clearfix">

                        <a href="san-pham/${item.slug}.${item.id}.${item.id_cate_prod}.html" class="img-prod"><img src="admin/${item.main_img}" alt=""></a>
                        <div class="info_right">
                            <a href="san-pham/${item.slug}.${item.id}.${item.id_cate_prod}.html">${item.name}</a>
                            <span>${item.price_new}</span>
                        </div>


                    </div>
                </li>`;

                }).join();


                document.querySelector("#list_result").innerHTML = htmls;


            },
            error: function (xhr, ajaxOptions, thrownError) {

                alert(xhr.status);
                alert(thrownError);
            }
        })
    })
})