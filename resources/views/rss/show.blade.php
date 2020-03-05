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
                    <div class="card-header">Update {{ $feed->name }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('feeds/' . $feed->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            {{-- Name --}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input
                                        id="name"
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        value="{{ $feed->name }}"
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
                                        value="{{ $feed->source }}"
                                        required
                                        autocomplete="source"
                                    >
                                </div>
                            </div>

                            <input
                                type="text"
                                id="team"
                                name="team"
                                value="{{ $feed->team_id }}"
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
                    {{-- Delete --}}
                    <div class="form-group row">
                        <div class="col-md-8 offset-md-4">
                            <h4>Delete {{ $feed->name }}?</h4>
                            <p>Warning: This process is permanent, and the feed will no longer be available.</p>
                            <a
                                href="{{ url('feeds/' . $feed->id . '/destroy') }}"
                                class="btn btn-danger"
                                role="button">
                                {{ __('Delete') }}
                            </a>
                        </div>
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
