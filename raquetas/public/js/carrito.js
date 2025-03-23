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
function anadir(id_compra,precio,imagen,nombre) {

    var positionArray = carrito.compras.push({
       id: id_compra,
       nombre: nombre,
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
        if (element.cantidad != -1) {
            
    
        contenido += `
        <li>
        <div class="divCarro">
            <img width="30px" height="30px" src="${element.imagen}" />
            <span style="font-weight:bold;"> ${element.nombre}</span>
            <span>Precio:<b>${element.precio}</b></span>
            <span class='artCart_${element.id}'>Cantidad:<b>${element.cantidad}</b></span>
            <button class="eliminarDelCarro" onclick="eliminarCarro(this,${index},${element.id})" style="">X</button>
            <div class="controlsCarrito">
                <button onclick="anadirCarrito(${index},${element.id})">+</button>
                <button onclick="restarCarrito(${index},${element.id})">-</button>
            </div>
        </div>
    </li>
`;
}
    });
    listaCarrito.innerHTML = contenido;


    let total = carrito.compras.reduce((acumulador, item) => {
        if (item.cantidad != -1) {
            return acumulador + (parseFloat(item.precio) * item.cantidad); 
        }else{
            return acumulador;
        }
    }, 0);
    
    console.log("Total a pagar:", total.toFixed(2));
    var precioTotal = document.querySelector(".precioTotal")
    precioTotal.innerHTML = `Total: <span>${total.toFixed(2)}€</span>`

}
function eliminarCarro(elemento,posArray,id_compra) {
    console.log()
    carrito.compras[posArray].cantidad = -1;
    console.log(elemento.parentNode.parentNode.remove())
    actualizarCarroAhora();
}


function leerCarrito() {
    var tabla = document.querySelector('.tabla-crud-resumen');

    carrito.compras.forEach((element,index) => {
        console.log(element);
        let tr = document.createElement("tr");
        let tdNombre = document.createElement("td");
        tdNombre.innerHTML = element.nombre;
        let tdImagen = document.createElement("td");
        tdImagen.innerHTML = `<img src='${element.imagen}' width='50' />`;
        let tdCantidad = document.createElement("td");
        tdCantidad.innerHTML = element.cantidad;
        let tdPrecio = document.createElement("td");
        tdPrecio.innerHTML = element.precio;
        tr.appendChild(tdNombre);
        tr.appendChild(tdImagen);
        tr.appendChild(tdCantidad);
        tr.appendChild(tdPrecio);
        tabla.appendChild(tr);
    })
}

function hacerPedido(event,crsf) {
    event.preventDefault(); // Evita que el formulario se envíe de manera convencional

    // Obtener los datos del formulario
    const nombre = document.getElementById('nombre').value;
    const apellidos = document.getElementById('apellidos').value;
    const telefono = document.getElementById('telefono').value;
    const email = document.getElementById('email').value;
    const direccion = document.getElementById('direccion').value;
    const codigo_postal = document.getElementById('codigo_postal').value;
    const ciudad = document.getElementById('ciudad').value;
    const provincia = document.getElementById('provincia').value;
    const metodo_pago = document.getElementById('metodo_pago').value;
    const numero_tarjeta = document.getElementById('numero_tarjeta').value;
    const comentarios = document.getElementById('comentarios').value;

    // Crear un objeto con los datos de la compra
    const datosPedido = {
        nombre: nombre,
        apellidos: apellidos,
        telefono: telefono,
        email: email,
        direccion: direccion,
        codigo_postal: codigo_postal,
        ciudad: ciudad,
        provincia: provincia,
        metodo_pago: metodo_pago,
        numTarjeta: numero_tarjeta,
        comentarios: comentarios,
        carrito: carrito.compras // Enviar los artículos del carrito
    };

    // Obtener el CSRF Token
    const csrv = crsf;

    // Enviar los datos a la API para crear el pedido
    fetch("crear-pedido", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrv
        },
        body: JSON.stringify(datosPedido) // Enviar los datos del pedido como JSON
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Error en la solicitud: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        alert("Pedido creado exitosamente");
        alert(`Tu localizador es: ${data.localizador}`);
        location.href = `/perfil`;
        localStorage.removeItem('compras');
    })
    .catch(error => {
        console.error("Hubo un problema con la solicitud:", error);
    });
}