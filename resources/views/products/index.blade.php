<x-frontend>
    <x-slot name="title">
        Products Index Page
    </x-slot>
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-primary" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row d-flex">
            <div class="d-flex mb-3 bg-secondary bg-gradient p-2 rounded-top ">
                <h4 class="text-white">All Products</h4>
                @auth
                    <a href="{{ route('products.create') }}" class="btn btn-primary ms-auto">New Product</a>
                @endauth
            </div>
            @forelse ($products as $product)
                @if ($product->is_active == 'active')
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card h-100 shadow">

                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="Image">
                            <div class="card-body">
                                <div class="d-flex">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <small class="ms-auto">Available:
                                        <strong class="text-info">
                                            {{ $product->quantity < 1 ? 'Out of Stock' : 'In Stock' }} </strong>
                                    </small>
                                </div>
                                <i class="card-text"> Created by: {{ $product->user->name }} </i>
                                <p class="card-text">{{ Str::words($product->description, 15) }}
                                </p>
                                <i class="card-text"> Created At: {{ $product->created_at }} </i>
                                <div class="card-footer mt-3 d-flex">
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-primary">View
                                        details</a>
                                    <button class="btn btn-success btn-sm ms-auto">Price: {{ $product->price }}</button>

                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <span>No product avalibale</span>
            @endforelse
        </div>
    </div>
</x-frontend>
