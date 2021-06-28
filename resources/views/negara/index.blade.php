@extends('layouts.generic')

@section('judul')
    Negara
@endsection

@section('subjudul')
    Menampilkan, menambah, memperbarui, dan menghapus data negara.
@endsection

@section('banner')
    <img src="{{ URL::to('images/negara/nations.jpg') }}" class="img-fluid rounded" alt="...">
@endsection

@section('isi')
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success')}}
        </div>
    @endif

    <div class="text-center mb-5">
        <a href="#" data-toggle="modal" data-target="#create-modal" class="btn btn-primary btn-block dhs_button" id="nation-button">
            <i class="fas fa-fw fa-plus-circle mr-2"></i>Tambah Data Negara
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="align-middle">Nama</th>
                    <th class="align-middle">Kode ISO 3</th>
                    <th class="align-middle">Mata Uang</th>
                    <th class="align-middle text-center">Kelola Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($negara as $nation)
                <tr>
                    <td class="align-middle">{{ $nation->nama }}</td>
                    <td class="align-middle">{{ $nation->kode_iso_3 }}</td>
                    <td class="align-middle">{{ $nation->mata_uang }}</td>
                    <td class="align-middle text-center">
                        <div class="btn-group">
                            <a href="#" data-id="{{ $nation->id }}" data-nama="{{ $nation->nama }}" data-nama_inggris="{{ $nation->nama_inggris }}"
                               data-kode_iso_2="{{ $nation->kode_iso_2 }}" data-kode_iso_3="{{ $nation->kode_iso_3 }}" data-latitude="{{ $nation->latitude }}"
                               data-longitude="{{ $nation->longitude }}" data-kode_telepon="{{ $nation->kode_telepon }}" data-mata_uang="{{ $nation->mata_uang }}"
                               data-toggle="modal" data-target="#detail-modal" title="Detail" class="btn btn-success"><i class="fas fa-fw fa-eye"></i>
                            </a> &nbsp;
                            <a href="#" data-id="{{ $nation->id }}" data-nama="{{ $nation->nama }}" data-nama_inggris="{{ $nation->nama_inggris }}"
                               data-kode_iso_2="{{ $nation->kode_iso_2 }}" data-kode_iso_3="{{ $nation->kode_iso_3 }}" data-latitude="{{ $nation->latitude }}"
                               data-longitude="{{ $nation->longitude }}" data-kode_telepon="{{ $nation->kode_telepon }}" data-mata_uang="{{ $nation->mata_uang }}"
                               data-toggle="modal" data-target="#update-modal" title="Update" class="btn btn-warning text-white"><i class="fas fa-fw fa-edit"></i>
                            </a> &nbsp;
                            {!! Form::open(['route' => ['negara.destroy', $nation->id], 'method' => 'delete']) !!}
                            {!! Form::button('<i class="fas fa-fw fa-trash"></i>', ['type' => 'submit', 'title' => 'Delete', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('custom-script')
    <script type="text/javascript">
        const
            nationButton = document.querySelector("#nation-button"),
            namaCreate = document.querySelector("#nama-create");
        if (nationButton) {
            nationButton.addEventListener("click", () => {
                setTimeout(function () {
                    namaCreate.focus();
                }, 100);
            });
        }

        $('#detail-modal').on('show.bs.modal', function (event) {
            const
                button = $(event.relatedTarget),
                id = button.data('id'),
                nama = button.data('nama'),
                nama_inggris = button.data('nama_inggris'),
                kode_iso_2 = button.data('kode_iso_2'),
                kode_iso_3 = button.data('kode_iso_3'),
                latitude = button.data('latitude'),
                longitude = button.data('longitude'),
                kode_telepon = button.data('kode_telepon'),
                mata_uang = button.data('mata_uang'),
                modal = $(this);

            modal.find('.modal-body table tbody tr #id-detail').text(id);
            modal.find('.modal-body table tbody tr #nama-detail').text(nama);
            modal.find('.modal-body table tbody tr #nama_inggris-detail').text(nama_inggris);
            modal.find('.modal-body table tbody tr #kode_iso_2-detail').text(kode_iso_2);
            modal.find('.modal-body table tbody tr #kode_iso_3-detail').text(kode_iso_3);
            modal.find('.modal-body table tbody tr #latitude-detail').text(latitude);
            modal.find('.modal-body table tbody tr #longitude-detail').text(longitude);
            modal.find('.modal-body table tbody tr #kode_telepon-detail').text(kode_telepon);
            modal.find('.modal-body table tbody tr #mata_uang-detail').text(mata_uang);
        });

        $('#update-modal').on('show.bs.modal', function (event) {
            const
                button = $(event.relatedTarget),
                id = button.data('id'),
                nama = button.data('nama'),
                nama_inggris = button.data('nama_inggris'),
                kode_iso_2 = button.data('kode_iso_2'),
                kode_iso_3 = button.data('kode_iso_3'),
                latitude = button.data('latitude'),
                longitude = button.data('longitude'),
                kode_telepon = button.data('kode_telepon'),
                mata_uang = button.data('mata_uang'),
                modal = $(this);

            modal.find('.modal-body #id-update').val(id);
            modal.find('.modal-body #nama-update').val(nama);
            modal.find('.modal-body #nama_inggris-update').val(nama_inggris);
            modal.find('.modal-body #kode_iso_2-update').val(kode_iso_2);
            modal.find('.modal-body #kode_iso_3-update').val(kode_iso_3);
            modal.find('.modal-body #latitude-update').val(latitude);
            modal.find('.modal-body #longitude-update').val(longitude);
            modal.find('.modal-body #kode_telepon-update').val(kode_telepon);
            modal.find('.modal-body #mata_uang-update').val(mata_uang);

            setTimeout(function () {
                modal.find('.modal-body #nama-update').focus();
            }, 100);
        });
    </script>
@endpush