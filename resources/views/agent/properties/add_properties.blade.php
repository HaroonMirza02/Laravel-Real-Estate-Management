<x-agent-dashboard>
    <h3 class="mb-5 text-center">Add Property</h3>

    <form enctype="multipart/form-data" action="{{ route('agent.store_properties') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <div class="form-outline">
                    <input type="text" id="title"
                        class="form-control" name="title">
                    <label class="form-label"
                        for="title">Title</label>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-4">
                <div class="form-outline">
                    <input type="number" step="0.01" id="price"
                        class="form-control" name="price">
                    <label class="form-label"
                        for="price">Price</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <div class="form-outline">
                    <select class="form-select"
                        aria-label="Default select example" name="purpose" id="purpose">
                        <option selected value="1">Buy</option>
                        <option value="2">Rent</option>
                    </select>
                    <label class="form-label" for="purpose">Purpose</label>

                </div>
            </div>
            <div class="col-12 col-md-6 mb-4">
                <div class="form-outline">
                    <select class="form-select"
                        aria-label="Default select example" name="type" id="type">
                        <option selected value="1">House</option>
                        <option value="2">Appartment</option>
                    </select>
                    <label class="form-label"
                        for="type">Type</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <div class="form-outline">
                    <input type="number" id="bathroom"
                        class="form-control" name="bathroom">
                    <label class="form-label"
                        for="bathroom">Bathroom</label>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-4">
                <div class="form-outline">
                    <input type="number" id="bedroom"
                        class="form-control" name="bedroom">
                    <label class="form-label"
                        for="bedroom">Bedroom</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <div class="form-outline">
                    <input type="text" id="city"
                        class="form-control" name="city">
                    <label class="form-label"
                        for="city">City</label>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-4">
                <div class="form-outline">
                    <input type="text" id="area"
                        class="form-control" name="area">
                    <label class="form-label"
                        for="area">Area</label>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-outline">
                    <select class="form-select" name="agent_id">
                        @foreach ($agents as $agent)
                            <option value="{{$agent->id}}">{{$agent->name}}</option>
                        @endforeach
                    </select>
                    <label class="form-label"
                        for="area">Agents</label>
                </div>
            </div>
        </div>

        <div class="form-outline mb-4">
            <textarea name="address" class="form-control" id="address" rows="2"></textarea>
            <label class="form-label" for="address">Address</label>
        </div>

        <div class="form-outline mb-4">
            <textarea name="description" class="form-control" id="description" rows="4"></textarea>
            <label class="form-label"
                for="description">Description</label>
        </div>
        <div class="form-outline mb-4">
            <input type="file" class="form-control" name="image" id="image">
            <label class="form-label" for="image">Image</label>
        </div>

        <button type="submit"
            class="btn btn-secondary btn-rounded btn-block">Create
            Property</button>
    </form>


</x-agent-dashboard>