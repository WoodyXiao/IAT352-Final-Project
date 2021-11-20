<!--------------------------------- index page part -------------------------------->
<?php include('private/initialize.php');
include("private/database/db.php");
?>


<!-- html part  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Public Art - browse page</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="https://raw.githubusercontent.com/furf/jquery-ui-touch-punch/master/jquery.ui.touch-punch.js"></script>

    <!-- for bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Custom Styling -->
    <style>
        <?php include(PUBLIC_PATH . '/Assets/css/css.css'); ?>
    </style>


</head>

<body>
    <!-- header part -->
    <?php include(INCLUDE_PATH . '/header.php'); ?>
    <!-- end header part -->

    <!-- flash message when log in successfully -->
    <?php include(INCLUDE_PATH . '/message.php'); ?>
    <!-- end flash message when log in successfully -->

    <div class="heading">
        <h1>Public Art</h1>
    </div>

    <!-- for the filter part -->
    <section class="filter-part">

        <div id="filters">
            <span>Country: &nbsp;</span>
            <select name="fetchval" id="fetchval">
                <option value="ALL">---Select Country---</option>
                <?php $result = getSpercificData('country', 'artist');
                foreach ($result as $row) {
                ?>
                    <?php
                    if ($row['country'] == '') {
                        $country = 'Other';
                    } else {
                        $country = $row['country'];
                    }
                    ?>
                    <option value="<?php echo $row['country']; ?>"><?php echo $country; ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <div class="list-group" id="yearRange">
            <div class="box">
                <p>Year: </p>
                <p id="year_show">1900 - 2022</p>
                <input type="hidden" id="hidden_minimum_year" value="1900" />
                <input type="hidden" id="hidden_maximum_year" value="2022" />

            </div>
            <div id="year_range"></div>
        </div>

    </section>
    <!-- end for the filter part -->

    <!-- container -->
    <section class="main-container">
        <!-- side bar -->
        <div class="side-bar">

            <!-- for the type part -->
            <h3>Type</h3>
            <?php $result = getSpercificData('type', 'artwork');
            foreach ($result as $row) {
            ?>
                <div class="type-items">
                    <label> <?php echo $row['type']; ?></label><input type="checkbox" class="type_selector type" value="<?php echo $row['type']; ?>">
                </div>
            <?php
            }
            ?>
            <!-- end for the type part -->

            <!-- for the status part -->
            <h3>Status</h3>
            <?php $result = getSpercificData('status', 'artwork');
            foreach ($result as $row) {
            ?>
                <div class="status-items">
                    <label> <?php echo $row['status']; ?></label><input type="checkbox" class="status_selector status" value="<?php echo $row['status']; ?>">
                </div>
            <?php
            }
            ?>
            <!-- end for the status part -->

        </div>
        <!-- end for side bar -->

        <!-- main content -->
        <div class="main-content-container">
        </div>
        <!-- end main content -->

    </section>


    <!-- for the jquery code -->
    <script>
        $(document).ready(function() {

            // ----- for the function of fetching data -----
            function filter_data(pageID) {
                var status = get_filter('status');
                var type = get_filter('type');
                var from = $('#hidden_minimum_year').val();
                var to = $('#hidden_maximum_year').val();
                var country = $('#fetchval').val();
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
                    beforeSend: function() {
                        $(".main-content-container").html("<span>Working.....</span>");
                    },
                    success: function(data) {
                        $(".main-content-container").html(data);
                        callBack();
                    }
                });
            }
            filter_data();

            // ----- for the checkbox. -----
            function get_filter(class_name) {
                var status = [];
                $('.' + class_name + ':checked').each(function() {
                    status.push($(this).val());
                });
                return status;
            }
            // ----- for the pagination -----
            var callBack = function() {
                id = $(".page").attr('id');
                $(".page").unbind('click').on('click', function() {
                    id = $(this).attr('id');
                    filter_data(id);
                });


            }

            // ----- click event for status checkbox -----
            $('.status_selector').click(function() {
                id = $(".page").attr('id');
                filter_data(id);
            });
            // ----- click event for type checkbox -----
            $('.type_selector').click(function() {
                id = $(".page").attr('id');
                filter_data(id);
            });
            // ---- click event for country selecting ----
            $("#fetchval").on("change", function() {
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
                stop: function(event, ui) {
                    $('#year_show').html(ui.values[0] + ' - ' + ui.values[1]);
                    $('#hidden_minimum_year').val(ui.values[0]);
                    $('#hidden_maximum_year').val(ui.values[1]);
                    filter_data();
                }
            });
        });
    </script>
    <!-- end for the jquery code -->
</body>

</html>