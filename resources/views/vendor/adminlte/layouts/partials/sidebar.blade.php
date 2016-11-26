<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}
                    </a>
                </div>
            </div>
        @endif

    <!-- search form (Optional) -->
    {{--<form action="#" method="get" class="sidebar-form">--}}
    {{--<div class="input-group">--}}
    {{--<input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>--}}
    {{--<span class="input-group-btn">--}}
    {{--<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>--}}
    {{--</span>--}}
    {{--</div>--}}
    {{--</form>--}}
    <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
        {{--            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>--}}
        <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i>
                    <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-users'></i> <span>Clients</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @foreach(App\Client::all() as $client)
                        <li><a href="/client_list/{{$client->name}}">{{$client->name}}</a></li>
                    @endforeach
                    {{--<li class="treeview">--}}
                    {{--<a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>--}}
                    {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>--}}
                    {{--<li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>--}}
                    {{--</ul>--}}
                    {{--</li>--}}

                </ul>
            <li class="treeview">
                <a href="#"><i class='fa fa-file-o'></i> <span>Proposal Requests</span><i
                            class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu" style="overflow: auto;">
                    @foreach(App\ProposalRequest::all() as $pr)
                        <li>
                            <a href="/{{$pr->clientName}}/{{$pr->campaignName}}">{{$pr->clientName .'-'.$pr->campaignName}}</a>
                        </li>
                    @endforeach
                </ul>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
