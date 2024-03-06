<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Autocomplete Example with ajax</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <style>
        /* Default style */
        .search {
            display: block;
            margin: 0 auto;
            width: 600px; /* Default width for large devices */
        }

        /* Media query for smaller devices */
        @media only screen and (max-width: 768px) {
            .search {
                width: 100%; /* Width for smaller devices */
            }
        }
    </style>
</head>
<body>

<div>
    <input type="text" class="search" placeholder="enter your desired keywords">
</div>

<!-- jquery not required of you are already using jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
  
    $(function() {
        $(".search").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{route('search')}}", // Replace this with your endpoint URL
                    dataType: "json",
                    method : 'post',
                    data: {
                        _token : "{{csrf_token()}}",
                        key: request.term
                    },
                    success: function(data) {
                        response(data.data);
                        // response($.map(data.data, function(item) {
                        //     return {
                        //         label: item.name,
                        //         value: item.name
                        //     }
                        // }));
                    }
                });
            },
            minLength: 3, // Minimum characters before autocomplete starts
            // select: function (event, ui) {
            //     $(".search").val(ui.item.label);
            //     // return false;
            // }
            renderItem: function(item) {
                console.log(item);
                return $('<div>').append($('<img>').attr('src', item.profile_image).css({'width': '50px', 'height': '50px', 'margin-right': '10px'})).append(item.name);
            }
        });
        // $(".search").data("ui-autocomplete")._renderItem = function (ul, item) {
        //     return $('<li/>', {'data-value': item.label}).append($('<a/>', {href: "#"})
        //             .append($('<img/>', {src: item.profile_image, alt: item.name})).append(item.name))
        //             .appendTo(ul);
        // };
    });


  </script>


</body>
</html>