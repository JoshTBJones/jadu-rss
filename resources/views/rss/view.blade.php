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
        <h2> {{ $feed->name }} </h2>
        <div class="col-md-12">
            @if (count($items) > 0)
                {{ $items->links() }}

                @foreach ($items as $index => $item)
                    @component('components.rssitem', [
                        'link' => $item['link'],
                        'title' => $item['title'],
                        'description' => $item['description'],
                        'published' => $item['meta']['published']
                    ])
                    @endcomponent
                @endforeach

                {{ $items->links() }}
            @else
                <h1>Feed Empty</h1>
            @endif
            
        </div>
    </div>

    <hr>

    <a class="btn btn-link" href="{{ url('feeds') }}">
        Back
    </a>
</div>
@endsection
