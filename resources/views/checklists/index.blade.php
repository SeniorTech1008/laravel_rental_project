@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">All Checklist</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right pull right">
                    <a class="au-btn au-btn-icon au-btn--green au-btn--small btn btn-sm btn-success" href="{{route('checklist.create')}}">
                        <i class="zmdi zmdi-plus"></i>add checklist</a>
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>name</th>
                            <th>Start date</th>
                            <th>End date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data->count())
                            @foreach($data as $key => $checklist)
                                <tr class="tr-shadow">
                                    <td>
                                        {{ ++ $key}}
                                    </td>
                                    <td>{{$checklist->name}}</td>
                                    <td>{{$checklist->start_date}}</td>
                                    <td>{{$checklist->end_date}}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a class="item btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Edit" href="{{route('checklist.edit', $checklist->id)}}">
                                                <i class="zmdi zmdi-edit"></i>Preview
                                            </a>
                                            |
                                            {{Form::open(['route' => ['checklist.use_again', $checklist->id], 'method' => 'POST', 'class' => 'd-inline'])}}
                                                {{Form::hidden('checklist_id', $checklist->id)}}
                                                <button type="submit" class="btn-sm btn btn-success" onclick=" return confirm('Are you sure?')">Use it in next check list</button>
                                            {{Form::close()}}
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                            @endforeach
                        @else
                            No data
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
@endsection
