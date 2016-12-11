<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">My Assistant</h3>
            <ul class='control-sidebar-menu'>
                <li>
                    <a href='javascript:;'>
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">{{ trans('adminlte_lang::message.birthday') }}</h4>
                            <p>{{ trans('adminlte_lang::message.birthdaydate') }}</p>
                        </div>
                    </a>
                </li>
            </ul><!-- /.control-sidebar-menu -->


            @foreach ($tasklists as $tasklist)
                <?php $completedTasks = $tasklist->tasks->where('complete',true)->count();
                $totalTasks = $tasklist->tasks->count();
                $progress = ($completedTasks / $totalTasks) * 100;
                ?>

                <h3 class="control-sidebar-heading">{{ $tasklist->name }}</h3>
                <ul class='control-sidebar-menu'>
                    <li>
                        <a href='javascript:;'>
                            <h4 class="control-sidebar-subheading">
                                Progress
                                <span id="progress-percent" class="label label-danger pull-right">{{number_format($progress, 0)}}%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div id="progress-bar" class="progress-bar progress-bar-danger"
                                     style="width: {{  $progress }}%"></div>
                            </div>
                        </a>
                    </li>
                    @foreach($tasklist->tasks()->where(['complete' => false])->get() as $task)
                        <li style="padding:5px 10px;">
                            <form action="" method="POST" id="task-{{ $task->id }}">
                                <input type="checkbox" name="complete" class="task_complete"
                                       value="{{ $task->id }}">
                                <label>{{ $task->task_name }}</label>
                                {{ csrf_field() }}
                            </form>
                        </li>
                        @endforeach
                        </li>
                </ul><!-- /.control-sidebar-menu -->
            @endforeach

        </div><!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">{{ trans('adminlte_lang::message.statstab') }}</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">{{ trans('adminlte_lang::message.generalset') }}</h3>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        {{ trans('adminlte_lang::message.reportpanel') }}
                        <input type="checkbox" class="pull-right" {{ trans('adminlte_lang::message.checked') }} />
                    </label>
                    <p>
                        {{ trans('adminlte_lang::message.informationsettings') }}
                    </p>
                </div><!-- /.form-group -->
            </form>
        </div><!-- /.tab-pane -->
    </div>
</aside><!-- /.control-sidebar

<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>
