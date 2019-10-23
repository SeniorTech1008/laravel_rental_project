@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">{{$checklist->name}} ({{$checklist->start_date}} To {{$checklist->end_date}})</h3>
            {{Form::open(['route' => 'task.store', 'method' => 'POST'])}}
            {{Form::hidden('checklist_id', $checklist->id)}}
            <div class="col col-md-3">
                <label for="select" class=" form-control-label">Select Items</label>
            </div>
            <div class="col-12 col-md-9">
        		@foreach($checklist->items as $item)
                    <div class="form-check">
                        <div class="checkbox">
                            <label for="checkbox1" class="form-check-label ">
                                {{Form::checkbox('item_id[]', $item->id, !empty($task) ? in_array($item->id, $task->items->pluck('id')->toArray()) : null, ['class' => 'form-check-input']) }} 
                                {{$item->name}} 
                            </label>
                        </div>
                    </div>

				@endforeach
            </div>
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Submit
            </button>
            {{Form::close()}}
            <!-- END DATA TABLE -->
        </div>
    </div>
@endsection
