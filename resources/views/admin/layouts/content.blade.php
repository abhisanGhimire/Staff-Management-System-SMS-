<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Users</div>
                        <p><i class="fas fa-user " style="font-size: 80px;padding-left:20px;"></i></p>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#" style="font-size: 18px;">
                                {{App\User::all()->count()}}
                            </a>
                            <div class="small text-white"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Department</div>
                        <p><i class="fas fa-home" style="font-size: 80px;padding-left:20px;"></i></p>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#" style="font-size: 18px;">
                                {{App\Department::all()->count()}}
                            </a>
                            <div class="small text-white"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Notice</div>
                        <p><i class="fas fa-envelope" style="font-size: 80px;padding-left:20px;"></i></p>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#" style="font-size: 18px;">
                                {{App\Notice::all()->count()}}
                            </a>
                            <div class="small text-white"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Leave</div>
                        <p><i class="fas fa-book" style="font-size: 80px;padding-left:20px;"></i></p>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#" style="font-size: 18px;">
                                {{App\Leave::all()->count()}}
                            </a>
                            <div class="small text-white"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            Your Details
                        </div>
                        <div class="card-header" style="background-color:#f0b53e;">
                            Name:{{Auth::user()->name}}
                        </div>
                        <div class="card-header" style="background-color:#f0b53e;">
                            Email:{{Auth::user()->email}}
                        </div>
                        <div class="card-header" style="background-color:#f0b53e;">
                            Address:{{Auth::user()->address}}
                        </div>
                        <div class="card-header" style="background-color:#f0b53e;">
                            Mobile Number:{{Auth::user()->mobile_number}}
                        </div>
                        <div class="card-header" style="background-color:#f0b53e;">
                            Designation:{{Auth::user()->designation}}
                        </div>
                        <div class="card-header" style="background-color:#f0b53e;">
                            Start Date:{{Auth::user()->start_from}}
                        </div>
                        <div class="card-header" style="background-color:#f0b53e;">
                            Role:{{Auth::user()->role->name}}
                        </div>
                        <div class="card-header" style="background-color:#f0b53e;">
                            Department:{{Auth::user()->department->name}}
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </main>