<x-frontendlayout>
    <div class="headerImg d-flex justify-content-center align-items-center flex-column gap-3">
        <div class="bg-dark p-3">

            <form action="{{ route('customSearch') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <input type="text" placeholder="City" class="inputCity w-100" class="form-control "
                            name="city">
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <input type="text" placeholder="Area" class="inputLocation w-100" class="form-control"
                            name="area">
                    </div>
                    <div class="col-md-2 col-12">
                        <select class="form-select" name="purpose">
                            <option value="Sale">Sale</option>
                            <option value="Rent">Rent</option>
                        </select>
                    </div>

                    <div class="col-md-2 col-6">
                        <input type="submit" value="Find" class="inputFind btn btn-light btn-block w-100">
                    </div>

                </div>

            </form>
        </div>
    </div>

    <div class="mt-4 py-3">
        <h3 class="text-center mt-3 mb-2 fw-bold ">Latest Listings</h3>
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
                                            <a type="button" href="{{ route('property', $property->id) }}"
                                                class="btn btn-sm btn-outline-secondary">View</a>
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
    <div class="container mt-4">
        <section>
            <div class="row d-flex justify-content-center mb-4">
                <div class="col-md-10 col-xl-8 text-center">
                    <h3 class="mb-4 fw-bold">Testimonials</h3>
                </div>
            </div>
            <div class="row text-center">
                @foreach ($testimonials as $testimonial)
                <div class="col-md-4 mb-5 mb-md-0">
                    <div class="d-flex justify-content-center mb-4">
                        <img src="{{ asset('uploads/'.$testimonial->image) }}"
                            class="rounded-circle shadow-1-strong" width="150" height="150" />
                    </div>
                    <h5 class="mb-3">{{$testimonial->title}}</h5>
                    <p class="px-xl-3">
                        <i class="fas fa-quote-left pe-2"></i>{{$testimonial->description}}
                    </p>
                    <ul class="list-unstyled d-flex justify-content-center mb-0">
                        <li>
                            <i class="fas fa-star fa-sm text-warning"></i>
                        </li>
                        <li>
                            <i class="fas fa-star fa-sm text-warning"></i>
                        </li>
                        <li>
                            <i class="fas fa-star fa-sm text-warning"></i>
                        </li>
                        <li>
                            <i class="fas fa-star fa-sm text-warning"></i>
                        </li>
                        <li>
                            <i class="fas fa-star-half-alt fa-sm text-warning"></i>
                        </li>
                    </ul>
                </div>

                @endforeach
            </div>
        </section>
    </div>
    <div class="bodyImg mt-5 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row gx-5">
                <div class="col-4">
                    <div class="d-flex flex-column justify-content-center align-items-center ">
                        <img src="{{ asset('images/house.png') }}" width="auto" height="100px">
                        <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas
                            accusamus possimus soluta mollitia quia natus sint earum atque eum aspernatur.</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-flex flex-column justify-content-center align-items-center ">
                        <img src="{{ asset('images/house.png') }}" width="auto" height="100px">
                        <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas
                            accusamus possimus soluta mollitia quia natus sint earum atque eum aspernatur.</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-flex flex-column justify-content-center align-items-center ">
                        <img src="{{ asset('images/house.png') }}" width="auto" height="100px">
                        <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas
                            accusamus possimus soluta mollitia quia natus sint earum atque eum aspernatur.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-frontendlayout>
