@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                        @if (session('warning'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('warning') }}
                            </div>
                        @endif
                        @if (session('delete'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('delete') }}
                            </div>
                        @endif
                    <p><a href="{{route('create.item')}}" class="btn btn-primary" >Add To Do Item</a></p>
                    <div class="table-responsive">
                        <table class="table ">
                        <tr>
                            <th>#</th>
                            <th>Subject</th>
                            <th>Description</th>
                            <th>Start</th>
                            <th>Finish</th>
                            <th colspan="2">Actions</th>

                            @php $count = 0;@endphp
                        </tr>

                            @foreach($items as $item)
                                @php $count ++;@endphp
                            <tr>
                                <td>{{$count}}</td>
                            <td>{{$item->subject}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->start_at}}</td>
                            <td>{{$item->finish_at}}</td>
                                <td><a class="btn btn-warning" href="{{route('todo.edit',['item'=>$item->id])}}">Edit</a>  </td>
                                    <td>
                                    <a class="btn btn-danger" href="{{route('todo.delete',['item'=>$item->id])}}"> Delete</a></td>
                        </tr>
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
