<x-layout>
    <h3 class="mb-5 text-center">View Agents</h3>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if ($agents->isNotEmpty())
                @foreach ($agents as $agent)
                    <tr>
                        <td>{{ $agent->id }}</td>
                        <td>{{ $agent->name }}</td>
                        <td>{{ $agent->username }}</td>
                        <td>{{ $agent->email }}</td>
                        <td>{{ $agent->phone }}</td>
                        <td>{{ $agent->status }}</td>
                        <td>
                            <a href="#"
                                onclick=""
                                class="btn btn-dark">Delete</a>
                            <form
                                id="delete-property-from-{{ $agent->id }}"
                                action=" "
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