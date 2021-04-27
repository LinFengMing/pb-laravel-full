<form action="{{ route('products.update', ['product' => $product['id']]) }}" method="post">
    @csrf
    @method('PATCH')
    <input type="text" name="title">
    <button type="submit">Submit</button>
</form>
