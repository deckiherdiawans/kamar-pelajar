@extends('layouts.generic')

@section('judul')
Cari Kamar
@endsection

@section('subjudul')
Harga tertera adalah harga di kota tersebut
@endsection

@section('banner')
<img src="{{URL::to('images/kamar/terang/kayu.jpg')}}" class="img-fluid rounded" alt="...">
@endsection

@section('isi')

<div> 
    <select onchange="pilihNegara();" id="dropdownNegara">
        <option value="#">-Negara-</option>
        @foreach ($negaras as $data)
        <option value="{{$data->negara_id}}" @if (!empty($query))
            {{ $query[0][2] ==  $data->negara_id ? " selected" : "" }} @endif>
            {{$data->negaranya->nama ?? null}}
        </option>
        @endforeach
    </select>

    {{-- <select onchange="pilihKota();" id="dropdownKota">
                <option value="">-Kota-</option>
                @foreach ($kotas as $data)
                    <option value="{{$data->kota_id}}"
    @if (!empty($query))
    {{ $query[0][2] ==  $data->kota_id ? " selected" : "" }}
    @endif>


    {{$data->kota}}</option>
    @endforeach
    </select> --}}
</div>
<br>
 
    <table class="table table-striped">

        @foreach ($kamars as $kamar)

        <tr>
            <td>Alamat</td>
            <td>{{$kamar->alamat ?? null}} </td>
        </tr>
        <tr>
            <td>Kota - Negara</td>
            <td>{{ ($kamar->kotanya->nama  ?? null) . ' - ' . ($kamar->negaranya->nama ?? null)}} </td>
        </tr>
        <tr>
            <td>Harga</td>
            <td>{{($kamar->negaranya->mata_uang ?? null) . ($kamar->harga ?? null)}} </td>
        </tr>
        <tr>
            <td>Jenis Kamar</td>
            <td>{{$kamar->jenisKamar->nama ?? null}}</td>
        </tr>
        <tr>
            <td>Jenis Kasur</td>
            <td>{{$kamar->jenisKasur->nama ?? null}}</td>
        </tr>
        <tr>
            <td>Kapasitas</td>
            <td>{{$kamar->kapasitas ?? null}} orang</td>
        </tr>
        <tr>
            <td>Preferensi Gender Tamu</td>
            <td>
                @switch($kamar->preferensi_gender)
                @case('l')
                laki-laki
                @break
                @case('p')
                perempuan
                @break
                @default
                keduanya
                @endswitch</td>
        </tr>
        @endforeach

    </table>
 


@endsection


@section('custom-script')
<script type="text/javascript">
    function pilihNegara()
    {
        val = document.getElementById("dropdownNegara").value;

        if (val == '#')
            window.location =  '/kamar/';
        else
            window.location =  '/kamar/n/' + val;
    }

    function pilihKota()
    {
        window.location = '/kamar/k/' + document.getElementById("dropdownKota").value ;
    }
</script>
@endsection