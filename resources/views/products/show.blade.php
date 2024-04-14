<x-frontend>

    <x-slot name="title">
        Product Details
    </x-slot>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-header d-flex  mb-3">
                    <h4>Product Details</h4>
                    <div class="ms-auto">
                        <a href="{{ route('products.index') }}" class="btn btn-danger">Back</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <i class="card-text"> Created by: <small class="text-info">{{ $product->user->name }}</small>
                        </i>
                        <p class="card-text">{{ $product->description }}
                        </p>
                        <p class="card-text text-info">Available Quantity: {{ $product->quantity }}
                        </p>
                        <p class="card-text text-info">Price: {{ $product->price }}
                        </p>
                        <p>
                            <i class="card-text"> Created At: {{ $product->created_at }} </i>
                        </p>
                        <form method="POST" action="{{ route('products.destroy', $product) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you shure to delete')"
                                class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-frontend>
