{{-- @extends('layout.master')

@section('edit')
    <h2 class="mb-4">Edit product</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" value="{{ $product->description }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection --}}


{{-- 
<form method="POST" action="{{ route('products.update', $product->id) }}" class="mx-5">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input type="text" name="Name" value="{{ $product->Name }}" required><br><br>

    <label for="description">Description:</label>
    <textarea name="Description" required>{{ $product->Description }}</textarea><br><br>

    <label for="SKU">SKU:</label>
    <textarea name="SKU" required>{{ $product->SKU }}</textarea><br><br>

    <label for="regularprice">Regular Price:</label>
    <textarea name="regularprice" required>{{ $product->regular_price }}</textarea><br><br>

    <label for="saleprice">Sale Price:</label>
    <textarea name="saleprice" required>{{ $product->sale_price }}</textarea><br><br>

    <input type="submit" value="Update">
    @authuer: Komal Paramar
    method:
    description:
    Usage:
    Attribute
</form> --}}
@extends('layout.master')

@section('edit')
<form method="POST" action="{{ route('products.update', $product->id) }}" class="mx-5">
    @csrf
    @method('PUT')

    {{-- <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="Name" value="{{ $product->Name }}" class="form-control" required>
    </div> --}}
    <div class="row">
        <div class="col-md-6">
            <label for="name">Name:</label>
            <input type="text" name="name" required class="form-control" placeholder="samosa">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="active">Active:</label>
            <select name="active" required class="form-control">
                <option value="1">YES</option>
                <option value="0">NO</option>
            </select>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="description">Description:</label>
                <textarea name="description" required class="form-control" placeholder="samosa"></textarea>
                @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>

            <div class="col-md-6">
                <label for="brand">Brand:</label>
                <select name="brand" required class="form-control">
                    <option value="">Select a brand</option>
                    <option value="Electronics">NIKE</option>
                    <option value="Clothing">desi Rasoi</option>
                    <option value="Home">Maharaja</option>
                    <option value="Sports">Raymond</option>
                    <option value="Books">Logitech</option>
                </select>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="SKU">SKU:</label>
                    <input type="string" name="sku" required class="form-control" placeholder="samosa">
                    @error('sku')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="col-md-6">
                    <label for="category">Category:</label>
                    <select name="category" required class="form-control">
                        <option value="">Select a category</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Clothing">Clothing</option>
                        <option value="Home">Home</option>
                        <option value="Sports">Sports</option>
                        <option value="Books">Books</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="saleprice">Sale Price:</label>
        <input type="text" name="saleprice" value="{{ $product->sale_price }}" class="form-control" required>
    </div>
            </div>

    <div class="form-group">
        <label for="saleprice">Sale Price:</label>
        <input type="text" name="saleprice" value="{{ $product->sale_price }}" class="form-control" required>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="regular_price">Regular Price:</label>
            <input type="number" name="regular_price" required class="form-control" placeholder="50.00">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="sale_price">Sale Price:</label>
            <input type="number" name="sale_price" required class="form-control"  placeholder="80.00">
        </div>

        <div class="col-md-6">
            <div class="form-group mt-2">
                <label for="">Update Feature Image</label>
                <input type="file" name="image" id="" class="form-control" placeholder=""
                    aria-describedby="helpId">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="Tax96">Tax96:</label>
            <input type="number" name="Tax96" required class="form-control" placeholder="0.00">
        </div>

        <div class="col-md-6">
            <div class="form-group mt-2">
                <label for="">Add More Images</label>
                <input type="file" name="image" id="" class="form-control" placeholder=""
                    aria-describedby="helpId">
            </div>
        </div>
    </div>    
    <div class="row mt-3">
        <div class="col-md-6">
            <button id="cancelButton" type="button" class="btn btn-secondary">Cancel</button>
        </div>
        <div class="col-md-6 text-end">
            <input id="updateButton" type="submit" class="btn btn-primary" value="Update">
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Handle cancel button click event
            $('#cancelButton').click(function() {
                // Redirect the user to a specific page
                window.location.href = '/form';

                // Or clear the form fields
                $('#formId')[0].reset();
            });
        });
    </script>
</form>

@endsection

   