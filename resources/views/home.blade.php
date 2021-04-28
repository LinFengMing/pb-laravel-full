@extends('layouts.app')

@section('content')
    <div id="main" data-title="Title Home"></div>
    {{-- <main>
        <div class="card">
            <h1>Home</h1>
            <p class="title">Title</p>
            <div class="description">
                <p>description <p>description</p></p>
                <p>description <p>description</p></p>
                <p>description <p>description</p></p>
            </div>
        </div>
        <br />
        <p>outside!</p>
    </main> --}}
@endsection

@section('inline_js')
    @parent
    <script>
        var containerTag = document.getElementById('main');
        var title = containerTag.getAttribute('data-title');
        render.home(containerTag, title);
    </script>
@endsection
