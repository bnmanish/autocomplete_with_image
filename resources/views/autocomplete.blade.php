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
        .ui-menu .ui-menu-item {
            background: ghostwhite;
            border-bottom: 1px solid lightgray;
        }
        .ui-menu-item{
            display: flex;
            align-items: center;
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
                        response($.map(data.data, function(item) {
                            return {
                                label: item.name,
                                value: item.name,
                                profile_image: item.profile_image
                            }
                        }));
                    }
                });
            },
            minLength: 3, // Minimum characters before autocomplete starts
            select: function(event, ui) {
                // Handle selection of autocomplete item here
            },
            focus: function(event, ui) {
                // Prevent input value from being replaced with label when an item is focused
                event.preventDefault();
            },
        }).data('ui-autocomplete')._renderItem = function(ul, item) {
            return $('<li>')
                .append('<img src="' + item.profile_image + '" style="width: 20px; height: 20px;">')
                .append(item.label)
                .appendTo(ul);
        };
    });


  </script>


</body>
</html>