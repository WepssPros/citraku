const kecamatanApiUrl = "http://citraku.test/api/kecamatan";
const kelurahanApiUrl = "http://citraku.test/api/kelurahan"; // URL API untuk kelurahan
const rtApiUrl = "http://citraku.test/api/rt"; // URL API untuk kelurahan
fetch(kecamatanApiUrl)
    .then((response) => response.json()) // Mengubah respons menjadi JSON
    .then((data) => {
        // Mengiterasi data kecamatan dan membuat layer
        data.forEach((kecamatan) => {
            const id = kecamatan.id;
            const name = kecamatan.nama;

            // Parsing koordinat menjadi array objek
            const coordinates = JSON.parse(kecamatan.koordinat);

            // Membuat polygon kecamatan
            const kecPolygon = createKecamatanLayer(name, coordinates, id);
            kecPolygons.push(kecPolygon); // Menyimpan polygon kecamatan ke dalam array
        });

        // Mengatur bounds peta berdasarkan semua kecamatan
        var bounds = L.latLngBounds();
        kecPolygons.forEach(function (polygon) {
            bounds.extend(polygon.getBounds());
        });
        map.fitBounds(bounds);
    })
    .catch((error) => {
        console.error("Error fetching kecamatan data:", error);
    });

fetch(kelurahanApiUrl)
    .then((response) => response.json()) // Mengubah respons menjadi JSON
    .then((data) => {
        // Mengiterasi data kelurahan dan membuat layer
        data.forEach((kelurahan) => {
            const name = kelurahan.nama;
            const id = kelurahan.id;
            const color = kelurahan.color; // Warna default jika tidak ada

            const geojson = JSON.parse(kelurahan.koordinat); // Parsing GeoJSON

            // Ambil koordinat dari GeoJSON (format GeoJSON menyimpan lng/lat)
            const coordinates = geojson.coordinates[0].map((coord) => ({
                lat: coord[1], // Leaflet memerlukan [lat, lng], GeoJSON [lng, lat]
                lng: coord[0],
            }));

            // Membuat polygon kelurahan
            createKelurahanLayer(name, coordinates, id, color);
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

fetch(rtApiUrl)
    .then((response) => response.json())
    .then((data) => {
        // Mengiterasi data RT
        data.forEach((rt) => {
            const name = rt.nomor; // Mengambil nomor RT
            const id = rt.id; // Mengambil ID RT
            const color = rt.color; // Mengambil warna dari database

            try {
                const geojson = JSON.parse(rt.koordinat); // Parsing GeoJSON

                // Memastikan coordinates ada dan tidak kosong
                if (geojson.coordinates && geojson.coordinates.length > 0) {
                    const coordinates = geojson.coordinates[0].map((coord) => ({
                        lat: coord[1],
                        lng: coord[0],
                    }));

                    // Membuat polygon RT
                    createRTLayer(name, coordinates, id, color); // Menggunakan warna dari database
                } else {
                    console.warn(`No coordinates found for RT: ${name}`); // Peringatan jika tidak ada koordinat
                }
            } catch (error) {
                console.error(`Error parsing GeoJSON for RT ${name}:`, error);
            }
        });

        // Mengatur bounds peta berdasarkan RT
        const bounds = L.latLngBounds();
        rTPolygons.forEach((polygon) => {
            bounds.extend(polygon.getBounds());
        });
        map.fitBounds(bounds);
    })
    .catch((error) => {
        console.error("Error fetching RT data:", error);
    });

// batas fetch

const kecColor = {
    alambarajo: "#008000",
    kotabaru: "#004080",
    jelutung: "#4b0082",
    danausipin: "#0000ff",
    danauteluk: "#ffff00",
    telanaipura: "#80c000",
    pelayangan: "#ffd200",
    pasar: "#2600c1",
    jambitimur: "#ff5300",
    jambiselatan: "#ffa500",
    paalmerah: "#ff0000",
};
const kelurahan = {};
const rT = {};
const area = {};
const sungai = {};
const danau = {};

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

// Array untuk menyimpan polygon dan polyline
const rTPolygons = [];
const kelurahanPolygons = [];
const kelurahanPolylines = [];
var kecPolygons = [];
var kecPolylines = [];

// Mengambil data kecamatan dari API

// Fungsi untuk membuat polygon dan polyline Kecamatan
function createKecamatanLayer(name, coordinates, id) {
    // Membuat polygon untuk kecamatan
    var kecPolygon = L.polygon(
        coordinates.map((coord) => [coord.lat, coord.lng]),
        {
            color: kecColor[name] || "blue", // Warna berdasarkan kecColor
            weight: 2,
            opacity: 0.65,
            fillOpacity: 0.3,
        }
    ).addTo(map);

    // Membuat polyline untuk kecamatan
    var polyline = L.polyline(
        coordinates.map((coord) => [coord.lat, coord.lng]),
        {
            color: "white",
            weight: 1,
            opacity: 1,
        }
    ).addTo(map);

    // Event hover untuk polygon kecamatan
    kecPolygon.on("mouseover", function () {
        polyline.setStyle({ color: "blue" }); // Ubah warna polyline saat hover
    });

    kecPolygon.on("mouseout", function () {
        polyline.setStyle({ color: "white" }); // Kembalikan warna polyline saat mouse keluar
    });

    // Cek apakah kecamatan memiliki marker di kecMarker

    // Event click untuk menampilkan modal kecamatan
    kecPolygon.on("click", function () {
        $("#kecamatanModal" + id).modal("show"); // Menampilkan modal dengan ID spesifik
    });

    // Mengembalikan objek polygon
    return kecPolygon;
}

// Fungsi untuk membuat polygon dan polyline Kelurahan

// Mengambil data kelurahan dari API

// Fungsi untuk membuat layer polygon kelurahan
function createKelurahanLayer(name, coordinates, id, color) {
    // Pastikan warna valid
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

    polygon.bringToFront();

    const polyline = L.polyline(
        coordinates.map((coord) => [coord.lat, coord.lng]),
        {
            color: "white",
            weight: 1,
            opacity: 1,
        }
    ).addTo(map);

    // Menentukan centroid polygon untuk posisi marker
    const centroid = polygon.getBounds().getCenter();

    // Menambahkan label nama kelurahan di pusat polygon
    const marker = L.marker([centroid.lat, centroid.lng], {
        icon: L.divIcon({
            className: "kelurahan-label", // Tambahkan class untuk styling
            html: `<div style="color: black; font-weight: bold;"></div>`, // Menampilkan nama kelurahan
            iconSize: [30, 30], // Ukuran ikon
        }),
    }).addTo(map);

    // Menambahkan tooltip yang akan muncul saat mouse melayang di atas marker
    marker.bindTooltip(name, {
        permanent: false, // Tooltip hanya muncul saat hover
        direction: "top", // Arah tooltip
        className: "kelurahan-tooltip", // Kelas untuk styling tooltip
    });

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

    polygon.on("click", function () {
        map.fitBounds(polygon.getBounds());
        $("#kelurahanModal" + id).modal("show");
    });

    kelurahanPolygons.push(polygon);
}

// Fungsi untuk membuat polygon dan polyline RT

// Fungsi untuk membuat layer polygon RT
function createRTLayer(nomor, coordinates, id, color) {
    // Membuat polygon untuk RT
    const polygon = L.polygon(
        coordinates.map((coord) => [coord.lat, coord.lng]), // Mapping lat/lng
        {
            color: color || "yellow", // Gunakan color dari database, default ke yellow
            weight: 2,
            opacity: 0.65,
            fillOpacity: 0.3,
            interactive: true, // Pastikan polygon bisa di-klik
        }
    ).addTo(map);

    polygon.bringToFront(); // Memastikan RT di depan

    // Membuat polyline untuk RT
    const polyline = L.polyline(
        coordinates.map((coord) => [coord.lat, coord.lng]), // Mapping lat/lng
        {
            color: "white",
            weight: 1,
            opacity: 1,
        }
    ).addTo(map);

    // Menghitung titik centroid polygon
    const latLngs = polygon.getLatLngs()[0]; // Ambil koordinat polygon
    const centroid = latLngs.reduce(
        (acc, latLng) => {
            acc.lat += latLng.lat;
            acc.lng += latLng.lng;
            return acc;
        },
        { lat: 0, lng: 0 }
    );

    centroid.lat /= latLngs.length; // Rata-rata latitude
    centroid.lng /= latLngs.length; // Rata-rata longitude

    // Menambahkan label nomor RT di pusat polygon
    const marker = L.marker([centroid.lat, centroid.lng], {
        icon: L.divIcon({
            className: "rt-label", // Tambahkan class untuk styling
            html: `<div style="color: black; font-weight: bold;">&nbsp;</div>`, // Kosongkan label untuk marker
            iconSize: [30, 30], // Ukuran ikon
        }),
    }).addTo(map);

    // Menambahkan tooltip yang akan muncul saat mouse melayang di atas marker
    marker.bindTooltip(nomor, {
        permanent: false, // Tooltip hanya muncul saat hover
        direction: "top", // Arah tooltip
        className: "rt-tooltip", // Kelas untuk styling tooltip
    });

    // Event hover untuk polygon RT
    polygon.on("mouseover", function () {
        if (map.getZoom() < 15) {
            // Cek jika zoom level kurang dari 15
            polyline.setStyle({ color: color }); // Ubah warna polyline saat hover
            polygon.setStyle({ color: color, fillOpacity: 0.5 }); // Ubah warna polygon saat hover
        }
    });

    polygon.on("mouseout", function () {
        if (map.getZoom() < 15) {
            // Cek jika zoom level kurang dari 15
            polyline.setStyle({ color: "white" }); // Kembalikan warna polyline saat mouse keluar
            polygon.setStyle({ color: color || "blue", fillOpacity: 0.3 }); // Kembalikan warna polygon saat mouse keluar
        }
    });

    // Event click untuk RT
    polygon.on("click", function () {
        map.fitBounds(polygon.getBounds());
        $("#rtModal" + id).modal("show"); // Pastikan modal ini ada di HTML
    });

    // Menyimpan polygon RT ke dalam array rTPolygons
    rTPolygons.push(polygon);
}

// Memanggil fungsi untuk kelurahan
// Membuat layer untuk kecamatan, kelurahan, dan RT
function createLayers(kelurahan, rT, area) {
    // Loop untuk membuat layer kelurahan
    for (const [name, coordinates] of Object.entries(kelurahan)) {
        createKelurahanLayer(name, coordinates);
    }

    // Loop untuk membuat layer RT
    for (const [name, coordinates] of Object.entries(rT)) {
        const correspondingArea = area[name]; // Dapatkan area yang sesuai untuk RT
        if (correspondingArea) {
            createRTLayer(name, coordinates, correspondingArea);
        }
    }
}

// Event untuk memperbarui visibilitas polygon berdasarkan level zoom

// Fungsi untuk mengatur visibilitas berdasarkan zoom level
function updatePolygonVisibility() {
    const zoomLevel = map.getZoom();

    if (zoomLevel < 12) {
        // Tampilkan kecamatan, sembunyikan kelurahan dan RT
        kecPolygons.forEach((polygon) => {
            polygon.setStyle({ opacity: 1, fillOpacity: 0.3 }); // Kecamatan terlihat
            polygon.interactive = true; // Pastikan polygon dapat di-klik
            polygon.bringToBack(); // Pastikan kecamatan di belakang
        });
        kelurahanPolygons.forEach((polygon) => {
            polygon.setStyle({ opacity: 0, fillOpacity: 0 }); // Kelurahan tersembunyi
            polygon.interactive = false; // Nonaktifkan interaksi
        });
        rTPolygons.forEach((polygon) => {
            polygon.setStyle({ opacity: 0, fillOpacity: 0 }); // RT tersembunyi
            polygon.interactive = false; // Nonaktifkan interaksi
        });

        // Sembunyikan polyline kelurahan dan kecamatan
        kecPolylines.forEach((polyline) => {
            polyline.setStyle({ opacity: 0, weight: 0 }); // Sembunyikan polyline kecamatan
        });
        kelurahanPolylines.forEach((polyline) => {
            polyline.setStyle({ opacity: 0, weight: 0 }); // Sembunyikan polyline kelurahan
        });
    } else if (zoomLevel >= 12 && zoomLevel < 15) {
        // Tampilkan kelurahan, sembunyikan kecamatan dan RT
        kecPolygons.forEach((polygon) => {
            polygon.setStyle({ opacity: 0, fillOpacity: 0 }); // Kecamatan tersembunyi
            polygon.interactive = false; // Nonaktifkan interaksi
        });
        kelurahanPolygons.forEach((polygon) => {
            polygon.setStyle({ opacity: 1, fillOpacity: 0.3 }); // Kelurahan terlihat
            polygon.interactive = true; // Pastikan polygon dapat di-klik
            polygon.bringToFront(); // Pastikan kelurahan di depan
        });
        rTPolygons.forEach((polygon) => {
            polygon.setStyle({ opacity: 0, fillOpacity: 0 }); // RT tersembunyi
            polygon.interactive = false; // Nonaktifkan interaksi
        });

        // Sembunyikan polyline kecamatan, tampilkan polyline kelurahan
        kecPolylines.forEach((polyline) => {
            polyline.setStyle({ opacity: 0, weight: 0 }); // Sembunyikan polyline kecamatan
        });
        kelurahanPolylines.forEach((polyline) => {
            polyline.setStyle({ opacity: 1, weight: 1 }); // Tampilkan polyline kelurahan
        });
    } else if (zoomLevel >= 15) {
        // Tampilkan RT, sembunyikan kecamatan dan kelurahan
        kecPolygons.forEach((polygon) => {
            polygon.setStyle({ opacity: 0, fillOpacity: 0 }); // Kecamatan tersembunyi
            polygon.interactive = false; // Nonaktifkan interaksi
        });
        kelurahanPolygons.forEach((polygon) => {
            polygon.setStyle({ opacity: 0, fillOpacity: 0 }); // Kelurahan tersembunyi
            polygon.interactive = false; // Nonaktifkan interaksi
        });
        rTPolygons.forEach((polygon) => {
            polygon.setStyle({ opacity: 1, fillOpacity: 0.3 }); // RT terlihat
            polygon.interactive = true; // Pastikan polygon dapat di-klik
            polygon.bringToFront(); // Pastikan RT di depan
        });

        // Sembunyikan polyline kecamatan dan kelurahan
        kecPolylines.forEach((polyline) => {
            polyline.setStyle({ opacity: 0, weight: 0 }); // Sembunyikan polyline kecamatan
        });
        kelurahanPolylines.forEach((polyline) => {
            polyline.setStyle({ opacity: 0, weight: 0 }); // Sembunyikan polyline kelurahan
        });
    }
}

// batas
// Event listener untuk perubahan zoom
map.on("zoomend", updatePolygonVisibility);

// Memanggil fungsi awal untuk mengatur visibilitas
updatePolygonVisibility();

let isKawasanKumuhVisible = true; // Status untuk tampilan kawasan kumuh
let isKelurahanVisible = false; // Status untuk tampilan kelurahan
let isKecamatanVisible = false; // Status untuk tampilan kecamatan

const rtApiKawasanKumuh = "http://citraku.test/api/kumuh"; // URL untuk API kawasan kumuh
const kawasanKumuhPolygons = []; // Array untuk menyimpan polygon kawasan kumuh

// Buat kontrol kustom untuk checkbox
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
                        <input type="checkbox" id="toggleKawasanKumuh" checked>
                        <span>Kawasan Kumuh</span>
                    </label>
                    <label>
                        <input type="checkbox" id="toggleKawasanBanjir">
                        <span>Kawasan Banjir</span>
                    </label>
                     <label>
                        <input type="checkbox" id="toggleKawasanBanjir">
                        <span>Kawasan Rentan Kebakaran</span>
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
                isKawasanKumuhVisible = event.target.checked;
                if (isKawasanKumuhVisible) {
                    // Tampilkan polygon dan ubah warna menjadi kuning
                    kawasanKumuhPolygons.forEach((polygon) => {
                        map.addLayer(polygon);
                        polygon.setStyle({ color: "yellow", fillOpacity: 0.5 }); // Ubah warna menjadi kuning
                    });
                } else {
                    // Sembunyikan polygon
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
                isKelurahanVisible = event.target.checked;
                if (isKelurahanVisible) {
                    // Tampilkan polygon kelurahan
                    kelurahanPolygons.forEach((polygon) => {
                        map.addLayer(polygon);
                    });
                } else {
                    // Sembunyikan polygon kelurahan
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
                isKecamatanVisible = event.target.checked;
                if (isKecamatanVisible) {
                    // Tampilkan polygon kecamatan
                    kecPolygons.forEach((polygon) => {
                        map.addLayer(polygon);
                    });
                } else {
                    // Sembunyikan polygon kecamatan
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

// Fetch data dari API kawasan kumuh
fetch(rtApiKawasanKumuh)
    .then((response) => response.json())
    .then((data) => {
        // Mengiterasi data RT yang dikembalikan oleh API
        data.forEach((rt) => {
            const name = rt.nomor; // Mengambil nomor RT
            const id = rt.id; // Mengambil ID RT
            const color = rt.color; // Mengambil warna dari database

            try {
                const geojson = JSON.parse(rt.koordinat); // Parsing GeoJSON

                // Memastikan coordinates ada dan tidak kosong
                if (geojson.coordinates && geojson.coordinates.length > 0) {
                    const coordinates = geojson.coordinates[0].map((coord) => ({
                        lat: coord[1],
                        lng: coord[0],
                    }));

                    // Membuat polygon RT
                    addRTPolygonToMap(name, coordinates, id, color); // Menggunakan warna dari database
                } else {
                    console.warn(`No coordinates found for RT: ${name}`); // Peringatan jika tidak ada koordinat
                }
            } catch (error) {
                console.error(`Error parsing GeoJSON for RT ${name}:`, error);
            }
        });

        // Mengatur bounds peta berdasarkan RT
        const bounds = L.latLngBounds();
        kawasanKumuhPolygons.forEach((polygon) => {
            bounds.extend(polygon.getBounds());
        });
        map.fitBounds(bounds);
    })
    .catch((error) => {
        console.error("Error fetching RT data:", error);
    });

// Fungsi untuk menambahkan polygon RT ke peta
function addRTPolygonToMap(name, coordinates, id, color) {
    const polygonOptions = {
        color: color || "blue", // Menggunakan warna dari database atau default biru
        fillOpacity: 0.5,
    };

    // Buat polygon RT dengan opsi yang sudah diatur
    const polygon = L.polygon(coordinates, polygonOptions).addTo(map);

    // Simpan polygon ke array untuk manajemen bounds
    kawasanKumuhPolygons.push(polygon);
}

// Fungsi untuk menambahkan polygon kelurahan ke peta
function addKelurahanPolygonToMap(coordinates) {
    const polygonOptions = {
        color: "green", // Warna untuk kelurahan
        fillOpacity: 0.5,
    };
    const polygon = L.polygon(coordinates, polygonOptions).addTo(map);
    kelurahanPolygons.push(polygon);
}

// Fungsi untuk menambahkan polygon kecamatan ke peta
function addKecamatanPolygonToMap(coordinates) {
    const polygonOptions = {
        color: "blue", // Warna untuk kecamatan
        fillOpacity: 0.5,
    };
    const polygon = L.polygon(coordinates, polygonOptions).addTo(map);
    kecPolygons.push(polygon);
}

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
