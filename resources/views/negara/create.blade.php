<div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white align-items-center">
                <h5 class="modal-title" id="createModalLabel">Tambah Data Negara</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            {!! Form::open(['route' => 'negara.store']) !!}
            <div class="modal-body">
                <div class="row align-items-center">
                    <div class="form-group col-sm-12">
                        {!! Form::label('nama', 'Nama', ['class' => 'form-label']) !!}
                        {!! Form::text('nama', null, ['class' => 'form-control', 'maxlength' => 191, 'id' => 'nama-create', 'placeholder' => 'Masukkan nama negara']) !!}
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="form-group col-sm-12">
                        {!! Form::label('nama_inggris', 'Nama Inggris', ['class' => 'form-label']) !!}
                        {!! Form::text('nama_inggris', null, ['class' => 'form-control', 'maxlength' => 191, 'id' => 'nama_inggris-create', 'placeholder' => 'Masukkan nama negara dalam bahasa inggris']) !!}
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="form-group col-sm-12">
                        {!! Form::label('kode_iso_2', 'Kode ISO 2', ['class' => 'form-label']) !!}
                        {!! Form::text('kode_iso_2', null, ['class' => 'form-control', 'maxlength' => 191, 'id' => 'kode_iso_2-create', 'placeholder' => 'Masukkan kode ISO 2']) !!}
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="form-group col-sm-12">
                        {!! Form::label('kode_iso_3', 'Kode ISO 3', ['class' => 'form-label']) !!}
                        {!! Form::text('kode_iso_3', null, ['class' => 'form-control', 'maxlength' => 191, 'id' => 'kode_iso_3-create', 'placeholder' => 'Masukkan kode ISO 3']) !!}
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="form-group col-sm-12">
                        {!! Form::label('latitude', 'Latitude', ['class' => 'form-label']) !!}
                        {!! Form::text('latitude', null, ['class' => 'form-control', 'maxlength' => 191, 'id' => 'latitude-create', 'placeholder' => 'Masukkan angka latitude']) !!}
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="form-group col-sm-12">
                        {!! Form::label('longitude', 'Longitude', ['class' => 'form-label']) !!}
                        {!! Form::text('longitude', null, ['class' => 'form-control', 'maxlength' => 191, 'id' => 'longitude-create', 'placeholder' => 'Masukkan angka longitude']) !!}
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="form-group col-sm-12">
                        {!! Form::label('kode_telepon', 'Kode Telepon', ['class' => 'form-label']) !!}
                        {!! Form::text('kode_telepon', null, ['class' => 'form-control', 'maxlength' => 191, 'id' => 'kode_telepon-create', 'placeholder' => 'Masukkan kode telepon']) !!}
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="form-group col-sm-12">
                        {!! Form::label('mata_uang', 'Mata Uang', ['class' => 'form-label']) !!}
                        {!! Form::text('mata_uang', null, ['class' => 'form-control', 'maxlength' => 191, 'id' => 'mata_uang-create', 'placeholder' => 'Masukkan kode mata uang']) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" id="reset_button-nation">Reset</button>
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@push('custom-script')
    <script type="text/javascript">
        $('#reset_button-nation').on('click', function (event) {
            var modal = $('#create-modal');
            modal.find('.modal-body #nama-create').val("");
            modal.find('.modal-body #nama_inggris-create').val("");
            modal.find('.modal-body #kode_iso_2-create').val("");
            modal.find('.modal-body #kode_iso_3-create').val("");
            modal.find('.modal-body #latitude-create').val("");
            modal.find('.modal-body #longitude-create').val("");
            modal.find('.modal-body #kode_telepon-create').val("");
            modal.find('.modal-body #mata_uang-create').val("");
            modal.find('.modal-body #nama-create').focus();
        });
    </script>
@endpush