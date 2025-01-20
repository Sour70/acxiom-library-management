<header class="bg-primary text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0">Library Management System</h1>
        <nav>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/admin">Admin Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/user">User Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('reports.issuedBooks') }}">Issued Books Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('reports.returnedBooks') }}">Returned Books Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('reports.fines') }}">Fine Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/logout">Logout</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
