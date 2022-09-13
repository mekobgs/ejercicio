@extends('assignProject.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Assign Project</h2>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('assignProject.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group{{ $errors->has('employees') ? ' has-error' : '' }}">
                 <label for="employees" class="col-md-4 control-label">Select an Employee</label>
                 <div class="col-md-6">

                      <select class="form-control" id="town">
                      <option value="">Select an Employee</option>
                      @foreach ($employees as $employee)
                      <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                      @endforeach
                      </select>
                     @if ($errors->has('employees'))
                         <span class="help-block">
                             <strong>{{ $errors->first('employees') }}</strong>
                         </span>
                     @endif
                 </div>
             </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group{{ $errors->has('projects') ? ' has-error' : '' }}">
                 <label for="projects" class="col-md-4 control-label">Select an Projects</label>
                 <div class="col-md-6">

                      <select class="form-control" id="town">
                      <option value="">Select an Projects</option>
                      @foreach ($projects as $project)
                      <option value="{{ $project->id }}">{{ $project->name }}</option>
                      @endforeach
                      </select>
                     @if ($errors->has('projects'))
                         <span class="help-block">
                             <strong>{{ $errors->first('projects') }}</strong>
                         </span>
                     @endif
                 </div>
             </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
