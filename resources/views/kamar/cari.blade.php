@extends('layouts.generic')

@section('judul')
    Cari Kamar
@endsection

@section('subjudul')
    Harga tertera adalah harga per orang per malam tersebut.
@endsection

@section('banner')
    <img src="{{ URL::to('images/kamar/terang/kayu.jpg') }}" class="img-fluid rounded" alt="...">
@endsection

@section('isi')
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success')}}
    </div>
    @endif

    <div class="mb-4">
        <select onchange="pilihNegara()" id="dropdownNegara" title="Pilih Negara">
            <option value="#">-Negara-</option>
            @foreach($negara as $data)
            <option value="{{ $data->negara->id }}" @if(!empty($query)) {{ $query[0][2] ==  $data->id ? 'selected' : '' }} @endif>
                {{ $data->negara->nama ?? null }}
            </option>
            @endforeach
        </select>

        <div class="custom-control custom-switch mt-4">
            <input class="custom-control-input" type="checkbox" id="toggleView">
            <label class="custom-control-label" for="toggleView">Change to Table View</label>
        </div>

        {{--
        <select onchange="pilihKota()" id="dropdownKota" title="Pilih Kota">
            <option value="">-Kota-</option>
            @foreach ($kota as $data)
            <option value="{{ $data->kota_id }}" @if(!empty($query)) {{ $query[0][2] ==  $data->kota_id ? " selected" : "" }} @endif>
                {{ $data->kota->nama ?? null }}
            </option>
            @endforeach
        </select>
        --}}
    </div> 

    {{-- Style: Table --}}
    <div class="table-responsive">
        <table class="table table-striped d-none">
            <thead>
                <tr>
                    <th class="align-middle">Alamat</th>
                    <th class="align-middle">Kota</th>
                    <th class="align-middle">Harga</th>
                    <th class="align-middle text-center">Rincian</th> 
                </tr>
            </thead>
            <tbody>
                @foreach ($kamar as $room)
                <tr>
                    <td class="align-middle">{{ $room->alamat }}</td>
                    <td class="align-middle">{{ $room->kota->nama ?? null }}</td>
                    <td class="align-middle">{{ ($room->negara->mata_uang ?? null) . ($room->harga ?? null) }}</td>
                    <td class="align-middle text-center"><a href="{{ URL::to('/') }}/kamar/{{ $room->id }}">Detail</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- 3 kolom --}}
    <div class="row grid-kamar justify-content-center">
        @foreach ($kamar as $room)
        <div class="col-md-4 w-auto">
            <div class="card mb-4">
                {{-- <img src="images/kamar/gelap/perapian.jpg" class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h5 class="card-title">{{ $room->alamat }}</h5>
                    <p class="card-text fs-14"><i class="bi bi-geo-alt-fill"></i> {{ $room->kota->nama ?? null }}, {{ $room->negara->nama ?? null }}</p>
                    <p class="card-text">{{ ($room->negara->mata_uang ?? null) . ($room->harga ?? null) }}</p>
                    <a class="btn btn-outline-secondary" href="{{ URL::to('/') }}/kamar/{{ $room->id }}" role="button">Detail <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div> 
@endsection

@push('custom-script')
    <script type="text/javascript">
        function pilihNegara() {
            val = document.getElementById("dropdownNegara").value;
            if (val == '#')
                window.location =  '/kamar/';
            else
                window.location =  '/kamar/n/' + val;
        }

        function pilihKota() {
            window.location = '/kamar/k/' + document.getElementById("dropdownKota").value;
        }

        const checkbox = document.getElementById('toggleView');
        const table = document.querySelector('.table');
        const checkboxLabel = document.querySelector('.form-check-label');
        const gridKamar = document.querySelector('.grid-kamar');
        checkbox.addEventListener('click', function() {
            if (checkbox.checked) {
                table.classList.remove("d-none");
                gridKamar.style.display = 'none';
                checkboxLabel.innerText = 'Change to Grid View';
            }
            else {
                table.classList.add("d-none");
                gridKamar.style.display = 'flex';
                checkboxLabel.innerText = 'Change to Table View';
            }
        })
    </script>
@endpush