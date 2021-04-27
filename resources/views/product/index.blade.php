@extends('layouts.app')

@section('content')

<h1>Products</h1>

<div>
    <a href="{{ route('products.create') }}">Create</a>
    <hr />
</div>

@foreach ($products as $product)
<div>
    <div>
        <a href="{{ route('products.show', ['product' => $product['id']]) }}">
            <img src="{{ $product['imageUrl'] }}" alt="" width="400px">
        </a>
    </div>

    <div>
        <a href="{{ route('products.edit', ['product' => $product['id']]) }}">Edit</a>
        <form action="{{ route('products.destroy', ['product' => $product['id']]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">delete</button>
        </form>
    </div>
    <hr />
</div>
@endforeach

@endsection

@section('inline_js')
    @parent
@endsection
