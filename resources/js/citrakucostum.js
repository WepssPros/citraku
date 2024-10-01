const kecamatanApiUrl = "http://citraku.test/api/kecamatan";
const kelurahanApiUrl = "http://citraku.test/api/kelurahan"; // URL API untuk kelurahan
const kecMarker = {
    alambarajo: { lat: -1.6473906, lng: 103.55709 },
    kotabaru: { lat: -1.6473206, lng: 103.601456 },
    jelutung: { lat: -1.6102926, lng: 103.605679 },
    danausipin: { lat: -1.5995896, lng: 103.586936 },
    danauteluk: { lat: -1.5711866, lng: 103.589703 },
    telanaipura: { lat: -1.5919696, lng: 103.557281 },
    pelayangan: { lat: -1.5603186, lng: 103.621408 },
    pasar: { lat: -1.5945256, lng: 103.61002 },
    jambitimur: { lat: -1.5873176, lng: 103.633583 },
    jambiselatan: { lat: -1.6181206, lng: 103.630278 },
    palmerah: { lat: -1.6369376, lng: 103.648698 },
};
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
// TUTUP KECAMATAN

// Kelurahan Maker
const kelurahan = {};
// Kelurahan maker

const rT = {
    rT01: [
        { lat: -1.61, lng: 103.605 },
        { lat: -1.611, lng: 103.606 },
        { lat: -1.61, lng: 103.607 },
    ],
    rT02: [
        { lat: -1.612, lng: 103.608 },
        { lat: -1.613, lng: 103.609 },
        { lat: -1.612, lng: 103.61 },
    ],
    rT03: [],
    rT04: [],
    rT05: [],
    rT06: [],
    rT07: [],
    rT08: [],
    rT09: [],
    rT10: [],
    rt11: [
        { lng: 103.61684581672858, lat: -1.5830514993502476 },
        { lng: 103.6166758229362, lat: -1.5823824041551688 },
        { lng: 103.61554961406102, lat: -1.5815964825388278 },
        { lng: 103.61432778367697, lat: -1.5810123514152679 },
        { lng: 103.61376467924015, lat: -1.5809380074421853 },
        { lng: 103.61298908256168, lat: -1.5806724932314324 },
        { lng: 103.61277659032163, lat: -1.5804494612677331 },
        { lng: 103.61190790335007, lat: -1.5818894651214066 },
        { lng: 103.61186544685091, lat: -1.5822183775615883 },
        { lng: 103.61494354301215, lat: -1.582738271312138 },
        { lng: 103.61572898824062, lat: -1.5835764670848675 },
        { lng: 103.61688592357598, lat: -1.5831096251317405 },
    ],

    rT12: [],
    rT13: [],
    rT14: [],
    rT15: [],
    rT16: [],
    rT17: [],
    rT18: [],
    rT19: [],
    rT20: [],
};

const area = {
    rt11: [
        // Area 1
        [
            { lng: 103.6172123845812, lat: -1.5825899506678809 },
            { lng: 103.61709475348073, lat: -1.5824645253525347 },
            { lng: 103.61725159494722, lat: -1.5822450310327412 },
            { lng: 103.61701633274754, lat: -1.582064732109302 },
            { lng: 103.61678891262159, lat: -1.5821901574488209 },
            { lng: 103.61663207115521, lat: -1.5824096517744977 },
            { lng: 103.61656149249563, lat: -1.5822215137828124 },
            { lng: 103.61639680895553, lat: -1.582064732109302 },
            { lng: 103.61637328273571, lat: -1.581798203236886 },
            { lng: 103.61611449431626, lat: -1.581806042322171 },
            { lng: 103.61581649553074, lat: -1.5819236285925484 },
            { lng: 103.61537733942504, lat: -1.581915789508841 },
            { lng: 103.61521265588607, lat: -1.58168845604402 },
            { lng: 103.61533028698528, lat: -1.5812416281295327 },
            { lng: 103.6150087619788, lat: -1.5812729844778772 },
            { lng: 103.61464802660629, lat: -1.5817825250673678 },
            { lng: 103.61469507904718, lat: -1.5819785021834605 },
            { lng: 103.61506365649217, lat: -1.5821117666123712 },
            { lng: 103.61527539247191, lat: -1.5823547781949685 },
            { lng: 103.61510286685939, lat: -1.5827937667893366 },
            { lng: 103.6153538132051, lat: -1.583115169094711 },
            { lng: 103.6156596540643, lat: -1.5835698356841732 },
            { lng: 103.61647522968877, lat: -1.583232755290794 },
            { lng: 103.61702417482127, lat: -1.5829191920859529 },
            { lng: 103.6171967004338, lat: -1.582574272504317 },
        ],
        // Area 2
        [
            { lng: 103.61207582653424, lat: -1.5821901571663375 },
            { lng: 103.61213856312116, lat: -1.5819001110564699 },
            { lng: 103.61274240276595, lat: -1.5820333754904539 },
            { lng: 103.61271887654601, lat: -1.5818922719726913 },
            { lng: 103.61242871983302, lat: -1.5815943867351479 },
            { lng: 103.61284434971901, lat: -1.5814768004461257 },
            { lng: 103.61311882228574, lat: -1.5815159958761456 },
            { lng: 103.61347171558464, lat: -1.5816649385065062 },
            { lng: 103.61372266193041, lat: -1.5815473522203547 },
            { lng: 103.61396576620376, lat: -1.5818609156336976 },
            { lng: 103.61362855705107, lat: -1.582127444498056 },
            { lng: 103.61393439791021, lat: -1.5821979962501729 },
            { lng: 103.61414613389002, lat: -1.5822450307502152 },
            { lng: 103.61434218572248, lat: -1.58187659380269 },
            { lng: 103.61463234243553, lat: -1.5819863409855657 },
            { lng: 103.61499307780798, lat: -1.582260708916266 },
            { lng: 103.61468723694878, lat: -1.582676180285759 },
            { lng: 103.61207582653424, lat: -1.5821979962501729 },
        ],
    ],
};

// sungai
const sungai = {};
// danau
const danau = {};

// TIPE DATA
// Inisialisasi peta
var map = L.map("jambi-map").setView([-1.6, 103.6], 12);

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
    if (kecMarker[name.toLowerCase()]) {
        // Ambil koordinat dari kecMarker berdasarkan nama kecamatan
        const markerCoordinates = kecMarker[name.toLowerCase()];

        // Membuat marker untuk kecamatan
        const marker = L.marker([
            markerCoordinates.lat,
            markerCoordinates.lng,
        ]).addTo(map);
        marker.bindPopup(`<b>Kecamatan: ${name}</b>`).openPopup();

        // Menyimpan marker ke objek kecMarker
        kecMarker[name.toLowerCase()] = marker;
    } else {
        console.error(`Marker not found for kecamatan: ${name}`);
    }

    // Event click untuk menampilkan modal kecamatan
    kecPolygon.on("click", function () {
        $("#kecamatanModal" + id).modal("show"); // Menampilkan modal dengan ID spesifik
    });

    // Mengembalikan objek polygon
    return kecPolygon;
}

// Fungsi untuk membuat polygon dan polyline Kelurahan

// Mengambil data kelurahan dari API
fetch(kelurahanApiUrl)
    .then((response) => response.json()) // Mengubah respons menjadi JSON
    .then((data) => {
        // Mengiterasi data kelurahan dan membuat layer
        data.forEach((kelurahan) => {
            const name = kelurahan.nama;
            const id = kelurahan.id;
            const geojson = JSON.parse(kelurahan.koordinat); // Parsing GeoJSON

            // Ambil koordinat dari GeoJSON (format GeoJSON menyimpan lng/lat)
            const coordinates = geojson.coordinates[0].map((coord) => ({
                lat: coord[1], // Leaflet memerlukan [lat, lng], GeoJSON [lng, lat]
                lng: coord[0],
            }));

            // Membuat polygon kelurahan
            createKelurahanLayer(name, coordinates, id);
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

// Fungsi untuk membuat layer polygon kelurahan
function createKelurahanLayer(name, coordinates, id) {
    // Membuat polygon untuk kelurahan
    const polygon = L.polygon(
        coordinates.map((coord) => [coord.lat, coord.lng]), // Mapping lat/lng
        {
            color: "green", // Warna polygon default
            weight: 2,
            opacity: 0.65,
            fillOpacity: 0.3,
            interactive: true, // Pastikan polygon bisa di-klik
        }
    ).addTo(map);

    polygon.bringToFront(); // Memastikan kelurahan di depan

    // Membuat polyline untuk kelurahan
    const polyline = L.polyline(
        coordinates.map((coord) => [coord.lat, coord.lng]), // Mapping lat/lng
        {
            color: "white",
            weight: 1,
            opacity: 1,
        }
    ).addTo(map);

    // Event hover untuk polygon kelurahan
    polygon.on("mouseover", function () {
        if (map.getZoom() < 15) {
            // Cek jika zoom level kurang dari 15
            polyline.setStyle({ color: "blue" }); // Ubah warna polyline saat hover
            polygon.setStyle({ color: "blue", fillOpacity: 0.5 }); // Ubah warna polygon saat hover
        }
    });

    polygon.on("mouseout", function () {
        if (map.getZoom() < 15) {
            // Cek jika zoom level kurang dari 15
            polyline.setStyle({ color: "white" }); // Kembalikan warna polyline saat mouse keluar
            polygon.setStyle({ color: "green", fillOpacity: 0.3 }); // Kembalikan warna polygon saat mouse keluar
        }
    });

    // Event click untuk kelurahan
    polygon.on("click", function () {
        map.fitBounds(polygon.getBounds());
        $("#kelurahanModal" + id).modal("show"); // Pastikan modal ini ada di HTML
    });

    // Menyimpan polygon kelurahan ke dalam array kelurahanPolygons
    kelurahanPolygons.push(polygon);
}

// Fungsi untuk membuat polygon dan polyline RT
function createRTLayer(rtName, rtCoordinates, areaCoordinates) {
    areaCoordinates.forEach((coords) => {
        const polygon = L.polygon(
            coords.map((coord) => [coord.lat, coord.lng]),
            {
                color: "blue",
                weight: 1,
                opacity: 0.65,
                fillOpacity: 0.3,
                interactive: true, // Pastikan polygon bisa di-klik
            }
        ).addTo(map);

        polygon.on("click", function () {
            map.fitBounds(polygon.getBounds());
            $("#rtModal").modal("show"); // Pastikan modal ini ada di HTML
        });

        polygon.bringToFront(); // Memastikan RT di depan
        rTPolygons.push(polygon); // Simpan RT polygon
    });
}

// Memanggil fungsi untuk kelurahan
// Membuat layer untuk kecamatan, kelurahan, dan RT
function createLayers(kelurahan, rT, area) {
    // Loop untuk membuat layer kecamatan
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

// Memanggil fungsi untuk membuat semua layer
createLayers(kelurahan, rT, area);

// Event untuk memperbarui visibilitas polygon berdasarkan level zoom
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

// Event listener untuk perubahan zoom
map.on("zoomend", updatePolygonVisibility);

// Memanggil fungsi awal untuk mengatur visibilitas
updatePolygonVisibility();
