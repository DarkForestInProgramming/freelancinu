<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Freelancinu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
/>
    <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>    
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- Styles -->
    <link rel="stylesheet" href="main.css" />
</head>

<body class="mb-48">
    @section('header')
        @include('partials._header')
    @show

    <div class="content">
    @if(session()->has('success'))
    <x-toast />
    @endif
    @if(session()->has('error'))
    <x-toast />
    @endif   
            @yield('content')
        </div>
        @section('footer')
        @include('partials._footer')
    @show 

    <!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script>
    $('[data-toggle="tooltip"]').tooltip()
    </script>
    <script>
        $(document).ready(function () {
            $('#category').change(function () {
                var category_id = $(this).val();
        
                if (category_id) {
                    $.ajax({
                        type: 'GET',
                        url: '/get-subcategories/' + category_id,
                        success: function (data) {
                            $('#subcategory').empty();
                            $('#subsubcategory').empty();
        
                            if (data.length > 0) {
                                $('#subcategory-container').show();
                                $('#subcategory').append('<option value="">Pasirinkite sub-kategoriją</option>');
                                $.each(data, function (key, value) {
                                    $('#subcategory').append('<option value="' + value.id + '">' + value.name + '</option>');
                                });
                            } else {
                                $('#subcategory-container').hide();
                            }
                        }
                    });
                }
            });
        
            $('#subcategory').change(function () {
                var subcategory_id = $(this).val();
        
                if (subcategory_id) {
                    $.ajax({
                        type: 'GET',
                        url: '/get-subsubcategories/' + subcategory_id,
                        success: function (data) {
                            $('#subsubcategory').empty();
        
                            if (data.length > 0) {
                                $('#subsubcategory-container').show();
                                $('#subsubcategory').append('<option value="">Pasirinkite sub-sub-kategoriją</option>');
                                $.each(data, function (key, value) {
                                    $('#subsubcategory').append('<option value="' + value.id + '">' + value.name + '</option>');
                                });
                            } else {
                                $('#subsubcategory-container').hide();
                            }
                        }
                    });
                }
            });
        });
        </script>
</body>
</html>
