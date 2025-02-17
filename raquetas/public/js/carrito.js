var boton_carrito = document.querySelector("#boton-carrito");
var carrito_desplegable = document.querySelector(".carrito_desplegable");
var listaCarrito = document.querySelector(".carrito_desplegable ul");
console.log(boton_carrito)
boton_carrito.addEventListener("click",()=>{
    carrito_desplegable.classList.toggle('oculto')
})

function anadir(id_compra,precio,imagen) {
    console.log("se ha añadido al carrito el articulo con id == ",id_compra);
    var htmlContent = `
                <li>
                <div class="divCarro">
                    <img width="30px" height="30px" src="${imagen}" />
                    <span>Nombre articulo: ${id_compra}</span>
                    <span>Precio:${precio}</span>
                    <button onclick="eliminarCarro(this)" style="">X</button>
                </div>
            </li>
    `;

    listaCarrito.innerHTML += htmlContent;
    // var itemCarrito = document.createElement("div");
    // var precioItem = document.createElement("span");
    // precioItem.innerHTML = precio+"€";
    // itemCarrito.appendChild(precioItem);
    // itemCarrito.innerHTML += "articulo id "+id_compra;

    // carrito_desplegable.appendChild(itemCarrito);
}


function eliminarCarro(param) {

    console.log(param.parentNode.parentNode.remove())
    
}