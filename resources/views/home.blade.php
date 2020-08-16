@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <a href="{{route('create')}}" class="btn btn-success">Creat</a>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>nama</th>
                            <th>email</th>
                            <th>action</th>
                        </tr>
                        @foreach ($model as $i)
                        <tr>
                            <td>{{$i->name}}</td>
                            <td>{{$i->email}}</td>
                            <td>
                                <a href="{{route('edit', ['id'=>$i->id])}}" class="btn btn-primary btn-sm"> edit</a>
                                <form action="{{route('destroy', ['id'=>$i->id])}}"
                                    onsubmit="return confirm('Are you sure?')" class="d-inline"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">

                                    <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
