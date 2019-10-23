@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">{{$checklist->name}} ({{$checklist->start_date}} To {{$checklist->end_date}})</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right pull right">
                    <a class="au-btn au-btn-icon au-btn--green au-btn--small btn btn-sm btn-success" href="{{route('task.create', $checklist->id)}}">
                        <i class="zmdi zmdi-pencil"></i>modify checklist</a>
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">
            	<ul class="list-group">
            		@foreach($checklist->items as $item)
						<li class="list-group-item justify-content-between">
							{{$item->name}}
							{!! !empty($task) ? (in_array($item->id, $task->items->pluck('id')->toArray()) ? "<span class='badge badge-success badge-pill'>Completed</span>" : "<span class='badge badge-warning badge-pill'>Incomplete</span>") : "<span class='badge badge-warning badge-pill'>Incomplete</span>"!!}
						</li>
					@endforeach
				</ul>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
@endsection
