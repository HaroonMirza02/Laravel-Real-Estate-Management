<x-layout>
<h3 class="mb-5 text-center">Profile</h3>
<form action="{{ route('admin.admin_dashboard_components.update', $user->id) }}" method="POST">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-12 col-md-6 mb-4">
            <div class="form-outline">
                <input type="text" id="name" class="form-control" name="name" value="{{ $user->name }}">
                <label class="form-label" for="name">Name</label>
            </div>
        </div>
        <div class="col-12 col-md-6 mb-4">
            <div class="form-outline">
                <input type="text" id="username" class="form-control" name="username" value="{{ $user->username }}">
                <label class="form-label" for="username">Username</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 mb-4">
            <div class="form-outline">
                <input type="email" id="email" class="form-control" name="email" value="{{ $user->email }}">
                <label class="form-label" for="email">Email</label>
            </div>
        </div>
        <div class="col-12 col-md-6 mb-4">
            <div class="form-outline">
                <input type="password" id="password" class="form-control" name="password"
                    value="{{ $user->password }}">
                <label class="form-label" for="password">Password</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 mb-4">
            <div class="form-outline">
                <input type="text" id="Phone" class="form-control" name="Phone" value="{{ $user->phone }}">
                <label class="form-label" for="Phone">Phone</label>
            </div>
        </div>

    </div>
    <button type="submit" class="btn btn-secondary btn-rounded btn-block">Update</button>
</form>
</x-layout>