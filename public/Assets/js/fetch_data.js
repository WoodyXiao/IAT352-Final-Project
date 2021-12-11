$(document).ready(function () {

    // ----- for the function of fetching data -----
    function filter_data(pageID, input) {
        var status = get_filter('status');
        var type = get_filter('type');
        var from = $('#hidden_minimum_year').val();
        var to = $('#hidden_maximum_year').val();
        var country = $('#fetchCountry').val();
        var location = $('#fetchLocation').val();
        var material = $('#fetchMaterial').val();
        if(!input){
            input = $('#form1').val()
        }
        $.ajax({
            url: "filterData/filter_art.php",
            type: "POST",
            data: {
                search: input, // ---> for the search 
                status: status, // ---> for the status of artwork
                type: type, // ---> for the type of artwork
                from: from, // ---> for the year of from
                to: to, // ---> for the year of to
                country: country, // ---> for the country of artwork
                location: location, // ---> for the location of artwork
                material: material, // ---> for the material of artwork
                page: pageID, // ---> for the page
            },
            beforeSend: function () {
                $(".main-content-container").html("<span>Working.....</span>");
            },
            success: function (data) {
                $(".main-content-container").html(data);
                callBack();
            }
        });
    }
    // ----- for autocomplete fetch artname and artist name -----
    function autocomplete(input) {
        $.ajax({
            url: "filterData/autocomplete.php",
            type: "POST",
            data: {
                search: input,
            },
            success: function (data) {
                $(".autocomplete").html(data);
                callBack();
            }

        });
    }
    filter_data();
    autocomplete();

    // ----- for the checkbox. -----
    function get_filter(class_name) {
        var status = [];
        $('.' + class_name + ':checked').each(function () {
            status.push($(this).val());
        });
        return status;
    }
    // ----- for the pagination -----
    var callBack = function () {
        id = $(".page").attr('id');
        $(".page").unbind('click').on('click', function () {
            id = $(this).attr('id');
            filter_data(id);
        });

        // -----  search button onclick event part -----
        $('.btn').click(function (e) {
            input = $('#form1').val();
            if (input != null) {
                filter_data(id, input);
            }
            autocomplete('');
        });

        // ----- click event for autocomplete -----
        $('div.text-container').click(function (e) {
            data = $(this).children('.artName').val();
            autocomplete('');
            filter_data(id, data);
        });
    }

    // ---- search bar typeing part -----
    $('#form1').keyup(function (e) {
        input = $(this).val();
        if (input) {
            autocomplete(input);
        } else if (e.keyCode === 8 && input == "") {
            autocomplete('');
            filter_data();
        }
    });

    // ----- for when click from the home page -----
    if ($('.artistName-container').val()) {
        setTimeout(function () {
            $(".btn").trigger('click');
        }, 70);
        $('.artistName-container').val("");
    }

    // ----- click event for status checkbox -----
    $('.status_selector').click(function () {
        id = $(".page").attr('id');
        filter_data(id);
    });
    // ----- click event for type checkbox -----
    $('.type_selector').click(function () {
        id = $(".page").attr('id');
        filter_data(id);
    });
    // ---- click event for country selecting ----
    $("#fetchCountry").on("change", function () {
        id = $(".page").attr('id');
        filter_data(id);
    });
    // ---- click event for location selecting ----
    $("#fetchLocation").on("change", function () {
        id = $(".page").attr('id');
        filter_data(id);
    });
    // ---- click event for material selecting ----
    $("#fetchMaterial").on("change", function () {
        id = $(".page").attr('id');
        filter_data(id);
    });


    // ----- for the slider of year -----
    $('#year_range').slider({
        range: true,
        min: 1900,
        max: 2022,
        values: [1900, 2022],
        step: 1,
        stop: function (event, ui) {
            $('#year_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_year').val(ui.values[0]);
            $('#hidden_maximum_year').val(ui.values[1]);
            filter_data();
        }
    });

    // timer for close the message
    setTimeout(function () {
        $('.msg').fadeOut();
    }, 6000);

    $('.msg').mouseover(function () {
        $('.msg').fadeOut();
    });
});