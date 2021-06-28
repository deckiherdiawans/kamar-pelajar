<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="updateNationHeaderModal" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-ms modal-right" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white align-items-center">
                <h5 class="modal-title" id="updateNationHeaderModal">Perbarui Data Negara</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            {!! Form::open(['route' => ['negara.update', 'id'], 'method' => 'POST']) !!}
            @csrf
            @method('PATCH')
            <div class="modal-body">
                {!! Form::hidden('id', null, ['id' => 'id-update']) !!}
                <div class="row align-items-center">
                    <div class="form-group col-sm-12">
                        {!! Form::label('nama', 'Nama', ['class' => 'form-label']) !!}
                        {!! Form::text('nama', null, ['class' => 'form-control', 'maxlength' => 191, 'id' => 'nama-update', 'title' => 'Nama']) !!}
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="form-group col-sm-12">
                        {!! Form::label('nama_inggris', 'Nama Inggris', ['class' => 'form-label']) !!}
                        {!! Form::text('nama_inggris', null, ['class' => 'form-control', 'maxlength' => 191, 'id' => 'nama_inggris-update', 'title' => 'Nama Inggris']) !!}
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="form-group col-sm-12">
                        {!! Form::label('kode_iso_2', 'Kode ISO 2', ['class' => 'form-label']) !!}
                        {!! Form::text('kode_iso_2', null, ['class' => 'form-control', 'maxlength' => 191, 'id' => 'kode_iso_2-update', 'title' => 'Kode ISO 2']) !!}
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="form-group col-sm-12">
                        {!! Form::label('kode_iso_3', 'Kode ISO 3', ['class' => 'form-label']) !!}
                        {!! Form::text('kode_iso_3', null, ['class' => 'form-control', 'maxlength' => 191, 'id' => 'kode_iso_3-update', 'title' => 'Kode ISO 3']) !!}
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="form-group col-sm-12">
                        {!! Form::label('latitude', 'Latitude', ['class' => 'form-label']) !!}
                        {!! Form::text('latitude', null, ['class' => 'form-control', 'maxlength' => 191, 'id' => 'latitude-update', 'title' => 'Latitude']) !!}
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="form-group col-sm-12">
                        {!! Form::label('longitude', 'Longitude', ['class' => 'form-label']) !!}
                        {!! Form::text('longitude', null, ['class' => 'form-control', 'maxlength' => 191, 'id' => 'longitude-update', 'title' => 'Longitude']) !!}
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="form-group col-sm-12">
                        {!! Form::label('kode_telepon', 'Kode Telepon', ['class' => 'form-label']) !!}
                        {!! Form::text('kode_telepon', null, ['class' => 'form-control', 'maxlength' => 191, 'id' => 'kode_telepon-update', 'title' => 'Kode Telepon']) !!}
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="form-group col-sm-12">
                        {!! Form::label('mata_uang', 'Mata Uang', ['class' => 'form-label']) !!}
                        {!! Form::text('mata_uang', null, ['class' => 'form-control', 'maxlength' => 191, 'id' => 'mata_uang-update', 'title' => 'Mata Uang']) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {!! Form::submit('Update', ['class' => 'btn btn-warning text-white']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>