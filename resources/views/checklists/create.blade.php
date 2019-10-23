@extends('layouts.app')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Checklist</strong> Add Items
            </div>

            @if ($errors->any())
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                    <span class="badge badge-pill badge-danger"></span>
                    {{ implode('', $errors->all(':message')) }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif          
            <div class="card-body card-block">
                {{Form::open(['route' => 'checklist.store', 'class' => 'form-horizontal', 'method' => 'POST'])}}
                     <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Checklist Name*</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="name" placeholder="Checklist Name" class="form-control" required>
                            <small class="form-text text-muted">Enter the Checklist name</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="title" class=" form-control-label">Start Date*</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="date" name="start_date" placeholder="Start Date" class="form-control datetimepicker-input" id="datepicker" required>
                            
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="title" class=" form-control-label">End Date*</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="date" name="end_date" placeholder="End Date" class="form-control datetimepicker-input" id="datepicker" required>
                            
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class=" form-control-label">Select Items</label>
                        </div>
                        <div class="col-12 col-md-9">
                            @foreach($items as $item)
                                <div class="form-check">
                                    <div class="checkbox">
                                        <label for="checkbox1" class="form-check-label ">
                                        {{ Form::checkbox('item_id[]', $item->id, null, ['class' => 'form-check-input', 'id' => 'checkbox1']) }} {{$item->name}}
                                        </label>
                                    </div>
                               
                                </div>
                            @endforeach
                            
                        </div>
                    </div>                    

                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                {{Form::close()}}
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
@endsection