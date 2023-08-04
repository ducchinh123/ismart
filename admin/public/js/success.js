
var listNumOrder = document.querySelectorAll(".num_order");

for (let index = 0; index < listNumOrder.length; index++) {

    setInterval(function () {
        listNumOrder[index].classList.toggle("active-text");
    }, 800);


}