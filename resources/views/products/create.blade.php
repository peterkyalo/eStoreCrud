<x-frontend>
    <x-slot name="title">
        Create Product
    </x-slot>

    <div class="container mt-4">
        <div class="row justify-content-center ">
            <div class="col-md-8">

                @if (session('success'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card shadow p-3">
                    <div class="card-header d-flex">
                        <h4>Create Product</h4>
                        <a href="{{ route('products.index') }}" class="btn btn-danger ms-auto">Back</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="form-control @error('name')
                                is-invalid
                                @enderror"
                                    id="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-floating">
                                <textarea
                                    class="form-control @error('description')
                                is-invalid
                                @enderror"
                                    name="description" placeholder="Write product description" id="description" style="height: 100px">{{ old('description') }}</textarea>
                                <label for="description">Product Description</label>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Product Image</label>
                                <input value="{{ old('image') }}"
                                    class="form-control @error('image')
                                is-invalid
                                @enderror "
                                    name="image" type="file" id="image">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Quantity</label>
                                <input type="number" name="quantity" value="{{ old('quantity') }}"
                                    class="form-control @error('quantity')
                                is-invalid
                                @enderror "
                                    id="name">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Price</label>
                                <input type="number" name="price" value="{{ old('price') }}"
                                    class="form-control @error('price')
                                is-invalid
                                @enderror "
                                    id="name">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
                                    {{ old('name') == true ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Is Active</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-frontend>
