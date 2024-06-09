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
            <a href="{{ route('admin.admin_dashboard_components.profile') }}" class="sidebar-link">
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
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#agents"
                        aria-expanded="false" aria-controls="agents">
                        Agents
                    </a>
                    <ul id="agents" class="sidebar-dropdown list-unstyled collapse">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.admin_dashboard_components.agents.view_agents') }}"
                                class="sidebar-link">View Agents</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#users"
                        aria-expanded="false" aria-controls="users">
                        Users
                    </a>
                    <ul id="users" class="sidebar-dropdown list-unstyled collapse">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.admin_dashboard_components.users.view_users') }}"
                                class="sidebar-link">View Users</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                        data-bs-target="#properties" aria-expanded="false" aria-controls="properties">
                        Properties
                    </a>
                    <ul id="properties" class="sidebar-dropdown list-unstyled collapse">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.admin_dashboard_components.properties.add_properties') }}"
                                class="sidebar-link">Add Properties</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('admin.admin_dashboard_components.properties.view_properties') }}"
                                class="sidebar-link">View Properties</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a href="{{route('admin.testimonials')}}" class="sidebar-link">
                <i class="lni lni-cog"></i>
                <span>Manage Testimonials</span>
            </a>
        </li>
    </ul>
    <div class="sidebar-footer">
        <a href="" class="sidebar-link" onclick="logout()">
            <i class="lni lni-exit"></i>
            <span>Logout</span>
        </a>
        <form id="logout-form" action="{{ route('profile.destroy') }}" method="POST">

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
