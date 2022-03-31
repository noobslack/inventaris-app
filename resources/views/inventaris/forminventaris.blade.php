@extends('layout.main')

{{-- @php
  dd($errors->has('kode_barang'));  
@endphp --}}

@section('container')
    {{-- Form Head --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Input Data Inventaris</h6>

        </div>


        <form action="{{ route('inventaris.store') }}" method="post">

            @csrf
            <div class="card-body ">
                <div class="mb-3 row ">
                    <label for="formGroupExampleInput" class="form-label font-weight-bold col-sm-2 col-form-label">Kode
                        Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('kode_barang') is-invalid @enderror "
                            name="kode_barang" required value="{{ old('kode_barang') }}">
                        @error('kode_barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="mb-3 row">
                    <label for="formGroupExampleInput2" class="form-label font-weight-bold col-sm-2 col-form-label">Nama
                        Barang</label>
                    <div class="col-sm-10">
                        <input name="nama_barang" type="text"
                            class="form-control @error('nama_barang') is-invalid @enderror " id="formGroupExampleInput2"
                            required value="{{ old('nama_barang') }}">
                        @error('nama_barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="mb-3 row">
                    <label for="formGroupExampleInput2"
                        class="form-label font-weight-bold col-sm-2 col-form-label">Ruangan</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="id_ruangan" required>
                            <option value="">=== Masukan Nama Ruangan ===</option>
                            @foreach ($ruangan as $data)
                                @if (old('id_ruangan') == $data->id)
                                    <option value="{{ $data->id }}" selected>{{ $data->nama_ruangan }}</option>
                                @else
                                    <option value="{{ $data->id }}">{{ $data->nama_ruangan }}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="formGroupExampleInput3"
                        class="form-label font-weight-bold col-sm-2 col-form-label">Merk/Type</label>
                    <div class="col-sm-10">
                        <input name="merk_type" type="text" class="form-control @error('merk_type') is-invalid @enderror"
                            id="merk_type" required value="{{ old('merk_type') }}">
                        @error('merk_type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>



                <div class="mb-3 row">
                    <label for="formGroupExampleInput4"
                        class="form-label font-weight-bold col-sm-2 col-form-label">Bahan</label>
                    <div class="col-sm-10">
                        <input name="bahan" type="text" class="form-control @error('bahan') is-invalid @enderror" id="bahan"
                            required value="{{ old('bahan') }}">
                        @error('bahan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="mb-3 row">
                    <label for="formGroupExampleInput5"
                        class="form-label font-weight-bold col-sm-2 col-form-label">Asal-Usul</label>
                    <div class="col-sm-10">
                        <input name="asalusul" type="text" class="form-control @error('asalusul') is-invalid @enderror"
                            id="formGroupExampleInput" required value="{{ old('asalusul') }}">
                        @error('asalusul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="formGroupExampleInput6" class="form-label font-weight-bold col-sm-2 col-form-label">Tahun
                        Perolehan</label>
                    <div class="col-sm-10">
                        <input type="text" name="tahun_perolehan"
                            class="form-control datepicker @error('tahun_perolehan') is-invalid @enderror" id="datepicker"
                            required value="{{ old('tahun_perolehan') }}">
                        @error('tahun_perolehan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="formGroupExampleInput6"
                        class="form-label font-weight-bold col-sm-2 col-form-label">Ukuran</label>
                    <div class="col-sm-10">
                        <input name="ukuran" type="text" class="form-control @error('ukuran') is-invalid @enderror"
                            id="formGroupExampleInput" required value="{{ old('ukuran') }}">
                        @error('ukuran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="formGroupExampleInput7"
                        class="form-label font-weight-bold col-sm-2 col-form-label">Satuan</label>

                    <div class="col-sm-10">
                        <input name="satuan" type="text" class="form-control @error('satuan') is-invalid @enderror"
                            id="formGroupExampleInput2" required value="{{ old('satuan') }}">
                        @error('satuan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="mb-3 row">
                    <label for="formGroupExampleInput2"
                        class="form-label font-weight-bold col-sm-2 col-form-label">Kondisi</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="kondisi" required>
                            <option value="">---- Pilih Kondisi ----</option>
                            <option {{ old('kondisi', $data->kondisi) === 'Baik' ? 'selected' : '' }} value="Baik">
                                Baik
                            </option>
                            <option {{ old('kondisi', $data->kondisi) === 'Rusak Ringan' ? 'selected' : '' }}
                                value="Rusak Ringan">Rusak Ringan
                            </option>
                            <option {{ old('kondisi', $data->kondisi) === 'Rusak Berat' ? 'selected' : '' }}
                                value="Rusak Berat">
                                Rusak Berat</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="formGroupExampleInput9"
                        class="form-label font-weight-bold col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-10">

                        <input name="jumlah" type="number" class="form-control @error('jumlah') is-invalid @enderror"
                            id="formGroupExampleInput2" required value="{{ old('jumlah') }}">
                        @error('jumlah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="formGroupExampleInput10"
                        class="form-label font-weight-bold col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">

                        <input type="number" class="form-control @error('harga') is-invalid @enderror"
                            id="formGroupExampleInput" name="harga" required value="{{ old('harga') }}">
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="mb-3 row">
                    <label for="formGroupExampleInput"
                        class="form-label font-weight-bold col-sm-2 col-form-label">Keterangan</label>

                    <div class="col-sm-10">
                        <input name="keterangan" type="text" class="form-control" id="formGroupExampleInput2"
                            value="{{ old('keterangan') }}">
                        <small>* Bisa diiisi spesifikasi barang dan lain lain</small>
                    </div>

                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success col-md-3 ms-auto mt-4" type="submit">Submit</button>

                </div>

            </div>



        </form>



    </div>

    @push('scripts')
        <script>
            $("#datepicker").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true //to close picker once year is selected
            });
        </script>
    @endpush
@endsection
