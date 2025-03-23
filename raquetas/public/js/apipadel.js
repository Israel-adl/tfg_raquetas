function fetchWithToken(url, method = 'GET', token, body = null) {
    const headers = {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${token}`
    };

    const options = {
        method,
        headers
    };

    if (body) {
        options.body = JSON.stringify(body);
    }

    return fetch(url, options)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error: ${response.status} ${response.statusText}`);
            }
            return response.json();
        })
        .catch(error => console.error('Fetch error:', error));
}
var partidos = document.querySelector(".partidos");
fetchWithToken('https://fantasypadeltour.com/api/matches','GET','cdBXvtrxhyr11dQAoGbi8WRu2veLfysg2Wzm7iLH0d4c19f2')
.then(data => {
    console.log(data)

    data['data'].forEach((element, index) => {
        if (index < 6) {
        let tarjeta = document.createElement("div");
        let jugadores = document.createElement("div");
        let fecha = document.createElement("div");
        let equipos = document.createElement("div");
        tarjeta.classList.add("tarjetaPartidos");
        let teams = element.name.split("vs");
        jugadores.innerHTML = `<b>${teams[0]}</b> <br><br> VS <br><br> <b>${teams[1]}</b>`;
        fecha.innerHTML = "Fecha: " + element.played_at;
        tarjeta.appendChild(jugadores);
        tarjeta.appendChild(fecha);
        partidos.appendChild(tarjeta)
    }
    });
  


})