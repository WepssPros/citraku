const kecamatanApiUrl = "http://88.222.215.154/api/kecamatan";
const kelurahanApiUrl = "http://88.222.215.154/api/kelurahan"; // URL API untuk kelurahan
const rtApiUrl = "http://88.222.215.154/api/rt"; // URL API untuk RT

// API CITRA

// Inisialisasi peta
var map = L.map("jambi-map").setView([-1.6, 103.6], 15);

// Menambahkan layer Google Maps
var baseMaps = {
    "Google Street": L.tileLayer(
        "https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}",
        {
            maxZoom: 20,
            subdomains: ["mt0", "mt1", "mt2", "mt3"],
        }
    ),
    "Google Satellite": L.tileLayer(
        "https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}",
        {
            maxZoom: 20,
            subdomains: ["mt0", "mt1", "mt2", "mt3"],
        }
    ),
    "Google Hybrid": L.tileLayer(
        "https://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}",
        {
            maxZoom: 20,
            subdomains: ["mt0", "mt1", "mt2", "mt3"],
        }
    ),
    OpenStreetMap: L.tileLayer(
        "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
        {
            maxZoom: 19,
            attribution: "© OpenStreetMap",
        }
    ),
};

// Layer peta default
baseMaps["OpenStreetMap"].addTo(map);

// Mengatur maksimum zoom level
map.setMaxZoom(15); // Atur batas maksimum zoom out
map.setMinZoom(10); // Atur batas minimum zoom in jika diperlukan

// Deklarasi array REYHAN HARUS INGAT
const rTPolygons = [];
const kelurahanPolygons = [];
const kelurahanPolylines = [];

// Fungsi untuk menangani scroll zoom hanya di area peta
let isCtrlPressed = false;

window.addEventListener("keydown", function (e) {
    if (e.ctrlKey) {
        isCtrlPressed = true;
    }
});

window.addEventListener("keyup", function (e) {
    if (e.key === "Control") {
        isCtrlPressed = false;
    }
});

// Mencegah perilaku scroll default
map.scrollWheelZoom.disable(); // Nonaktifkan zoom dengan scroll

// Event listener untuk mouse wheel
map.getContainer().addEventListener("wheel", function (e) {
    if (isCtrlPressed) {
        e.preventDefault(); // Cegah scroll halaman

        if (e.deltaY < 0) {
            map.zoomIn(); // Zoom in
        } else {
            map.zoomOut(); // Zoom out
        }
    }
});

// Menambahkan kontrol layer dengan tampilan sederhana
var layerControl = L.control({ position: "topright" });

layerControl.onAdd = function (map) {
    var div = L.DomUtil.create("div", "leaflet-control-layers");

    for (var key in baseMaps) {
        // Buat elemen untuk setiap layer
        var imgSrc =
            key === "Google Street"
                ? "https://upload.wikimedia.org/wikipedia/commons/f/f6/Street_View_logo.png"
                : key === "Google Satellite"
                ? "https://upload.wikimedia.org/wikipedia/commons/f/f6/Street_View_logo.png"
                : key === "Google Hybrid"
                ? "https://upload.wikimedia.org/wikipedia/commons/f/f6/Street_View_logo.png"
                : "https://upload.wikimedia.org/wikipedia/commons/f/f6/Street_View_logo.png";

        var label = L.DomUtil.create("label");
        label.innerHTML = `<img src="${imgSrc}" width="30" height="30" title="${key}" style="cursor:pointer;">`;
        label.onclick = (function (layer) {
            return function () {
                // Hapus layer sebelumnya
                map.eachLayer(function (layer) {
                    if (layer instanceof L.TileLayer) {
                        map.removeLayer(layer);
                    }
                });
                // Tambahkan layer yang diklik
                baseMaps[layer].addTo(map);
            };
        })(key);

        div.appendChild(label);
    }

    return div;
};

layerControl.addTo(map);

// UNTUK RT
// Ambil data RT dari API
fetch(rtApiUrl)
    .then((response) => response.json())
    .then((data) => {
        data.forEach((rt) => {
            const name = rt.nomor;
            const id = rt.id;
            const color = rt.color;

            try {
                const geojson = JSON.parse(rt.koordinat);

                // Memeriksa apakah GeoJSON mengandung koordinat
                if (
                    geojson &&
                    geojson.coordinates &&
                    geojson.coordinates.length > 0
                ) {
                    let coordinates = [];

                    // Jika ini adalah Polygon
                    if (geojson.type === "Polygon") {
                        coordinates.push(
                            geojson.coordinates[0].map((coord) => ({
                                lat: coord[1],
                                lng: coord[0],
                            }))
                        );
                    }
                    // Jika ini adalah MultiPolygon
                    else if (geojson.type === "MultiPolygon") {
                        geojson.coordinates.forEach((polygon) => {
                            coordinates.push(
                                polygon[0].map((coord) => ({
                                    lat: coord[1],
                                    lng: coord[0],
                                }))
                            );
                        });
                    }

                    // Membuat layer RT dengan warna dari database
                    if (coordinates.length > 0) {
                        createRTLayer(name, coordinates, id, color);
                    } else {
                        console.warn(`No valid coordinates for RT: ${name}`);
                    }
                } else {
                    console.warn(`No coordinates found for RT: ${name}`);
                }
            } catch (error) {
                console.error(`Error parsing GeoJSON for RT ${name}:`, error);
            }
        });

        // Setelah membuat semua polygons, atur bounds
        if (rTPolygons.length > 0) {
            const bounds = L.latLngBounds();
            rTPolygons.forEach((polygon) => {
                bounds.extend(polygon.getBounds());
            });
            map.fitBounds(bounds); // Sesuaikan peta agar muat dengan semua polygon
        } else {
            console.warn("No RT polygons available to fit bounds");
        }
    })
    .catch((error) => {
        console.error("Error fetching RT data:", error);
    });

// Fungsi untuk membuat layer RT dan menambahkannya ke peta
function createRTLayer(name, coordinates, id, color) {
    const polygon = L.polygon(coordinates, {
        color: color || "blue", // Warna dari database atau default
        fillOpacity: 0.5,
    }).addTo(map);

    polygon.on("mouseover", function () {
        if (map.getZoom() < 15) {
            // Cek jika zoom level kurang dari 15
            polygon.setStyle({
                color: color || "blue", // Ubah warna polygon saat hover
                fillOpacity: 0.6, // Agak transparan lebih rendah
                weight: 3, // Tebalkan garis polygon
            });
        }
    });

    polygon.on("mouseout", function () {
        if (map.getZoom() < 15) {
            // Cek jika zoom level kurang dari 15
            polygon.setStyle({
                color: color || "blue", // Kembalikan warna polygon saat mouse keluar
                fillOpacity: 0.5, // Kembalikan transparansi
                weight: 1, // Kembalikan ketebalan garis ke normal
            });
        }
    });

    // Event click untuk RT
    polygon.on("click", function () {
        map.fitBounds(polygon.getBounds());
        $("#rtModal" + id).modal("show"); // Pastikan modal ini ada di HTML
    });

    polygon.bindPopup(` ${name}`); // Menampilkan nama RT di popup
    rTPolygons.push(polygon); // Simpan polygon ke array untuk dipakai pada fitBounds
}
// UNTUK RT

// UNtuk Kelurahan
fetch(kelurahanApiUrl)
    .then((response) => response.json()) // Mengubah respons menjadi JSON
    .then((data) => {
        // Mengiterasi data kelurahan dan membuat layer
        data.forEach((kelurahan) => {
            const name = kelurahan.nama;
            const id = kelurahan.id;
            const color = kelurahan.color; // Warna default jika tidak ada
            const marker = kelurahan.marker;

            const geojson = JSON.parse(kelurahan.koordinat); // Parsing GeoJSON

            // Ambil koordinat dari GeoJSON (format GeoJSON menyimpan lng/lat)
            const coordinates = geojson.coordinates[0].map((coord) => ({
                lat: coord[1], // Leaflet memerlukan [lat, lng], GeoJSON [lng, lat]
                lng: coord[0],
            }));

            // Membuat polygon kelurahan
            createKelurahanLayer(name, coordinates, id, color, marker);
        });

        // Jika ingin memfokuskan peta berdasarkan semua kelurahan, Anda bisa atur bounds peta
        var bounds = L.latLngBounds();
        kelurahanPolygons.forEach(function (polygon) {
            bounds.extend(polygon.getBounds());
        });
        map.fitBounds(bounds);
    })
    .catch((error) => {
        console.error("Error fetching kelurahan data:", error);
    });
function createKelurahanLayer(name, coordinates, id, color, marker) {
    // Pastikan warna valid
    const polygonColor = color ? color.trim() : "green"; // Menggunakan color dari parameter, default ke green

    // Membuat polygon kelurahan
    const polygon = L.polygon(
        coordinates.map((coord) => [coord.lat, coord.lng]),
        {
            color: polygonColor, // Menggunakan warna dari parameter
            weight: 2,
            opacity: 0.65,
            fillOpacity: 0.3,
            interactive: true,
        }
    ).addTo(map);

    polygon.bringToFront();

    // Membuat garis polyline untuk batas kelurahan
    const polyline = L.polyline(
        coordinates.map((coord) => [coord.lat, coord.lng]),
        {
            color: "white",
            weight: 1,
            opacity: 1,
        }
    ).addTo(map);

    // Menentukan centroid polygon menggunakan library Leaflet
    const centroid = polygon.getBounds().getCenter(); // Mendapatkan titik tengah dari polygon

    // Cek apakah marker harus ditampilkan
    if (marker === 1) {
        // Pastikan marker hanya ditambahkan jika bernilai true
        // Membuat ikon dari asset gambar
        const customIcon = L.icon({
            iconUrl: "http://88.222.215.154/frontend/img/logocitraku.png",
            iconSize: [25, 25], // Ukuran ikon (lebar, tinggi) dalam pixel
            iconAnchor: [12.5, 25], // Titik yang akan digunakan untuk mengaitkan ikon dengan marker
            popupAnchor: [0, -25], // Titik di mana tooltip muncul
        });

        // Membuat marker di pusat polygon menggunakan icon custom
        const kelurahanMarker = L.marker([centroid.lat, centroid.lng], {
            icon: customIcon,
        }).addTo(map);

        // Menambahkan tooltip yang akan muncul saat mouse melayang di atas marker
        kelurahanMarker.bindTooltip(name, {
            permanent: false, // Tooltip hanya muncul saat hover
            direction: "top", // Arah tooltip
            className: "kelurahan-tooltip", // Kelas untuk styling tooltip
        });

        // Event click untuk marker, memunculkan modal yang sama
        kelurahanMarker.on("click", function () {
            map.fitBounds(polygon.getBounds());
            $("#kelurahanModal" + id).modal("show");
        });
    }

    // Event hover untuk polygon kelurahan
    polygon.on("mouseover", function () {
        if (map.getZoom() < 15) {
            polyline.setStyle({ color: "blue" });
            polygon.setStyle({ color: polygonColor, fillOpacity: 0.5 }); // Gunakan polygonColor
        }
    });

    polygon.on("mouseout", function () {
        if (map.getZoom() < 15) {
            polyline.setStyle({ color: "white" });
            polygon.setStyle({ color: polygonColor, fillOpacity: 0.3 }); // Gunakan polygonColor
        }
    });

    // Event click untuk polygon, menampilkan modal informasi
    polygon.on("click", function () {
        map.fitBounds(polygon.getBounds());
        $("#kelurahanModal" + id).modal("show");
    });

    // Simpan polygon ke array untuk referensi lebih lanjut
    kelurahanPolygons.push(polygon);
}
//TUTUP KELURAHGN REHAN

// --------------------------------------------------------------------------------------------//
// OPTION MENU MENU
// URL untuk API kawasan kumuh
const kawasanKumuhApiUrl = "http://88.222.215.154/api/kumuh";

// Array untuk menyimpan polygon kawasan kumuh
const kawasanKumuhPolygons = [];

// Ambil data Kawasan Kumuh dari API
fetch(kawasanKumuhApiUrl)
    .then((response) => response.json())
    .then((data) => {
        data.forEach((kawasan) => {
            const name = kawasan.nomor; // Mengambil nama kawasan
            const id = kawasan.id; // ID kawasan
            const color = kawasan.color; // Warna kawasan

            const geojson = JSON.parse(kawasan.koordinat); // Parsing GeoJSON

            // Memeriksa apakah GeoJSON mengandung koordinat
            if (
                geojson &&
                geojson.coordinates &&
                geojson.coordinates.length > 0
            ) {
                let coordinates = [];

                // Jika ini adalah Polygon
                if (geojson.type === "Polygon") {
                    coordinates.push(
                        geojson.coordinates[0].map((coord) => ({
                            lat: coord[1],
                            lng: coord[0],
                        }))
                    );
                }
                // Jika ini adalah MultiPolygon
                else if (geojson.type === "MultiPolygon") {
                    geojson.coordinates.forEach((polygon) => {
                        coordinates.push(
                            polygon[0].map((coord) => ({
                                lat: coord[1],
                                lng: coord[0],
                            }))
                        );
                    });
                }

                // Membuat layer Kawasan Kumuh dengan warna dari database
                if (coordinates.length > 0) {
                    createKawasanKumuhLayer(name, coordinates, id, color);
                } else {
                    console.warn(`No valid coordinates for Kawasan: ${name}`);
                }
            } else {
                console.warn(`No coordinates found for Kawasan: ${name}`);
            }
        });

        // Setelah membuat semua polygons, atur bounds
        if (kawasanKumuhPolygons.length > 0) {
            const bounds = L.latLngBounds();
            kawasanKumuhPolygons.forEach((polygon) => {
                bounds.extend(polygon.getBounds());
            });
            map.fitBounds(bounds); // Sesuaikan peta agar muat dengan semua polygon
        } else {
            console.warn("No Kawasan Kumuh polygons available to fit bounds");
        }
    })
    .catch((error) => {
        console.error("Error fetching Kawasan Kumuh data:", error);
    });

// Fungsi untuk membuat layer Kawasan Kumuh dan menambahkannya ke peta
function createKawasanKumuhLayer(name, coordinates, id, color) {
    const polygon = L.polygon(coordinates, {
        color: color || "yellow", // Warna dari database atau default
        fillOpacity: 0.0,
    }).addTo(map);

    polygon.on("mouseover", function () {
        polygon.setStyle({
            color: color || "yellow", // Ubah warna polygon saat hover
            fillOpacity: 0.0, // Agak transparan lebih rendah
            weight: 3, // Tebalkan garis polygon
        });
    });

    polygon.on("mouseout", function () {
        polygon.setStyle({
            color: color || "yellow", // Kembalikan warna polygon saat mouse keluar
            fillOpacity: 0.5, // Kembalikan transparansi
            weight: 1, // Kembalikan ketebalan garis ke normal
        });
    });

    // Event click untuk Kawasan Kumuh
    polygon.on("click", function () {
        map.fitBounds(polygon.getBounds());
        $("#rtModal" + id).modal("show"); // Pastikan modal ini ada di HTML
    });

    polygon.bindPopup(` ${name}`); // Menampilkan nama Kawasan di popup
    kawasanKumuhPolygons.push(polygon); // Simpan polygon ke array untuk dipakai pada fitBounds
}

// Memastikan kontrol Kawasan Kumuh sudah terintegrasi
const controlKawasanKumuh = L.Control.extend({
    options: {
        position: "topright", // Posisi kontrol di peta
    },

    onAdd: function (map) {
        const div = L.DomUtil.create("div", "custom-control");
        div.innerHTML = `
            <div class="layer-control-card">
                <div class="layer-control-header" id="jenisPetaHeader">
                    <p>Jenis Peta</p>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="layer-control-body" id="jenisPetaBody" style="display: none;">
                    <label>
                        <input type="checkbox" id="toggleKecamatan" checked>
                        <span>Batas Administrasi Kecamatan</span>
                    </label>
                    <label>
                        <input type="checkbox" id="toggleKelurahan" checked>
                        <span>Batas Administrasi Kelurahan</span>
                    </label>
                </div>
            </div>

            <div class="layer-control-card">
                <div class="layer-control-header" id="petaTematikHeader">
                    <p>Peta Tematik</p>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="layer-control-body" id="petaTematikBody" style="display: none;">
                    <label>
                        <input type="checkbox" id="toggleKawasanKumuh">
                        <span>Kawasan Kumuh</span>
                    </label>
                </div>
            </div>
        `;

        // Menghindari propagasi event click
        L.DomEvent.disableClickPropagation(div);

        // Event listener untuk checkbox Kawasan Kumuh
        div.querySelector("#toggleKawasanKumuh").addEventListener(
            "change",
            (event) => {
                const isKawasanKumuhVisible = event.target.checked;
                if (isKawasanKumuhVisible) {
                    kawasanKumuhPolygons.forEach((polygon) => {
                        map.addLayer(polygon);
                    });
                } else {
                    kawasanKumuhPolygons.forEach((polygon) => {
                        map.removeLayer(polygon);
                    });
                }
            }
        );

        // Event listener untuk checkbox Kelurahan
        div.querySelector("#toggleKelurahan").addEventListener(
            "change",
            (event) => {
                const isKelurahanVisible = event.target.checked;
                if (isKelurahanVisible) {
                    kelurahanPolygons.forEach((polygon) => {
                        map.addLayer(polygon);
                    });
                } else {
                    kelurahanPolygons.forEach((polygon) => {
                        map.removeLayer(polygon);
                    });
                }
            }
        );

        // Event listener untuk checkbox Kecamatan
        div.querySelector("#toggleKecamatan").addEventListener(
            "change",
            (event) => {
                const isKecamatanVisible = event.target.checked;
                if (isKecamatanVisible) {
                    kecPolygons.forEach((polygon) => {
                        map.addLayer(polygon);
                    });
                } else {
                    kecPolygons.forEach((polygon) => {
                        map.removeLayer(polygon);
                    });
                }
            }
        );

        return div;
    },
});
// Tambahkan kontrol ke peta
map.addControl(new controlKawasanKumuh());
// Event listener untuk header Jenis Peta
document
    .getElementById("jenisPetaHeader")
    .addEventListener("click", function () {
        const body = document.getElementById("jenisPetaBody");
        const icon = this.querySelector(".toggle-icon");

        if (body.style.display === "none") {
            body.style.display = "block"; // Menampilkan body
            icon.textContent = "-"; // Ubah ikon menjadi minus
        } else {
            body.style.display = "none"; // Menyembunyikan body
            icon.textContent = "+"; // Ubah ikon menjadi plus
        }
    });

// Event listener untuk header Peta Tematik
document
    .getElementById("petaTematikHeader")
    .addEventListener("click", function () {
        const body = document.getElementById("petaTematikBody");
        const icon = this.querySelector(".toggle-icon");

        if (body.style.display === "none") {
            body.style.display = "block"; // Menampilkan body
            icon.textContent = "-"; // Ubah ikon menjadi minus
        } else {
            body.style.display = "none"; // Menyembunyikan body
            icon.textContent = "+"; // Ubah ikon menjadi plus
        }
    });

const controlKelurahan = L.Control.extend({
    options: {
        position: "topright",
    },

    onAdd: function (map) {
        const div = L.DomUtil.create("div", "custom-control");
        div.innerHTML = `
            <div class="layer-control-card">
                <div class="layer-control-header" id="kelurahanHeader">
                    <p>Pilih Kawasan</p>
                    <span class="toggle-icon">+</span> <!-- Ikon toggle -->
                </div>
                <div class="layer-control-body" id="kelurahanBody" style="display: none; max-height: 300px; overflow-y: auto;">
               
                </div>
            </div>

        `;

        L.DomEvent.disableClickPropagation(div);

        // Mengambil data kelurahan dari API
        fetch(kelurahanApiUrl)
            .then((response) => response.json())
            .then((data) => {
                data.forEach((kelurahan) => {
                    const id = kelurahan.id;
                    const name = kelurahan.nama;
                    const color = kelurahan.color;
                    const geojson = JSON.parse(kelurahan.koordinat); // Ambil koordinat
                    const coordinates = geojson.coordinates[0].map((coord) => ({
                        lat: coord[1],
                        lng: coord[0],
                    }));

                    // Membuat polygon dan menyimpan ID kelurahan
                    const polygonColor = color ? color.trim() : "green"; // Menggunakan color dari parameter, default ke green

                    const polygon = L.polygon(
                        coordinates.map((coord) => [coord.lat, coord.lng]),
                        {
                            color: polygonColor, // Menggunakan warna dari parameter
                            weight: 2,
                            opacity: 0.65,
                            fillOpacity: 0.3,
                            interactive: true,
                        }
                    ).addTo(map);
                    const polyline = L.polyline(
                        coordinates.map((coord) => [coord.lat, coord.lng]),
                        {
                            color: "white",
                            weight: 1,
                            opacity: 1,
                        }
                    ).addTo(map);

                    polygon.on("mouseover", function () {
                        if (map.getZoom() < 15) {
                            polyline.setStyle({ color: "blue" });
                            polygon.setStyle({
                                color: polygonColor,
                                fillOpacity: 0.5,
                            }); // Gunakan polygonColor
                        }
                    });

                    polygon.on("mouseout", function () {
                        if (map.getZoom() < 15) {
                            polyline.setStyle({ color: "white" });
                            polygon.setStyle({
                                color: polygonColor,
                                fillOpacity: 0.3,
                            }); // Gunakan polygonColor
                        }
                    });

                    polygon.on("click", function () {
                        map.fitBounds(polygon.getBounds());
                        $("#kelurahanModal" + id).modal("show");
                    });

                    polygon.kelurahanId = id; // Menyimpan ID kelurahan di polygon
                    kelurahanPolygons.push(polygon); // Menyimpan polygon ke array

                    const label = document.createElement("label");
                    label.innerHTML = `
                        <input type="checkbox" class="toggleKelurahan" data-id="${id}">
                        <span>${name}</span>
                    `;
                    div.querySelector("#kelurahanBody").appendChild(label);

                    // Event listener untuk checkbox kelurahan
                    label
                        .querySelector(".toggleKelurahan")
                        .addEventListener("change", (event) => {
                            const kelurahanId =
                                event.target.getAttribute("data-id");
                            const isChecked = event.target.checked;

                            // Temukan polygon berdasarkan ID
                            const polygon = kelurahanPolygons.find(
                                (p) =>
                                    p.kelurahanId &&
                                    p.kelurahanId.toString() === kelurahanId
                            );

                            if (!polygon) {
                                console.error(
                                    `Polygon tidak ditemukan untuk ID: ${kelurahanId}`
                                );
                                console.log(
                                    "Isi kelurahanPolygons:",
                                    kelurahanPolygons
                                ); // Debug log
                                return; // Jika tidak ada, keluar dari fungsi
                            }

                            // Mengatur gaya polygon
                            if (isChecked) {
                                map.addLayer(polygon);
                                polygon.setStyle({
                                    color: "blue", // Set warna polygon menjadi biru
                                    fillOpacity: 0.5,
                                });
                            } else {
                                map.removeLayer(polygon);
                                polygon.setStyle({
                                    color: polygonColor,
                                    weight: 2,
                                    opacity: 0.65,
                                    fillOpacity: 0.5,
                                }); // Kembalikan ke default
                            }
                        });
                });
            });

        return div;
    },
});

// Tambahkan kontrol ke peta
map.addControl(new controlKelurahan());
function toggleCollapse(headerId, bodyId) {
    const header = document.getElementById(headerId);
    const body = document.getElementById(bodyId);
    const icon = header.querySelector(".toggle-icon");

    header.addEventListener("click", () => {
        const isVisible = body.style.display === "block";
        body.style.display = isVisible ? "none" : "block"; // Mengubah tampilan body
        icon.textContent = isVisible ? "+" : "-"; // Mengubah ikon saat diklik
    });
}
// Panggil fungsi untuk kelurahan
toggleCollapse("kelurahanHeader", "kelurahanBody");
