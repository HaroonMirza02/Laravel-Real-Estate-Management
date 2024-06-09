<div class="main">
    <nav class="navbar navbar-expand px-4 py-3">
        <form action="#" class="d-none d-sm-inline-block">

        </form>
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                        <img src="{{ asset('assets/images/account.png') }}" class="avatar img-fluid" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end rounded">

                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <main class="content px-3 py-4">
        <div class="container-fluid">
            <div class="mb-3">
                <h3 class="fw-bold fs-4 mb-3">Admin Dashboard</h3>
                <div class="row">
                    <div class="col-12 col-md-4 ">
                        <div class="card border-0">
                            <div class="card-body py-4">
                                <h5 class="mb-2 fw-bold">
                                    Properties Added
                                </h5>
                                <p class="mb-2 fw-bold">
                                    {{$properties->count()}}
                                </p>
                                <div class="mb-0">
                                    <span class="badge text-success me-2">
                                        +100.0%
                                    </span>
                                    <span class=" fw-bold">
                                        Since Last Month
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 ">
                        <div class="card  border-0">
                            <div class="card-body py-4">
                                <h5 class="mb-2 fw-bold">
                                    Agents Registered
                                </h5>
                                <p class="mb-2 fw-bold">
                                    {{$agents->count()}}
                                </p>
                                <div class="mb-0">
                                    <span class="badge text-success me-2">
                                        +150.0%
                                    </span>
                                    <span class="fw-bold">
                                        Since Last Month
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 ">
                        <div class="card border-0">
                            <div class="card-body py-4">
                                <h5 class="mb-2 fw-bold">
                                    Users Registered
                                </h5>
                                <p class="mb-2 fw-bold">
                                    {{$users->count()}}
                                </p>
                                <div class="mb-0">
                                    <span class="badge text-success me-2">
                                        +9.0%
                                    </span>
                                    <span class="fw-bold">
                                        Since Last Month
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
</div>
