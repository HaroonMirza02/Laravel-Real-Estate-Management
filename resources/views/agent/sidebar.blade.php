<aside id="sidebar">
    <div class="d-flex">
        <button class="toggle-btn" type="button">
            <i class="lni lni-grid-alt"></i>
        </button>
        <div class="sidebar-logo">
            <a href="#">HomeLink</a>
        </div>
    </div>
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="{{ route('agent.profile') }}" class="sidebar-link">
                <i class="lni lni-user"></i>
                <span>Profile</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                <i class="lni lni-layout"></i>
                <span>Manage</span>
            </a>
            <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                        data-bs-target="#properties" aria-expanded="false" aria-controls="properties">
                        Properties
                    </a>
                    <ul id="properties" class="sidebar-dropdown list-unstyled collapse">
                        <li class="sidebar-item">
                            <a href="{{ route('agent.add_properties') }}"
                                class="sidebar-link">Add Properties</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('agent.view_properties') }}"
                                class="sidebar-link">View Properties</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('agent.contact') }}" class="sidebar-link">
                <i class="lni lni-popup"></i>
                <span>Customer Support</span>
            </a>
        </li>
    </ul>
    <div class="sidebar-footer">
        <a href="" class="sidebar-link" onclick="logout()">
            <i class="lni lni-exit"></i>
            <span>Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logouts') }}" method="POST">

            @csrf
            @method('delete')
        </form>

    </div>
</aside>

<script>
    function logout() {
        document.getElementById('logout-form').submit();
      }
</script>
