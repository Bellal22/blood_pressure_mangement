<x-layout :title="$nurse->name" :breadcrumbs="['dashboard.nurses.edit', $nurse]">
    {{ BsForm::resource('nurses')->putModel($nurse, route('dashboard.nurses.update', $nurse), ['files' => true]) }}
    @component('dashboard::components.box')
        @slot('title', trans('nurses.actions.edit'))

        @include('dashboard.accounts.nurses.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('nurses.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
