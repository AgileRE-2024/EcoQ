@extends('dashboard.layouts.template')
@section('content')
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">
        <!-- General Report -->
        <div class="grid grid-cols-4 gap-6 xl:grid-cols-1">
            <!-- card -->
            <div class="report-card">
                <div class="card">
                    <div class="card-body flex flex-col">
                        <!-- top -->
                        <div class="flex flex-row justify-between items-center">
                            <p>Total Users</p>
                            <div class="h6 text-indigo-700 fad fa-users"></div>

                        </div>
                        <!-- end top -->
                        <!-- bottom -->
                        <div class="mt-8">
                            {{-- <h1 class="h5">{{ $users->count() }}</h1> --}}
                        </div>
                        <!-- end bottom -->
                    </div>
                </div>
                <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
            </div>
            <!-- end card -->
            <!-- card -->
            <div class="report-card">
                <div class="card">
                    <div class="card-body flex flex-col">
                        <!-- top -->
                        <div class="flex flex-row justify-between items-center">
                            <p>Total Gardens</p>
                            <div class="h6 text-orange-500-700 fad fa-users"></div>

                        </div>
                        <!-- end top -->
                        <!-- bottom -->
                        <div class="mt-8">
                            {{-- <h1 class="h5">{{ $regulations->count() }}</h1> --}}
                        </div>
                        <!-- end bottom -->
                    </div>
                </div>
                <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
            </div>
            <!-- end card -->
            <!-- card -->
            <div class="report-card">
                <div class="card">
                    <div class="card-body flex flex-col">
                        <!-- top -->
                        <div class="flex flex-row justify-between items-center">
                            <p>Total Comments</p>
                            <div class="h6 text-orange-500-700 fad fa-users"></div>

                        </div>
                        <!-- end top -->
                        <!-- bottom -->
                        <div class="mt-8">
                            {{-- <h1 class="h5">{{ $comments->count() }}</h1> --}}
                        </div>
                        <!-- end bottom -->
                    </div>
                </div>
                <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
            </div>
            <div class="report-card">
                <div class="card">
                    <div class="card-body flex flex-col">
                        <!-- top -->
                        <div class="flex flex-row justify-between items-center">
                            <p>Total Regulators</p>
                            <div class="h6 text-orange-500-700 fad fa-users"></div>

                        </div>
                        <!-- end top -->
                        <!-- bottom -->
                        <div class="mt-8">
                            {{-- <h1 class="h5">{{ $plants->count() }}</h1> --}}
                        </div>
                        <!-- end bottom -->
                    </div>
                </div>
                <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
            </div>
            <!-- end card -->

        </div>
        <!-- End General Report -->

        <!-- strat Analytics -->
        <div class="mt-6 gap-6 xl:grid-cols-1">
            <!-- update section -->

            <!-- end update section -->

            <!-- carts -->
            <div class="flex flex-col">
                <!-- charts -->
                <div class="grid grid-cols-2 gap-6 h-full">

                </div>
                <!-- charts    -->
            </div>
            <!-- end charts -->
        </div>
        <!-- end Analytics -->

        <!-- Sales Overview -->
        <div class="card mt-6">
            <!-- header -->
            <!-- end header -->

            <!-- body -->
            <div class="card-body grid grid-cols-2 gap-6 lg:grid-cols-1">

                <!-- end body -->
            </div>
            <!-- end Sales Overview -->

            <!-- start quick Info -->
            <div class="grid grid-cols-3 gap-6 mt-6 xl:grid-cols-1">
                <!-- Browser Stats -->

                <!-- end Browser Stats -->

                <!-- Start Recent Sales -->
                <div class="card col-span-3 xl:col-span-1">
                    <div class="card-header">
                        Recent Regulation
                    </div>

                </div>
                <!-- end quick Info -->
            </div>
        @endsection
