var boton_carrito = document.querySelector("#boton-carrito");
var carrito_desplegable = document.querySelector(".carrito_desplegable");
var listaCarrito = document.querySelector(".carrito_desplegable ul");

var carrito = {
    compras:[]
};
if (localStorage.getItem("compras")) {
    console.log(localStorage.getItem("compras"))
    carrito.compras = obtenerDeLocalStorage("compras")
}
actualizarCarroAhora();
console.log(boton_carrito)
boton_carrito.addEventListener("click",()=>{
    carrito_desplegable.classList.toggle('oculto')
})
function restarCarrito(posArray,id_compra) {

    if (carrito.compras[posArray].cantidad > 1) {
        carrito.compras[posArray].cantidad--
    }
    actualizarCarroAhora();
}
function anadirCarrito(posArray,id_compra) {

    carrito.compras[posArray].cantidad++
    actualizarCarroAhora();
}
function anadir(id_compra,precio,imagen) {

    var positionArray = carrito.compras.push({
       id: id_compra,
       precio: precio,
       imagen:imagen,
       cantidad: 1
    });
    console.log("se ha añadido al carrito el articulo con id == ",id_compra);
    actualizarCarroAhora();
}
function guardarEnLocalStorage(clave, array) {
    if (Array.isArray(array)) {
        localStorage.setItem(clave, JSON.stringify(array));
    } else {
        console.error("El valor proporcionado no es un array.");
    }
}
function obtenerDeLocalStorage(clave) {
    let datos = localStorage.getItem(clave);
    return datos ? JSON.parse(datos) : [];
}

function actualizarCarroAhora(){
    console.log(carrito);
    let compras = carrito.compras
    compras.forEach((element,index) => {
        // console.log(element.id)
        if (document.querySelector(".buttonAnadir_"+element.id)) {
            
      
        let elemento = document.querySelector(".buttonAnadir_"+element.id);
        if (element.cantidad != -1) {
            elemento.disabled = true;
            elemento.innerHTML = "Añadido"
            elemento.style.backgroundColor = "red";
        }else{
            elemento.disabled = false;
            elemento.innerHTML = "Añadir"
            elemento.style.backgroundColor = "rgb(255, 199, 94)";
            compras.splice(index,1)
        }
    }
    });

    console.log(compras)
    carrito.compras = compras
    guardarEnLocalStorage("compras",compras);

    var contenido = "";
    carrito.compras.forEach((element,index) => {
        console.log(index)
        contenido += `
        <li>
        <div class="divCarro">
            <img width="30px" height="30px" src="${element.imagen}" />
            <span>Nombre articulo: ${element.id}</span>
            <span>Precio:${element.precio}</span>
            <span class='artCart_${element.id}'>Cantidad:${element.cantidad}</span>
            <button class="eliminarDelCarro" onclick="eliminarCarro(this,${index},${element.id})" style="">X</button>
            <button onclick="anadirCarrito(${index},${element.id})">+</button>
            <button onclick="restarCarrito(${index},${element.id})">-</button>
        </div>
    </li>
`;
    });
    listaCarrito.innerHTML = contenido;


    let total = carrito.compras.reduce((acumulador, item) => {
        return acumulador + (parseFloat(item.precio) * item.cantidad);
    }, 0);
    
    console.log("Total a pagar:", total.toFixed(2));
    var precioTotal = document.querySelector(".precioTotal")
    precioTotal.innerHTML = `${total.toFixed(2)}€`

}
function eliminarCarro(elemento,posArray,id_compra) {
    console.log()
    carrito.compras[posArray].cantidad = -1;
    console.log(elemento.parentNode.parentNode.remove())
    actualizarCarroAhora();
}