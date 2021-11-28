$(document).ready(function () {
    
    // ----- for the function of fetching data -----
    function filter_data(pageID) {
        var status = get_filter('status');
        var type = get_filter('type');
        var from = $('#hidden_minimum_year').val();
        var to = $('#hidden_maximum_year').val();
        var country = $('#fetchCountry').val();
        $.ajax({
            url: "filter_art.php",
            type: "POST",
            data: {
                status: status,
                type: type,
                from: from,
                to: to,
                country: country,
                page: pageID,
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
    filter_data();

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