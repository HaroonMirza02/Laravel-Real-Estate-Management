<x-layout>
    <h3 class="mb-5 text-center">View Property</h3>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th></th>
                <th>ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Purpose</th>
                <th>Type</th>
                <th>Bedroom</th>
                <th>Bathroom</th>
                <th>City</th>
                <th>Address</th>
                <th>Area</th>
                <th>Desciption</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($property->isNotEmpty())
                @foreach ($property as $prop)
                    <tr>
                        <td>
                            @if ($prop->image != "")
                            <img src="{{asset('uploads/property/'.$prop->image)}}" width="50" alt="">
                            @endif
                        </td>
                        <td>{{ $prop->id }}</td>
                        <td>{{ $prop->title }}</td>
                        <td>{{ $prop->price }}</td>
                        <td>{{ $prop->purpose }}</td>
                        <td>{{ $prop->type }}</td>
                        <td>{{ $prop->bedroom }}</td>
                        <td>{{ $prop->bathroom }}</td>
                        <td>{{ $prop->city }}</td>
                        <td>{{ $prop->address }}</td>
                        <td>{{ $prop->area }}</td>
                        <td>{{ $prop->description }}</td>
                        <td>
                            <a href="{{ route('admin.admin_dashboard_components.properties.edit_properties', $prop->id) }}"
                                class="btn btn-dark">Edit</a>
                            <a href="#" onclick="deleteProperty({{ $prop->id }})"
                                class="btn btn-dark">Delete</a>
                            <form id="delete-property-from-{{ $prop->id }}"
                                action="{{ route('admin.admin_dashboard_components.properties.destroy_properties', $prop->id) }} "
                                method="POST">

                                @csrf
                                @method('delete')
                            </form>
                        </td>

                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
    <script>
        function deleteProperty(id) {
            document.getElementById("delete-property-from-" + id).submit();
        }
    </script>

</x-layout>
