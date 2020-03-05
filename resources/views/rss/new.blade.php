@extends('layouts.app')

@section('content')
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            {{-- Personal Settings --}}
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new feed</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('feeds') }}" enctype="multipart/form-data">
                            @csrf

                            {{-- Name --}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input
                                        id="name"
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        required
                                        autocomplete="name"
                                    >
                                </div>
                            </div>

                            {{-- Source --}}
                            <div class="form-group row">
                                <label for="source" class="col-md-4 col-form-label text-md-right">{{ __('Source') }}</label>

                                <div class="col-md-6">
                                    <input
                                        id="source"
                                        type="text"
                                        class="form-control"
                                        name="source"
                                        required
                                        autocomplete="source"
                                    >
                                </div>
                            </div>

                            <input
                                type="text"
                                id="team_id"
                                name="team_id"
                                value="{{ Auth::user()->team_id }}"
                                hidden
                            >

                            {{-- Save --}}
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <a class="btn btn-link" href="{{ url('feeds') }}">
            Back
        </a>

    </div>
@endsection
