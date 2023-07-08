<!DOCTYPE html>
<html class="{{ Auth::guard('admin')->user()->dark == 0 ? 'loading semi-dark-layout' : 'loading dark-layout' }}"
    lang="en" data-layout="semi-dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('meta-details')
    {{-- @php($settings = App\Models\Setting::first()) --}}
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset($settings->favicon) }}"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/dashboard-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/charts/chart-apex.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/style.css') }}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    @include('layouts.header')
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    @include('layouts.sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('layouts.footer')
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/sweetalert.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/dashboard-analytics.js') }}"></script>
    <!-- END: Theme JS-->

    {{-- Tinymce --}}
    {{-- <script src="{{asset('tinymce/tinymce.min.js')}}"></script> --}}
    <script src="{{ asset('ckeditor5/ckeditor.js') }}"></script>

    {{-- <script>
        var fileUploadUrl = "{{route('fileUploadEditor')}}";
        const editor_config = {
            force_p_newlines: false,
            remove_linebreaks: false,
            forced_root_block: "",
            path_absolute: "{{ url('/') }}/",
            selector: "textarea.tinymce-editor",
            extended_valid_elements: false,
            height: 300,
            readonly: false,
            menubar: false,
            plugins: [
                "codesample advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars  code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons paste textcolor colorpicker textpattern ",
            ],
            toolbar: "insertfile undo redo | codesample| styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",

            relative_urls: false,
            convert_urls: false,
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open("POST", fileUploadUrl);
                var token = "{{ csrf_token() }}"; //document.getElementById("_token").value;
                xhr.setRequestHeader("X-CSRF-Token", token);
                xhr.onload = function () {
                    var json;
                    if (xhr.status != 200) {
                        failure("HTTP Error: " + xhr.status);
                        return;
                    }
                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != "string") {
                        failure(xhr.responseText);
                        return;
                    }
                    success(json.location);
                };
                formData = new FormData();
                formData.append("file", blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            },
        };
        tinymce.init(editor_config);

    </script> --}}
    @yield('javascript')

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
        ClassicEditor.create(document.querySelector(".ckeditor"));

        ClassicEditor.editorConfig = function(config) {
            config.toolbar = [{
                name: 'colors',
                items: ['TextColor', 'BGColor']
            }]
        }
    </script>
    <script>
        $(document).ready(function() {
            $(".dark_template").on('click', function() {
                var value = $(".dark_template").attr('data-id');
                var theme = 1;
                if (value == 1) {
                    theme = 0;
                    $(".dark_template").attr('data-id', '0')
                } else {
                    theme = 1;
                    $(".dark_template").attr('data-id', '1')
                }
                $.ajax({
                    method: 'GET',
                    url: "/",

                    data: {
                        '_token': "{{ csrf_token() }}",
                        data: theme
                    },
                    success: function(response) {
                        // location.reload();
                    }
                })
            })
        })
    </script>
</body>
<!-- END: Body-->

</html>
