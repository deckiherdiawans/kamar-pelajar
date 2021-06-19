@extends('layouts.generic')

@section('judul')
    Cari Kamar
@endsection

@section('subjudul')
    Harga tertera adalah harga per orang per malam tersebut.
@endsection

@section('banner')
    <img src="{{URL::to('images/kamar/terang/kayu.jpg')}}" class="img-fluid rounded" alt="...">
@endsection

@section('isi')
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success')}}
    </div>
    @endif

    <div class="mb-4">
        <select onchange="pilihNegara();" id="dropdownNegara">
            <option value="#">-Negara-</option>
            @if(!empty($negara))
            @foreach($negara as $data)
            <option value="{{$data->id}}"
                @if (!empty($query))
                {{ $query[0][2] ==  $data->id ? "selected" : "" }}
                @endif>
                {{$data->negara->nama ?? null}}
            </option>
            @endforeach
            @endif
        </select>

        <div class="form-check form-switch mt-3">
            <input class="form-check-input" type="checkbox" id="toggleView">
            <label class="form-check-label" for="toggleView">Change to Table View</label>
        </div>

       {{--
       <select onchange="pilihKota();" id="dropdownKota">
            <option value="">-Kota-</option>
            @if(!empty($kota))
            @foreach ($kota as $data)
            <option value="{{$data->kota_id}}"
                @if (!empty($query))
                {{ $query[0][2] ==  $data->kota_id ? " selected" : "" }}
                @endif>
                {{$data->kota}}</option>
            @endforeach
            @endif
        </select>
        --}}
    </div> 

    {{-- Style: Table --}}
    <table  class="table table-striped" style="display: none" >
        <thead>
            <tr>
                <th scope="col">Alamat</th>
                <th scope="col">Kota</th>
                <th scope="col">Harga</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kamar as $room)
            <tr>
                <td>{{$room->alamat}} </td>
                <td>{{$room->kota->nama ?? null}} </td>
                <td>{{ ($room->negara->mata_uang ?? null) . ($room->harga ?? null) }} </td>
                <td><a href="{{URL::to('/')}}/kamar/{{$room->id}}">Detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- 3 kolom --}}
    <div class="row row-cols-1 row-cols-md-3 grid-kamar">
        @foreach ($kamar as $room)
        <div class="col mb-4">
            <div class="card">
                {{-- <img src="images/kamar/gelap/perapian.jpg" class="card-img-top" alt="..."> --}}
                <div class="card-body position-relative">
                    <h5 class="card-title">{{$room->alamat}}</h5>
                    <p class="card-text mb-2" style="font-size: 14px"><i class="bi bi-geo-alt-fill"></i> {{$room->kota->nama ?? null}}, {{$room->negara->nama ?? null}}</p>
                    <p class="card-text mb-0">{{ ($room->negara->mata_uang ?? null) . ($room->harga ?? null) }}</p>
                    <a class="btn btn-outline-secondary" style="float: right;" href="{{URL::to('/')}}/kamar/{{$room->id}}" role="button">Detail <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div> 
@endsection

@section('custom-script')
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
                table.style.display = 'table';
                gridKamar.style.display = 'none';
                checkboxLabel.innerText = 'Change to Grid View';
            }
            else {
                table.style.display = 'none'
                gridKamar.style.display = 'flex';
                checkboxLabel.innerText = 'Change to Table View';
            }
        })
    </script>
@endsection