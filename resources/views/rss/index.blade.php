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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">RSS Feeds</div>

                <div class="card-body">
                    <ul class="list-group">
                    @foreach (\App\Feed::all() as $feed)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $feed->name }}
                            <div>
                                <a
                                    href="{{ url('feeds/'.$feed->id.'/view') }}"
                                    role="button"
                                    class="btn btn-primary">
                                    View
                                </a>
                                <a
                                    href="{{ url('feeds/'.$feed->id) }}"
                                    role="button"
                                    class="btn btn-secondary">
                                    Edit
                                </a>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                    <a
                        href="{{ url('feeds/new') }}"
                        class="btn btn-primary btn-block"
                        role="button">
                        Add New Feed
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
