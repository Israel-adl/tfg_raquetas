var boton_carrito = document.querySelector("#boton-carrito");
var carrito_desplegable = document.querySelector(".carrito_desplegable");
console.log(boton_carrito)
boton_carrito.addEventListener("click",()=>{
    carrito_desplegable.classList.toggle('oculto')
})

function anadir(id_compra,precio) {
    console.log("se ha añadido al carrito el articulo con id == ",id_compra);
    var itemCarrito = document.createElement("div");
    var precioItem = document.createElement("span");
    precioItem.innerHTML = precio+"€";
    itemCarrito.appendChild(precioItem);
    itemCarrito.innerHTML += "articulo id "+id_compra;

    carrito_desplegable.appendChild(itemCarrito);
}
