@extends('layouts.app')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Item</strong> Add
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
                {{Form::open(['route' => 'item.store', 'class' => 'form-horizontal', 'method' => 'POST'])}}
                     <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Item Name*</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="name" placeholder="Item Name" class="form-control" required>
                            <small class="form-text text-muted">Enter the Item name</small>
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