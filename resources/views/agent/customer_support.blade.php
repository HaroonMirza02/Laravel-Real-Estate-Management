<x-agent-dashboard>
    <h3 class="mb-5 text-center">Contacts</h3>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Property ID</th>
            </tr>
        </thead>
        <tbody>
            @if ($contacts->isNotEmpty())
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>{{ $contact->property_ID }}</td>
                        <td>
                            <a href="{{route('agent.reply', $contact->id)}}" class="btn btn-dark">Reply</a>
                        </td>

                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>

</x-agent-dashboard>
