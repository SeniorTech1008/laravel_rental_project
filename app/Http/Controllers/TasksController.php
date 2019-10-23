<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checklist;
use App\Models\Task;
use Auth;
use DB;

class TasksController extends Controller
{	
	protected $taskModel;

    public function __construct(){

    	$this->taskModel = new Task; //object initiating of Task model
    }

    /**
     *  [List checklist items with completed and incompleted task]
     *
     *  @method index
     *
     *  @return [type] [description]
     */
    
    public function index(){

    	$task = null;
    	//get the checklist with items of checklist within a time duration
    	$checklist = Checklist::with('items')->whereDate('start_date', '<=', date('Y-m-d'))->whereDate('end_date', '>=', date('Y-m-d'))->first();
    	if(!$checklist){

    		return redirect()->back()->with('errors', 'No data');
	    }
    	//get the task if task is checked with items
    	$task = $this->taskModel->item_task($checklist->id)->where('checklist_id', $checklist->id)->first();

    	// dd($task);
    	return view('tasks.index', compact('checklist', 'task'));
    }

    /**
     *  [create tasks with adding items of checklist]
     *
     *  @method create
     *
     *  @param  [type] $checklist_id [description]
     *
     *  @return [type] [description]
     */
    
    public function create($checklist_id){

    	$task = null;
    	//get the checklist with items of checklist within a time duration
    	$checklist = Checklist::with('items')->whereDate('start_date', '<=', date('Y-m-d'))->whereDate('end_date', '>=', date('Y-m-d'))->first();
    	if(!$checklist){

    		return redirect()->back()->with('errors', 'No data');
	    }
    	//get the task if task is checked with items
    	$task = $this->taskModel->item_task($checklist->id)->where('checklist_id', $checklist->id)->first();


    	return view('tasks.create', compact('checklist', 'task'));
    }

    /**
     *  store the task and items
     *
     *  @method store
     *
     *  @param  Request $request [description]
     *
     *  @return [type] [description]
     */
    
    public function store(Request $request){

    	//create the task
    	$task = Task::updateOrCreate(['user_id' => Auth::id(), 'checklist_id' => $request->checklist_id ]);
    	//Detaching the task items
		DB::table('item_task')->where('task_id', $task->id)
    				->where('checklist_id', $request->checklist_id)
    				->delete();
    	if(!empty($request->item_id)){

	    	foreach ($request->item_id as $item) {
	    		//Inserting the task items
    			DB::table('item_task')->where('task_id', $task->id)
    				->where('checklist_id', $request->checklist_id)
    					->updateOrInsert(['task_id' => $task->id, 'checklist_id' => $request->checklist_id, 'item_id' => $item]);
	    	}
	    }

    	return redirect()->route('task.index');
    }
}
