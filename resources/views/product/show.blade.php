@extends('layouts.app')

@section('content')

<h1>product</h1>
<img src="{{ $product['imageUrl'] }}" alt="" width="400px">

@endsection

@section('inline_js')
    @parent
@endsection
