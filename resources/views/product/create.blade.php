<form action="{{ route('products.store') }}" method="post">
    @csrf
    <input type="text" name="title">
    <button type="submit">Submit</button>
</form>
