<x-frontendlayout>
    <div class="headerImg d-flex justify-content-center align-items-center flex-column gap-3">
        <div class="p-3 text-white">
            <h1>Property Details</h1>
            <h1>{{ $properties->title }}</h1>
        </div>
    </div>
    <div class="d-lg-flex justify-content-center" id="top">
        <section class="">
            <div class="mt-4 py-3">
                <h3 class="text-center mt-3 mb-2"></h3>
                <div>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center ">
                                <img src="{{ asset('uploads/property/' . $properties->image) }}">
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </section>

        <section class="">
            <div class="container">
                <div class="text-black text-center rounded-3 me-3 bg-light mb-4">
                    <h2 class="mt-5 fw-bold py-3">Property Details</h2>
                    <div class="d-flex flex-column justify-content-between align-items-start px-5 mt-4">
                        <h2><span class="fw-bold">${{ $properties->price }}</span></h2>
                        <p><span class="fw-bold">Agent Name:</span> {{ $properties->name }}</p>
                        <p><span class="fw-bold">Agent Email:</span> {{ $properties->email }}</p>
                        <p><span class="fw-bold">Agent Phone:</span> {{ $properties->phone }}</p>
                        <p><span class="fw-bold">Property Type: </span> {{ $properties->type }}</p>
                        <p><span class="fw-bold">Property Purpose:</span> {{ $properties->purpose }}</p>

                    </div>

                </div>
            </div>
        </section>
    </div>
    <section>
        <div class="container bg-light text-dark rounded-2 ">
            <div class="d-inline-block ">
                <a href="#overview" class="btn rounded 3">Overview</a>
                <a href="#instalment" class="btn  rounded 3">Instalment</a>
                <a href="#contact" class="btn  rounded 3">Contact</a>
            </div>
            <hr class="hr" />
            <div id="overview" class="mt-4">
                <h4 class="text-center fw-bold ">Overview</h4>
                <div class="d-flex justify-content-evenly mt-5">
                    <div>
                        <p><span class="fw-bold">Property Title: </span> {{ $properties->title }}</p>
                        <p><span class="fw-bold">Property Price: </span> ${{ $properties->price }}</p>

                        <p><span class="fw-bold">Property Purpose: </span> {{ $properties->purpose }}</p>
                        <p><span class="fw-bold">Property Type: </span> {{ $properties->type }}</p>

                        <p><span class="fw-bold">Bedrooms: </span> {{ $properties->bedroom }}</p>
                        <p><span class="fw-bold">Bathrooms: </span> {{ $properties->bathroom }}</p>
                    </div>
                    <div>
                        <p><span class="fw-bold">Address: </span> {{ $properties->address }}</p>
                        <p><span class="fw-bold">City: </span> {{ $properties->city }}</p>
                        <p><span class="fw-bold">Area: </span> {{ $properties->area }}</p>
                        <p><span class="fw-bold">Description: </span> {{ $properties->description }}</p>
                    </div>
                </div>
            </div>
            <hr class="hr" />
            <div id="instalment" class="mt-4">
                <h4 class="text-center fw-bold ">Instalment</h4>
                <div class="container mt-5">
                    <form>
                        <div class="row d-flex justify-content-center ">
                            <div class="col-6">
                                <input type="numbers" id="pricePerYear" class="form-control" disabled>
                                <label>Price Per Year</label>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center ">
                            <div class="col-3">
                                <input type="numbers" id="years" class="form-control">
                                <label>Years</label>
                            </div>
                            <div class="col-3">
                                <input type="numbers" id="interest" class="form-control">
                                <label>Interest</label>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center ">
                            <div class="col-6">
                                <input type="numbers" id="price" class="form-control"
                                    value="{{ $properties->price }}" disabled>
                                <label>Price</label>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center mt-2">
                            <div class="col-6">
                                <button type="button" class="form-control bg-dark text-white"
                                    onclick="calculateInstallment()">Calculate</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr class="hr" />
            <div id="contact" class="mt-4 mb-5">
                <h4 class="text-center fw-bold">Contact</h4>
                <div class="container mt-5">
                    <form action="{{route('contact.store')}}" method="POST">
                        @csrf
                        <div class="row d-flex justify-content-center ">
                            <div class="col-6">
                                <input type="text" name="name" class="form-control">
                                <label>Name</label>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center ">
                            <div class="col-6">
                                <input type="text" name="email" class="form-control">
                                <label>Email</label>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center ">
                            <div class="col-6">
                                <input type="text" name="phone" class="form-control">
                                <label>Phone</label>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center ">
                            <div class="col-6">
                                <textarea class="form-control" rows="4" name="message"></textarea>
                                <label>Message</label>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center ">
                            <div class="col-6">
                                <input type="hidden" name="agent_id" value="{{$properties->agent_id}}">
                                <input type="hidden" name="property_id" value="{{$properties->id}}">
                                <input type="submit" class="form-control bg-dark text-white mt-3" value="Submit">
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>
    <script>
        function calculateInstallment() {
            var price = parseFloat(document.getElementById('price').value);
            var years = parseFloat(document.getElementById('years').value);
            var interest = parseFloat(document.getElementById('interest').value);
            var pricePerYear = document.getElementById('pricePerYear');

            pricePerYear.value = Math.ceil((price / years) * interest);
        }
    </script>
</x-frontendlayout>
