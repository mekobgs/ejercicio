@extends('employees.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Assigned Projects</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('assigProject.create') }}"> Assign Project</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Project</th>
            <th>Assigned</th>
            <th>Amount</th>
        </tr>
        @foreach ($assigned as $item)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $item->project->name }}</td>
            <td>{{ $item->project->created_at }}</td>
            <td>{{ $item->project->amount }}</td>
        </tr>
        @endforeach
    </table>

    {!! $employees->links() !!}

@endsection
