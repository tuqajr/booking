<div class="container my-5">
    <div class="row g-5">
        <!-- Total Hotels -->
        <div class="col-md-4 ">
            <div class="card text-center">
                <div class="card-body">
                    <i class="bi bi-building fs-1 text-primary"></i>
                    <h5 class="card-title mt-3">Total Hotels</h5>
                    <p class="card-text fs-4 fw-bold">{{ $totalHotels }}</p>
                    <small class="text-muted d-block">
                        <i class="bi bi-check-circle text-success"></i> Active: {{ $activeHotels }}
                    </small>
                    <small class="text-muted d-block">
                        <i class="bi bi-star text-warning"></i> Most Reviews: {{ $hotelWithMostReviews->name ?? 'N/A' }}
                    </small>
                </div>
            </div>
        </div>
  
        <!-- Total Users -->
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="bi bi-people fs-1 text-secondary"></i>
                    <h5 class="card-title mt-3">Total Users</h5>
                    <p class="card-text fs-4 fw-bold">{{ $totalUsers }}</p>
                    <small class="text-muted d-block">
                        <i class="bi bi-person-badge text-info"></i> Admins: {{ $adminUsers }}
                    </small>
                    <small class="text-muted d-block">
                        <i class="bi bi-calendar-plus text-primary"></i> New This Month: {{ $newUsersThisMonth }}
                    </small>
                </div>
            </div>
        </div>
  
        <!-- Total Rooms -->
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="bi bi-door-open fs-1 text-success"></i>
                    <h5 class="card-title mt-3">Total Rooms</h5>
                    <p class="card-text fs-4 fw-bold">{{ $totalRooms }}</p>
                    <small class="text-muted d-block">
                        <i class="bi bi-house-fill text-danger"></i> Occupied: {{ $occupiedRooms }}
                    </small>
                    <small class="text-muted d-block">
                        <i class="bi bi-cash-coin text-warning"></i> Highest Price: ${{ $mostExpensiveRoom->price ?? 'N/A' }}
                    </small>
                </div>
            </div>
        </div>
  
        <!-- Total Bookings -->
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="bi bi-calendar-check fs-1 text-warning"></i>
                    <h5 class="card-title mt-3">Total Bookings</h5>
                    <p class="card-text fs-4 fw-bold">{{ $totalBookings }}</p>
                    <small class="text-muted d-block">
                        <i class="bi bi-hourglass-split text-info"></i> Pending: {{ $pendingBookings }}
                    </small>
                    <small class="text-muted d-block">
                        <i class="bi bi-graph-up-arrow text-success"></i> Revenue: ${{ number_format($monthlyRevenue, 2) }}
                    </small>
                </div>
            </div>
        </div>
  
        <!-- Total Coupons -->
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="bi bi-ticket-perforated fs-1 text-danger"></i>
                    <h5 class="card-title mt-3">Total Coupons</h5>
                    <p class="card-text fs-4 fw-bold">{{ $totalCoupons }}</p>
                    <small class="text-muted d-block">
                        <i class="bi bi-check-circle-fill text-success"></i> Active: {{ $activeCoupons }}
                    </small>
                </div>
            </div>
        </div>
  
        <!-- Total Reviews -->
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="bi bi-chat-square-dots fs-1 text-info"></i>
                    <h5 class="card-title mt-3">Total Reviews</h5>
                    <p class="card-text fs-4 fw-bold">{{ $totalReviews }}</p>
                    <small class="text-muted d-block">
                        <i class="bi bi-star-half text-warning"></i> Avg. Rating: {{ number_format($averageRating, 1) }}
                    </small>
                    <small class="text-muted d-block">
                        <i class="bi bi-hourglass-bottom text-danger"></i> Pending Approval: {{ $pendingReviews }}
                    </small>
                </div>
            </div>
        </div>
    </div>
  </div>