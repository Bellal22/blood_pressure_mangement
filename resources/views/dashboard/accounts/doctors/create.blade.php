<x-layout :title="trans('doctors.actions.create')" :breadcrumbs="['dashboard.doctors.create']">
    {{ BsForm::resource('doctors')->post(route('dashboard.doctors.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('doctors.actions.create'))

        @include('dashboard.accounts.doctors.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('doctors.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>