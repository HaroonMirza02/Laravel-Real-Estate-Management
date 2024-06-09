<x-agent-dashboard>
    <h3 class="mb-5 text-center">Reply User</h3>

    <form enctype="multipart/form-data" action="{{route('agent.reply_store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 mb-4">
                <div class="form-outline">
                    <input type="text" id="title"
                        class="form-control" name="title">
                    <label class="form-label"
                        for="title">Title</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <div class="form-outline">
                    <input type="text" 
                        class="form-control" name="to" value="{{$contacts->email}}">
                    <label class="form-label"
                        for="price">To</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <div class="form-outline">
                    <input type="text" 
                        class="form-control" name="subject">
                    <label class="form-label"
                        for="price">Subject</label>
                </div>
            </div>
        </div>
        <div class="form-outline mb-4">
            <textarea class="form-control" name="message" rows="4"></textarea>
            <label class="form-label"
                for="description">Message</label>
        </div>
        <button type="submit"
            class="btn btn-secondary btn-rounded btn-block">Reply</button>
    </form>


</x-agent-dashboard>