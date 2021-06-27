@extends('layouts.auth')

@section('judul')
    {{ $user->nama_lengkap }}
@endsection

@section('isi')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        <br>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error')}}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf

        {{--
        <div class="col-6 col-12-xsmall">{{ __('Photo ID Card') }}</div>
        <div class="col-6 col-12-xsmall">
            <a href="{{Storage::url($user->foto_id_card)}}" target="_blank">
                <img src="{{Storage::url($user->foto_id_card)}}" alt="" width="200px">
            </a>
        </div>
        --}}

        <h2 class="mb-4 py-2 bg-success bg-gradient rounded-3 text-white text-center">Profil Kamu</h2>
        <div class="form-group row mb-4">
            <div class="col-3 col-12-xsmall">{{ __('Nama Lengkap') }}</div>
            <div class="col col-12-xsmall">
                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror border-top-0 border-end-0 border-start-0 bg-light"
                       name="nama_lengkap" id="nama_lengkap" value="{{ $user->nama_lengkap }}" title="Nama Lengkap" autofocus>

                @error('nama_lengkap')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-4">
            <div class="col-3 col-12-xsmall">{{ __('Nama Panggilan') }}</div>
            <div class="col col-12-xsmall">
                <input type="text" class="form-control border-top-0 border-end-0 border-start-0 bg-light" name="nama_panggilan" id="nama_panggilan"
                       title="Nama Panggilan" value="{{ $user->nama_panggilan }}">
            </div>
        </div>

        <div class="form-group row mb-4">
            <div class="col-3 col-12-xsmall">{{ __('Email') }}</div>
            <div class="col col-12-xsmall">
                <input type="text" class="form-control border-top-0 border-end-0 border-start-0" placeholder=" {{ $user->email }} " readonly>
            </div>
        </div>

        <div class="form-group row mb-4">
            <div class="col-3 col-12-xsmall">{{ __('Telepon') }}</div>
            <div class="col col-12-xsmall">
                <input type="text" class="form-control border-top-0 border-end-0 border-start-0 bg-light" name="telepon" id="telepon"
                       title="Telepon" value="{{ $user->telepon }}">
            </div>
        </div>

        <div class="form-group row mb-4">
            <div class="col-3 col-12-xsmall">{{ __('Kota Domisili') }}</div>
            <div class="col col-12-xsmall">
                <input type="text" class="form-control border-top-0 border-end-0 border-start-0 bg-light" name="domisili" id="domisili"
                       title="Domisili" value="{{ $user->domisili }}">
            </div>
        </div>

        <div class="form-group row mb-4">
            <div class="col-3 col-12-xsmall">{{ __('Negara') }}</div>
            <div class="col col-12-xsmall">
                <select name="negara" class="form-control border-top-0 border-end-0 border-start-0 bg-light" id="negara" title="Negara">
                    <option disabled {{ !empty($user->negara_id) ?  "" : "selected" }}>-Pilih Negara-</option>
                    @foreach ($negara as $nation)
                        <option value="{{ $nation->id }}" {{ $nation->id == $user->negara_id ? 'selected' : '' }}>{{ $nation->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mb-4">
            <div class="col-3 col-12-xsmall">{{ __('Tanggal Lahir') }}</div>
            <div class="col col-12-xsmall">
                <input type="date" class="form-control border-top-0 border-end-0 border-start-0 bg-light" name="tanggal_lahir" id="tanggal_lahir"
                       title="Tanggal Lahir" value="{{ !empty($user->tanggal_lahir) ? $user->tanggal_lahir->format('Y-m-d') : '' }}">
            </div>
        </div>

        <div class="form-group row mb-4">
            <div class="col-3 col-12-xsmall">{{ __('Jenis Kelamin') }}</div>
            <div class="col col-12-xsmall">
                <label for="gender-male">
                    <input type="radio" id="gender-male" name="gender" value="l" {{ $user->gender === 'l' ? "checked" : "" }}>
                    <label for="gender-male" class="mr-5">Laki-laki</label>
                </label> &nbsp; &nbsp; &nbsp;
                <label for="gender-female">
                    <input type="radio" id="gender-female" name="gender" value="p" {{ $user->gender === 'p' ? "checked" : "" }}>
                    <label for="gender-female">Perempuan</label>
                </label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3"></div>
            <div class="col d-grid gap-2"><button type="submit" class="btn btn-primary">{{ __('Update') }}</button></div>
        </div>
    </form>
@endsection