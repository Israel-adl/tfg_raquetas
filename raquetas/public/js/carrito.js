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




// Inicializar Cart.js
var cart = new CartJS.init();

// Agregar productos al carrito
document.querySelectorAll(".agregar-carrito").forEach((boton) => {
    boton.addEventListener("click", function () {
        let producto = {
            id: this.getAttribute("data-id"),
            name: this.getAttribute("data-name"),
            price: parseFloat(this.getAttribute("data-price")),
            quantity: 1,
        };

        cart.add(producto);
        actualizarCarrito();
    });
});

// Función para actualizar el carrito en pantalla
function actualizarCarrito() {
    let carritoContainer = document.getElementById("carrito");
    carritoContainer.innerHTML = "";

    cart.items.forEach((item, index) => {
        let itemHTML = `
            <div>
                <p>${item.name} - €${item.price} x ${item.quantity}</p>
                <button class="incrementar" data-index="${index}">+</button>
                <button class="decrementar" data-index="${index}">-</button>
                <button class="eliminar" data-index="${index}">Eliminar</button>
            </div>
        `;
        carritoContainer.innerHTML += itemHTML;
    });

    // Eventos para modificar cantidades y eliminar productos
    document.querySelectorAll(".incrementar").forEach((boton) => {
        boton.addEventListener("click", function () {
            let index = this.getAttribute("data-index");
            cart.items[index].quantity++;
            actualizarCarrito();
        });
    });

    document.querySelectorAll(".decrementar").forEach((boton) => {
        boton.addEventListener("click", function () {
            let index = this.getAttribute("data-index");
            if (cart.items[index].quantity > 1) {
                cart.items[index].quantity--;
            } else {
                cart.items.splice(index, 1);
            }
            actualizarCarrito();
        });
    });

    document.querySelectorAll(".eliminar").forEach((boton) => {
        boton.addEventListener("click", function () {
            let index = this.getAttribute("data-index");
            cart.items.splice(index, 1);
            actualizarCarrito();
        });
    });
}