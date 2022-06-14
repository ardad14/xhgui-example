@extends('main_layout')

@section('content')
    <div class="col-10" style="margin: 0 auto">
        <table class="table" >
            <thead>
            <tr>
                <th scope="col" class="table-info">#</th>
                <th scope="col" class="table-info">Name</th>
                <th scope="col" class="table-info">Surname</th>
                <th scope="col" class="table-info">Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row" class="table-warning">{{ $user->id }}</th>
                    <td class="table-primary">{{ $user->name }}</td>
                    <td class="table-secondary">{{ $user->surname }}</td>
                    <td class="table-success">{{ $user->email }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

