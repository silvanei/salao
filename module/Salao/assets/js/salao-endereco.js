/**
 * Created by silvanei on 28/05/17.
 */

$(document).ready(function () {
    var geocoder;
    var map;
    var marker;
    var latitude = $("#lat");
    var longitude = $("#lng");
    var mostrarNoMapa = $("#mostrar-no-mapa");
    var excluirImagem = $("#excluir-imagem");
    var endereco = $("#endereco_text");

    function initialize() {
        var latlng = new google.maps.LatLng(-18.8800397, -47.05878999999999);
        var options = {
            zoom: 5,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById("mapa"), options);

        geocoder = new google.maps.Geocoder();

        marker = new google.maps.Marker({
            map: map,
            draggable: true
        });

        marker.setPosition(latlng);
    }
    function carregarNoMapa(address) {
        geocoder.geocode({ 'address': address + ', Brasil', 'region': 'BR' }, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var lat = results[0].geometry.location.lat();
                    var lng = results[0].geometry.location.lng();

                    endereco.val(results[0].formatted_address);
                    latitude.val(lat);
                    longitude.val(lng);

                    var location = new google.maps.LatLng(lat, lng);
                    marker.setPosition(location);
                    map.setCenter(location);
                    map.setZoom(16);
                }
            }
        });
    }

    initialize();

    excluirImagem.click(function () {
        $('#form-excluir-imagem').submit();
    });

    endereco.blur(function() {
        if($(this).val() !== "") {
            carregarNoMapa($(this).val());
        }
    });

    mostrarNoMapa.click(function() {
        endereco.trigger('blur');
    });

    google.maps.event.addListener(marker, 'drag', function () {
        geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    endereco.val(results[0].formatted_address);
                    latitude.val(marker.getPosition().lat());
                    longitude.val(marker.getPosition().lng());
                }
            }
        });
    });

    endereco.autocomplete({
        source: function (request, response) {
            geocoder.geocode({ 'address': request.term + ', Brasil', 'region': 'BR' }, function (results, status) {
                response($.map(results, function (item) {
                    return {
                        label: item.formatted_address,
                        value: item.formatted_address,
                        latitude: item.geometry.location.lat(),
                        longitude: item.geometry.location.lng()
                    }
                }));
            })
        },
        select: function (event, ui) {
            latitude.val(ui.item.latitude);
            longitude.val(ui.item.longitude);
            var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);
            marker.setPosition(location);
            map.setCenter(location);
            map.setZoom(16);
        }
    });

    endereco.trigger('blur');
});
