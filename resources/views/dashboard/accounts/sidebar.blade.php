@if(Gate::allows('viewAny', \App\Models\User::class)
    || Gate::allows('viewAny', \App\Models\Nurse::class)
    || Gate::allows('viewAny', \App\Models\Doctor::class))
    @component('dashboard::components.sidebarItem')
        @slot('url', '#')
        @slot('name', trans('users.plural'))
        @slot('active', request()->routeIs('*admins*') || request()->routeIs('*doctors*'))
        @slot('icon', 'fas fa-users')
        @slot('tree', [
            [
                'name' => trans('admins.plural'),
                'url' => route('dashboard.admins.index'),
                'can' => ['ability' => 'viewAny', 'model' => \App\Models\Admin::class],
                'active' => request()->routeIs('*admins*'),
            ],
            [
                'name' => trans('nurses.plural'),
                'url' => route('dashboard.nurses.index'),
                'can' => ['ability' => 'viewAny', 'model' => \App\Models\Nurse::class],
                'active' => request()->routeIs('*nurses*'),
            ],
            [
                'name' => trans('doctors.plural'),
                'url' => route('dashboard.doctors.index'),
                'can' => ['ability' => 'viewAny', 'model' => \App\Models\Doctor::class],
                'active' => request()->routeIs('*doctors*'),
            ],
        ])
    @endcomponent
@endif
