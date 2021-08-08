@can('delete', $doctor)
    <a href="#doctor-{{ $doctor->id }}-delete-model"
       class="btn btn-outline-danger btn-sm"
       data-toggle="modal">
        <i class="fas fa fa-fw fa-user-times"></i>
    </a>


    <!-- Modal -->
    <div class="modal fade" id="doctor-{{ $doctor->id }}-delete-model" tabindex="-1" role="dialog"
         aria-labelledby="modal-title-{{ $doctor->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-{{ $doctor->id }}">@lang('doctors.dialogs.delete.title')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('doctors.dialogs.delete.info')
                </div>
                <div class="modal-footer">
                    {{ BsForm::delete(route('dashboard.doctors.destroy', $doctor)) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        @lang('doctors.dialogs.delete.cancel')
                    </button>
                    <button type="submit" class="btn btn-danger">
                        @lang('doctors.dialogs.delete.confirm')
                    </button>
                    {{ BsForm::close() }}
                </div>
            </div>
        </div>
    </div>
@endcan
