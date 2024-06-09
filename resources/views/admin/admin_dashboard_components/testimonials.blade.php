<x-layout>
    <section class="intro">
        <div class="mask d-flex align-items-center h-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                        <div class="card-body p-5">
                            <h3 class="mb-5 text-center">Manage Testimonials</h3>

                            <form enctype="multipart/form-data" action="{{route('admin.testimonialSet')}}" method="POST">
                                @csrf
                                @foreach ($testimonials as $testimonial)
                                <h3 class="fw-bold mt-4">Testimonial {{$testimonial->id}}</h3>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-outline">
                                            <input type="text" id="title{{$testimonial->id}}" class="form-control" name="title{{$testimonial->id}}"
                                                value="{{$testimonial->title}}">
                                            <label class="form-label" for="title{{$testimonial->id}}">Title</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-outline">
                                            <textarea name="description{{$testimonial->id}}" rows="3" class="form-control">{{$testimonial->description}}</textarea>
                                            <label class="form-label" for="description{{$testimonial->id}}">Description</label>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="form-outline mb-4">
                                    <img src="{{ asset('uploads/' . $testimonial->image) }}" width="50" alt="">
                                    <input type="file" class="form-control" name="image{{$testimonial->id}}" id="image{{$testimonial->id}}" value="{{$testimonial->image}}">
                                    <label class="form-label" for="image{{$testimonial->id}}">Image</label>
                                </div>
                                <input type="hidden" name="_method" value="PUT">
                                @endforeach
                            
                                <button type="submit" class="btn btn-secondary btn-rounded btn-block">Update Testimonials</button>
                            </form>
                            

</x-layout>
