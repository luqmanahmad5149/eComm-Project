@extends('master')
@section('content')
<div class="create-product">
    <h1>Add Product</h1>
    <form action="/createproduct" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter your product name" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" name="price" placeholder="Enter your product price" required>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" class="form-control" name="category" placeholder="Enter your product category" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" placeholder="Enter your product description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="gallery">Picture link</label>
            <input type="text" class="form-control" name="gallery" placeholder="Enter your product picture link" required>
        </div>
    
        <button type="submit" class="btn btn-primary">Create</button>
        <br><br>
    </form>
</div>
@endsection