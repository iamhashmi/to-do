@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add To Do Item</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('todo') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Subject</label>

                                <div class="col-md-6">
                                    <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required autocomplete="subject" autofocus>

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
                                    <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description">

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Priority</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="priority" >
                                        <option>Select Priority</option>
                                        <option value="1">Critical</option>
                                        <option value="2">High</option>
                                        <option value="3">Medium</option>
                                        <option value="4">Low</option>
                                        <option value="5">Very Low</option>
                                    </select>
                                    @error('priority')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Start</label>

                                <div class="col-md-6">
                                    <input type="datetime-local" class="form-control" name="start_at" required value="{{ old('start_at')}}" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Finish</label>

                                <div class="col-md-6">
                                    <input type="datetime-local" class="form-control" name="finish_at" required value="{{ old('finish_at')}}" >
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
