<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
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
    $(document).ready(function(){
        $('.task_complete').each(function(){
            var self = $(this),
                    label = self.next(),
                    label_text = label.text();

            label.remove();
            self.iCheck({
                checkboxClass: 'icheckbox_line-red',
                radioClass: 'iradio_line-red',
                insert: '<div class="icheck_line-icon"></div>' + label_text
            });
            $('.task_complete').on('ifChecked', function(event){

                this.form.submit();
            });
        });
    });
</script>
<script src="https://almsaeedstudio.com/themes/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
@yield('scripts.footer')
@include('flash')
</body>
</html>
