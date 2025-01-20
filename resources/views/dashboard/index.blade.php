@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    
    <!-- Key Metrics -->
    <div class="row">
        <div class="col-md-3">
            <div class="card text-center bg-info text-white">
                <div class="card-body">
                    <h4>Total Books</h4>
                    <h2>{{ $totalBooks }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center bg-warning text-dark">
                <div class="card-body">
                    <h4>Issued Books</h4>
                    <h2>{{ $issuedBooks }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center bg-success text-white">
                <div class="card-body">
                    <h4>Returned Books</h4>
                    <h2>{{ $returnedBooks }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center bg-danger text-white">
                <div class="card-body">
                    <h4>Total Fines</h4>
                    <h2>${{ number_format($totalFines, 2) }}</h2>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Activities -->
    <div class="mt-5">
        <h3>Recent Activities</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Book</th>
                    <th>Issue Date</th>
                    <th>Return Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentActivities as $activity)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $activity->user->name }}</td>
                        <td>{{ $activity->book->title }}</td>
                        <td>{{ $activity->issue_date }}</td>
                        <td>{{ $activity->return_date ?? 'N/A' }}</td>
                        <td>{{ ucfirst($activity->status) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No recent activities found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
