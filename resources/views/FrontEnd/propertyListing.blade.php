<x-frontendlayout>
    <div class="headerImg d-flex justify-content-center align-items-center flex-column gap-3">
        <div class="p-3 text-white">
            <h1>Property Listings </h1>
        </div>
    </div>
    <div class="d-md-flex">
        <section class="flex-grow-1">
            <div class="mt-4 py-3">
                <h3 class="text-center mt-3 mb-2">Listings</h3>
                <div>
                    <div class="container">

                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            @foreach ($properties as $property)
                                <div class="col-md-4 col-12">
                                    <div class="card shadow-sm">
                                        <img src="{{ asset('uploads/property/' . $property->image) }}" alt=""
                                            height="300px">
                                        <div class="card-body">
                                            <h3>{{ $property->title }}</h3>
                                            <p class="card-text" style="position: relative;">
                                                {{ $property->description }}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a type="button" href="{{route('property', $property->id)}}" class="btn btn-sm btn-outline-secondary">View</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="me-3">
            <div class="text-black text-center rounded-3 me-2" style="background-color: white">
                <h2 class="mt-5  py-3">Filters</h2>
                <form action="{{route('listingsFiltered')}}" method="POST">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col d-flex flex-column align-items-start ">
                                <input type="number" name="bathroom" class="form-control">
                                <label for="bathroom">Bathrooms</label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col d-flex flex-column align-items-start ">
                                <input type="number" name="bedroom" class="form-control">
                                <label for="bedrooms">Bedrooms</label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col d-flex flex-column align-items-start">
                                <select name="purpose" class="form-select">
                                    <option value="Rent">Rent</option>
                                    <option value="Sale">Sale</option>
                                </select>
                                <label for="purpose">Type</label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col d-flex flex-column align-items-start">
                                <input type="text" name="area" class="form-control">
                                <label for="area">Area</label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col d-flex flex-column align-items-start">
                                <input type="text" name="city" class="form-control">
                                <label for="city">City</label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col d-flex flex-column align-items-center mb-3">
                                <input type="submit" value="Submit" class="btn btn-dark">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </section>
    </div>
</x-frontendlayout>
