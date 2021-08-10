<x-layout :title="trans('nurses.actions.create')" :breadcrumbs="['dashboard.nurses.create']">
    {{ BsForm::resource('nurses')->post(route('dashboard.nurses.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('nurses.actions.create'))

        @include('dashboard.accounts.nurses.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('nurses.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>