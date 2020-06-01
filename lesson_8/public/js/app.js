// Открытие/закрытие корзины при клике на кнопку.
const basketBtn = document.querySelector('.icon-cart');
const tbl = document.querySelector('.cart-block');

basketBtn.addEventListener('click', function(){
    tbl.classList.toggle('invisible');
});

function addProduct(id) {
    $.ajax({
        type: 'POST',
        url: '../public/cart.php',
        data: 'id='+id
    });
}

function delProduct(id) {
    alert("chto to ne tak")
    $.ajax({
        type: 'POST',
        url: '../public/cart.php',
        data: 'del-id='+id
    });
}