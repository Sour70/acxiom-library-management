<header class="bg-light text-dark py-3 shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h5 mb-0">Library Management System</h1>
        <nav>
            <ul class="nav">
                 	
{{-- Product Details		 --}}

                {{-- <li class="nav-item">
                    <a class="nav-link text-dark" href="/admin">Admin Dashboard</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                @if(auth()->user()->role = 'admin')
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('dashboard') }}">Maintenance</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('dashboard') }}">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('dashboard') }}">Transactions</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('reports.issuedBooks') }}">Issued Books Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('reports.returnedBooks') }}">Returned Books Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('reports.fines') }}">Fine Report</a>
                </li> --}}
                <li class="nav-item">
                    @if(!auth()->user())
                    <a class="nav-link text-dark" href="user/login">Log in</a>
                    @else
                    <a class="nav-link text-dark" href="/logout">Logout</a>
                    @endif
                </li>
            </ul>
        </nav>
    </div>
</header>
