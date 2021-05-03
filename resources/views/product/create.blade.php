<form action="{{ route('products.store') }}" method="post">
    @csrf
    <div>
        <label for="">
            Product Name: <input type="text" name="product_name" value="{{ old('product_name') }}">
        </label>
    </div>
    <br>
    <div>
        <label for="">
            Product Price: <input type="number" min="0" name="product_price" value="{{ old('product_price') }}">
        </label>
    </div>
    <br>
    <div>
        <label for="">
            Product Image: <input type="text" name="product_image" value="{{ old('product_name') }}">
        </label>
    </div>
    <br>
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
