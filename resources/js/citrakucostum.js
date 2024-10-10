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

//
// Fungsi untuk menangani scroll zoom hanya di area peta
// Variabel untuk mengecek apakah Ctrl ditekan
let isCtrlPressed = false;

// Event listener untuk mendeteksi penekanan tombol
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

function createKelurahanLayer(name, coordinates, id, color) {
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

    // Membuat marker di pusat polygon menggunakan icon default Leaflet
    const marker = L.marker([centroid.lat, centroid.lng]).addTo(map);

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

    // Event click untuk men-zoom ke kelurahan dan menampilkan modal informasi
    polygon.on("click", function () {
        map.fitBounds(polygon.getBounds());
        $("#kelurahanModal" + id).modal("show");
    });

    // Simpan polygon ke array untuk referensi lebih lanjut
    kelurahanPolygons.push(polygon);
}

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
function updatePolygonVisibility() {
    const zoomLevel = map.getZoom();
    // Memastikan tampilan default

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
        kawasanKumuhPolygons.forEach((polygon) => {
            polygon.setStyle({ opacity: 0, fillOpacity: 0 }); // Kawasan kumuh tersembunyi
            polygon.interactive = false; // Nonaktifkan interaksi
        });

        kawasanBanjirPolygons.forEach((polygon) => {
            polygon.setStyle({ opacity: 0, fillOpacity: 0 }); // Kawasan banjir tersembunyi
            polygon.interactive = false; // Nonaktifkan interaksi
        });
        kawasanBanjirPolygons.forEach((polygon) => {
            polygon.setStyle({ opacity: 0, fillOpacity: 0 }); // Kawasan banjir tersembunyi
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

map.on("zoomend", updatePolygonVisibility);

// Memanggil fungsi awal untuk mengatur visibilitas
updatePolygonVisibility();
let isKawasanKumuhVisible = false; // Status untuk tampilan kawasan kumuh (default nonaktif)
let isKelurahanVisible = false; // Status untuk tampilan kelurahan (default nonaktif)
let isKecamatanVisible = false; // Status untuk tampilan kecamatan (default nonaktif)
let isKawasanBanjirVisible = false; // Status untuk tampilan kawasan banjir (default nonaktif)
let isKawasanKebakaranVisible = false; // Status untuk tampilan kawasan banjir (default nonaktif)

const rtApiKawasanKumuh = "http://citraku.test/api/kumuh"; // URL untuk API kawasan kumuh
const kawasanKumuhPolygons = []; // Array untuk menyimpan polygon kawasan kumuh
const kawasanBanjirPolygons = []; // Array untuk menyimpan polygon kawasan banjir
const kawasanKebakaranPolygons = []; // Array untuk menyimpan polygon kawasan banjir

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
                        <input type="checkbox" id="toggleKawasanKumuh">
                        <span>Kawasan Kumuh</span>
                    </label>
                    <label>
                        <input type="checkbox" id="toggleKawasanBanjir">
                        <span>Kawasan Banjir</span>
                    </label>
                    <label>
                        <input type="checkbox" id="toggleKawasanKebakaran">
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
                    kawasanKumuhPolygons.forEach((polygon) => {
                        map.addLayer(polygon);
                        polygon.setStyle({ color: "yellow", fillOpacity: 0.5 });
                    });
                } else {
                    kawasanKumuhPolygons.forEach((polygon) => {
                        map.removeLayer(polygon);
                    });
                }
            }
        );

        // Event listener untuk checkbox Kawasan Banjir
        div.querySelector("#toggleKawasanBanjir").addEventListener(
            "change",
            (event) => {
                isKawasanBanjirVisible = event.target.checked;
                if (isKawasanBanjirVisible) {
                    kawasanBanjirPolygons.forEach((polygon) => {
                        map.addLayer(polygon);
                        polygon.setStyle({ color: "blue", fillOpacity: 0.5 });
                    });
                } else {
                    kawasanBanjirPolygons.forEach((polygon) => {
                        map.removeLayer(polygon);
                    });
                }
            }
        );

        div.querySelector("#toggleKawasanKebakaran").addEventListener(
            "change",
            (event) => {
                isKawasanKebakaranVisible = event.target.checked;
                if (isKawasanKebakaranVisible) {
                    kawasanKebakaranPolygons.forEach((polygon) => {
                        map.addLayer(polygon);
                        polygon.setStyle({ color: "orange", fillOpacity: 0.5 });
                    });
                } else {
                    kawasanKebakaranPolygons.forEach((polygon) => {
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
                isKecamatanVisible = event.target.checked;
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

// Fetch data kawasan banjir
fetch("http://citraku.test/api/rawanbanjir")
    .then((response) => response.json())
    .then((data) => {
        data.forEach((item) => {
            // Mengambil koordinat kawasan banjir
            const geojson = JSON.parse(item.koordinat);
            if (geojson.coordinates && geojson.coordinates.length > 0) {
                const coordinates = geojson.coordinates[0].map((coord) => ({
                    lat: coord[1],
                    lng: coord[0],
                }));
                addKawasanBanjirPolygonToMap(coordinates);
            }
        });
    })
    .catch((error) => {
        console.error("Error fetching kawasan banjir data:", error);
    });

// Fungsi untuk menambahkan polygon kawasan banjir ke peta
function addKawasanBanjirPolygonToMap(coordinates) {
    const polygonOptions = {
        color: "blue", // Warna untuk kawasan banjir
        fillOpacity: 0, // Set fillOpacity ke 0 agar tidak terlihat
        opacity: 0, // Set opacity ke 0 agar border tidak terlihat
    };
    const polygon = L.polygon(coordinates, polygonOptions).addTo(map);
    kawasanBanjirPolygons.push(polygon);
}

fetch("http://citraku.test/api/rawankebakaran")
    .then((response) => response.json())
    .then((data) => {
        data.forEach((item) => {
            // Mengambil koordinat kawasan banjir
            const geojson = JSON.parse(item.koordinat);
            if (geojson.coordinates && geojson.coordinates.length > 0) {
                const coordinates = geojson.coordinates[0].map((coord) => ({
                    lat: coord[1],
                    lng: coord[0],
                }));
                addKawasanKebakaranPolygonToMap(coordinates);
            }
        });
    })
    .catch((error) => {
        console.error("Error fetching kawasan banjir data:", error);
    });

// Fungsi untuk menambahkan polygon kawasan banjir ke peta
function addKawasanKebakaranPolygonToMap(coordinates) {
    const polygonOptions = {
        color: "blue", // Warna untuk kawasan banjir
        fillOpacity: 0, // Set fillOpacity ke 0 agar tidak terlihat
        opacity: 0, // Set opacity ke 0 agar border tidak terlihat
    };
    const polygon = L.polygon(coordinates, polygonOptions).addTo(map);
    kawasanKebakaranPolygons.push(polygon);
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

// Fungsi untuk mengatur tampilan collapse
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
