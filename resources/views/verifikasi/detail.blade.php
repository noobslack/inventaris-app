@extends('layout.main')

{{-- @php
  dd($errors->has('kode_barang'));  
@endphp --}}

@section('container')
    {{-- Form Head --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Data Inventaris</h6>

        </div>




        <div class="card-body ">

            <div class="mb-3 row ">
                <label for="formGroupExampleInput" class="form-label font-weight-bold col-sm-2 col-form-label">Barcode
                    Barang</label>
                <div class="col-sm-10">
                    <div class="mb-3">{!! DNS1D::getBarcodeHTML($dataInventaris->kode_barang, 'C39') !!}</div>

                </div>
            </div>
            <div class="mb-3 row ">
                <label for="formGroupExampleInput" class="form-label font-weight-bold col-sm-2 col-form-label">Kode
                    Barang</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control @error('kode_barang') is-invalid @enderror "
                        name="kode_barang" required value="{{ old('kode_barang', $dataInventaris->kode_barang) }}">
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
                    <input disabled name="nama_barang" type="text"
                        class="form-control @error('nama_barang') is-invalid @enderror " id="formGroupExampleInput2"
                        required value="{{ old('nama_barang', $dataInventaris->nama_barang) }}">
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
                    <select disabled class="custom-select" name="id_ruangan">
                        @foreach ($ruangan as $data)
                            @if (old('id_ruangan', $dataInventaris->id_ruangan) == $data->id)
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
                    <input disabled name="merk_type" type="text"
                        class="form-control @error('merk_type') is-invalid @enderror" id="merk_type" required
                        value="{{ old('merk_type', $dataInventaris->merk_type) }}">
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
                    <input disabled name="bahan" type="text" class="form-control @error('bahan') is-invalid @enderror"
                        id="bahan" required value="{{ old('bahan', $dataInventaris->bahan) }}">
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
                    <input disabled name="asalusul" type="text" class="form-control @error('asalusul') is-invalid @enderror"
                        id="formGroupExampleInput" required value="{{ old('asalusul', $dataInventaris->asalusul) }}">
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
                    <input disabled type="text" name="tahun_perolehan"
                        class="form-control datepicker @error('tahun_perolehan') is-invalid @enderror" id="datepicker"
                        required value="{{ old('tahun_perolehan', $dataInventaris->tahun_perolehan) }}">
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
                    <input disabled name="ukuran" type="text" class="form-control @error('ukuran') is-invalid @enderror"
                        id="formGroupExampleInput" required value="{{ old('ukuran', $dataInventaris->ukuran) }}">
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
                    <input disabled name="satuan" type="text" class="form-control @error('satuan') is-invalid @enderror"
                        id="formGroupExampleInput2" required value="{{ old('satuan', $dataInventaris->satuan) }}">
                    @error('satuan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>

            <div class="mb-3 row">
                <label for="formGroupExampleInput8"
                    class="form-label font-weight-bold col-sm-2 col-form-label">Kondisi</label>
                <div class="col-sm-10">
                    <input disabled name="kondisi" type="text" class="form-control @error('kondisi') is-invalid @enderror"
                        id="formGroupExampleInput" required value="{{ old('kondisi', $dataInventaris->kondisi) }}">
                    @error('kondisi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
            </div>

            <div class="mb-3 row">
                <label for="formGroupExampleInput9"
                    class="form-label font-weight-bold col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">

                    <input disabled name="jumlah" type="number" class="form-control @error('jumlah') is-invalid @enderror"
                        id="formGroupExampleInput2" required value="{{ old('jumlah', $dataInventaris->jumlah) }}">
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

                    <input disabled type="number" class="form-control @error('harga') is-invalid @enderror"
                        id="formGroupExampleInput" name="harga" required
                        value="{{ old('harga', $dataInventaris->harga) }}">
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
                    <input disabled name="keterangan" type="text"
                        class="form-control @error('keterangan') is-invalid @enderror" id="formGroupExampleInput2" required
                        value="{{ old('keterangan', $dataInventaris->keterangan) }}">
                    @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>

            <div class="justify-content-md-end d-flex">
                <a href="" class="btn btn-danger  mt-5"><i class="fas fa-times mr-2"></i></i>Tolak</a>
                <a href="/verification/confirm/{{ $dataInventaris->id }}" class="btn btn-info mx-3  mt-5"
                    type="button"><i class="fas fa-check mr-2"></i>
                    Setujui
                </a>


            </div>

        </div>







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
