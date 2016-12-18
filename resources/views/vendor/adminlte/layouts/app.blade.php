<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
@show

<body class="skin-blue sidebar-mini sidebar-collapse fixed">
<div id="app">
    <div class="wrapper">

    @include('adminlte::layouts.partials.mainheader')

    @include('adminlte::layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

        @include('adminlte::layouts.partials.contentheader')

        <!-- Main content -->
            <section class="content">
                <!-- Your Page Content Here -->
                @yield('main-content')
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
    </div>

    @include('adminlte::layouts.partials.controlsidebar')

    @include('adminlte::layouts.partials.footer')

</div><!-- ./wrapper -->
@section('scripts')
    @include('adminlte::layouts.partials.scripts')
@stop


<script src="/js/app.js"></script>
<script src="/js/libs.js"></script>
<script>
    $(document).ready(function () {
        $('.task_complete').each(function () {
            var self = $(this),
                    label = self.next(),
                    label_text = label.text();

            label.remove();
            self.iCheck({
                checkboxClass: 'icheckbox_line-red',
                radioClass: 'iradio_line-red',
                insert: '<div class="icheck_line-icon"></div>' + label_text
            });
//                this.form.submit();
        });
        $('.task_complete').on('ifChecked', function (e) {

            //TODO: find out why I have to do this
            //this is a workaround for ajax requests sometimes throwing a 500 Internal Server
            //error.  This will prefilter before each request.
            $.ajaxPrefilter(function (options, originalOptions, xhr) { // this will run before each request
                var token = $('meta[name="csrf-token"]').attr('content'); // or _token, whichever you are using

                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token); // adds directly to the XmlHttpRequest Object
                }
            });
            e.preventDefault();

            var el = $(this);
            var myurl = "/tasks/" + el.val() + "/complete";
            $.ajax({
                type: "POST",
                url: myurl,
                data: $(this).serialize(),
                success: function (data) {
                    console.log(data);
                    $("#task-" + data['id']).remove();
                    $("#progress-percent").text(data['progress'] + "%");
                    $("#progress-bar").removeAttr('style').css("width", data['progress'] + "%")

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(xhr.responseText);
                    console.log(thrownError);
                }
            })
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
@yield('scripts.footer')
@include('flash')
</body>
</html>
