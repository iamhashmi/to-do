@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Item</div>

                    <div class="card-body">

                        <form method="POST" action="{{route('todo.update', ['item'=>$item->id])}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Subject</label>

                                <div class="col-md-6">
                                    <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ $item->subject}}" >

                                    @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" cols="5" rows="5"  name="description">{{$item->description}}</textarea>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Priority</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="priority" >
{{--                                        <option value="{{$item->priority}}">{{$item->priority}}</option>--}}
                                        <option {{$item['priority'] === 1 ? 'selected' : ''}} value="1">Critical</option>
                                        <option {{$item['priority'] === 2 ? 'selected' : ''}} value="2">High</option>
                                        <option {{$item['priority'] === 3 ? 'selected' : ''}} value="3">Medium</option>
                                        <option {{$item['priority'] === 4 ? 'selected' : ''}} value="4">Low</option>
                                        <option {{$item['priority'] === 5 ? 'selected' : ''}} value="5">Very Low</option>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Start</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="start_at"  value="{{$item->start_at}}" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Finish</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="finish_at" required value="{{ $item->finish_at}}" >
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
