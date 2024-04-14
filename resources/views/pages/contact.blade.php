<x-frontend>

    <x-slot name="title">
        Contact Page
    </x-slot>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-header d-flex  mb-3">
                    <h4>Product Details</h4>
                    <div class="ms-auto">
                        <a href="#" class="btn btn-danger">Back</a>
                        <a href="#" class="btn btn-primary">Edit</a>
                    </div>
                </div>
                <div class="card">
                    <img src="" class="card-img-top" alt="Image">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <i class="card-text"> Created by: <small class="text-info"></small>
                        </i>
                        <p class="card-text">
                        </p>
                        <p class="card-text text-info">Available Quantity:
                        </p>
                        <p class="card-text text-info">Price:
                        </p>
                        <p>
                            <i class="card-text"> Created At: </i>
                        </p>
                        <form method="POST" action="#">
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
