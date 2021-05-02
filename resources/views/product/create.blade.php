<form action="{{ route('products.store') }}" method="post">
    @csrf
    <div>
        <label for="">
            Product Name: <input type="text" name="product_name" value="{{ old('product_name') }}">
        </label>
    </div>

    <div>
        <button type="submit">Submit</button>
    </div>
</form>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
