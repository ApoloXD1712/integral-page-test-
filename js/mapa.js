$(document).ready(function() {
    var map = L.map('map').setView([6.162909, -75.602175], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([6.162909, -75.602175]).addTo(map)
        .bindPopup('Centro empresarial S48<br>Cl. 49 Sur #45a 300 Of. 1810<br>Envigado, Antioquia')
        .openPopup();
});