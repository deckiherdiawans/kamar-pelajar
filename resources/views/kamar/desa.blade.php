@extends('layouts.generic')

@section('judul')
    Desa
@endsection

@section('subjudul')
    Menampilkan kelurahan/desa yang ada di satu kota di suatu negara.
@endsection

@section('banner')
    <img src="{{ URL::to('images/desa/hallstatt.jpg') }}" class="img-fluid rounded" alt="...">
@endsection

@section('isi')
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success')}}
    </div>
    @endif

    <div class="mb-4">
        <div class="form-check form-switch mt-3">
            <input class="form-check-input" type="checkbox" id="toggleView">
            <label class="form-check-label" for="toggleView">Change to Table View</label>
        </div>
    </div> 

    {{-- Style: Table --}}
    <table class="table table-striped d-none">
        <thead>
            <tr>
                <th scope="col">Desa</th>
                <th scope="col">Kota</th>
                <th scope="col">Negara</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($desa as $village)
            <tr>
                <td>{{ $village->nama }} </td>
                <td>{{ $village->kota->nama ?? null }} </td>
                <td>{{ $village->kota->negara->nama ?? null }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- 3 kolom --}}
    <div class="row grid-kamar justify-content-center">
        @foreach ($desa as $village)
        <div class="col-md-4">
            <div class="card mb-4">
                {{-- <img src="images/kamar/gelap/perapian.jpg" class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h5 class="card-title">{{ $village->nama }}</h5>
                    <p class="card-text fs-14"><i class="bi bi-geo-alt-fill"></i> {{ $village->kota->nama ?? null }}, {{ $village->kota->negara->nama ?? null }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div> 
@endsection

@section('custom-script')
    <script type="text/javascript">
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
@endsection