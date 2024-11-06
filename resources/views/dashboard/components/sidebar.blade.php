<div id="sideBar"
    class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">
    <!-- sidebar content -->
    <div class="flex flex-col">
        <!-- sidebar toggle -->
        <div class="text-right hidden md:block mb-4">
            <button id="sideBarHideBtn">
                <i class="fad fa-times-circle"></i>
            </button>
        </div>
        <!-- end sidebar toggle -->


        <!-- link -->
        <a href="{{ route('dashboard') }}"
            class="mb-3 capitalize font-medium text-xl hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-home text-lg mr-2"></i>
            Home
        </a>
        <!-- end link -->

        <!-- link -->
        <a href="{{ route('plants.index') }}"
            class="mb-3 capitalize font-medium text-xl hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-leaf text-lg mr-2"></i>
            Plants
        </a>
        @if (Auth::user()->role == 'admin')
            <a href="{{ route('gardens.index') }}"
                class="mb-3 capitalize font-medium text-xl hover:text-teal-600 transition ease-in-out duration-500">
                <i class="fad fa-canadian-maple-leaf text-lg mr-2"></i>
                Gardens
            </a>
        @endif
        {{-- <a href="{{ route('comments.index') }}"
            class="mb-3 capitalize font-medium text-xl hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-envelope-open-text text-lg mr-2"></i>
            Comments
        </a> --}}
        <!-- end link -->

        <!-- link -->
        <a href="{{ route('events.index') }}"
            class="mb-3 capitalize font-medium text-xl hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-envelope-open-text text-lg mr-2"></i>
            Events
        </a>
        <!-- end link -->

        <!-- link -->
        <!-- end link -->


        <!-- end link -->
    </div>
    <!-- end sidebar content -->
</div>
