@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">All Items</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right pull right">
                    <a class="au-btn au-btn-icon au-btn--green au-btn--small btn btn-sm btn-success" href="{{route('item.create')}}">
                        <i class="zmdi zmdi-plus"></i>add item</a>
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
                            <th>created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data->count())
                            @foreach($data as $key => $item)
                                <tr class="tr-shadow">
                                    <td>
                                        {{ ++ $key}}
                                    </td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a class="item btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Edit" href="{{route('item.edit', $item->id)}}">
                                                <i class="zmdi zmdi-edit"></i>Edit
                                            </a>
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
