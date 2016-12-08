<?php

    namespace App\Http\Controllers;

    use App\Task;
    use App\TaskList;
    use Illuminate\Http\Request;

    class TaskListController extends Controller
    {

        public function __construct()
        {
            $this->middleware('auth');

            parent::__construct();
        }
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            //
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('tasklist.create');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $this->validate($request, [

                'name' => 'required'
            ]);

            $tl = TaskList::create($request->all());

            $tl->user_id = \Auth::user()->id;

            $tl->save();


            return redirect()->to('/home');
        }

        public function addTask($name, Request $request)
        {

            $this->validate($request, [
                'task_name'     => 'required',
                'due_date' => 'required'

            ]);

            $task = Task::create($request->all());

            TaskList::taskListInfo($name)->addTaskToTaskList($task);

            return redirect()->to('/tasklist/'. $name );


        }

        /**
         * Display the specified resource.
         *
         * @param $name
         * @return \Illuminate\Http\Response
         * @internal param int $id
         */
        public function show($name)
        {
            $tasklist = TaskList::taskListInfo($name);

            return view('tasklist.show', compact('tasklist'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
        }
    }
