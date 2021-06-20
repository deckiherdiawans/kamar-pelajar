@extends('layouts.generic')

@section('judul')
    Cari Kamar
@endsection

@section('subjudul')
    Harga tertera adalah harga di kota tersebut.
@endsection

@section('banner')
    <img src="{{ URL::to('images/kamar/terang/kayu.jpg') }}" class="img-fluid rounded" alt="...">
@endsection

@section('isi')
    <div>
        <select onchange="pilihNegara()" id="dropdownNegara" title="Pilih Negara">
            <option value="#">-Negara-</option>
            @foreach ($negara as $data)
            <option value="{{ $data->negara_id }}" @if(!empty($query)) {{ $query[0][2] ==  $data->negara_id ? " selected" : "" }} @endif>
                {{ $data->negara->nama ?? null }}
            </option>
            @endforeach
        </select>

        {{--
        <select onchange="pilihKota()" id="dropdownKota" title="Pilih Kota">
            <option value="">-Kota-</option>
            @foreach ($kota as $data)
            <option value="{{$data->kota_id}}" @if(!empty($query)) {{ $query[0][2] ==  $data->kota_id ? " selected" : "" }} @endif>
                {{ $data->kota->nama ?? null }}
            </option>
            @endforeach
        </select>
        --}}
    </div>
    <br>
    <table class="table table-striped">
        @foreach ($kamar as $room)
        <tr>
            <td>Alamat</td>
            <td>{{ $room->alamat ?? null }}</td>
        </tr>
        <tr>
            <td>Kota - Negara</td>
            <td>{{ ($room->kotanya->nama  ?? null) . ' - ' . ($room->negaranya->nama ?? null) }}</td>
        </tr>
        <tr>
            <td>Harga</td>
            <td>{{ ($room->negaranya->mata_uang ?? null) . ($room->harga ?? null) }}</td>
        </tr>
        <tr>
            <td>Jenis Kamar</td>
            <td>{{ $room->jenisKamar->nama ?? null }}</td>
        </tr>
        <tr>
            <td>Jenis Kasur</td>
            <td>{{ $room->jenisKasur->nama ?? null }}</td>
        </tr>
        <tr>
            <td>Kapasitas</td>
            <td>{{ $room->kapasitas ?? null }} orang</td>
        </tr>
        <tr>
            <td>Preferensi Gender Tamu</td>
            <td>
                @switch($room->preferensi_gender)
                @case('l')
                laki-laki
                @break
                @case('p')
                perempuan
                @break
                @default
                keduanya
                @endswitch
            </td>
        </tr>
        @endforeach
    </table>
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
    </script>
@endsection