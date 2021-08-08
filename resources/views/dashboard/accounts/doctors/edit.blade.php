<x-layout :title="$doctor->name" :breadcrumbs="['dashboard.doctors.edit', $doctor]">
    {{ BsForm::resource('doctors')->putModel($doctor, route('dashboard.doctors.update', $doctor), ['files' => true]) }}
    @component('dashboard::components.box')
        @slot('title', trans('doctors.actions.edit'))

        @include('dashboard.accounts.doctors.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('doctors.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
