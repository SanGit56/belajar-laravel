@extends('dasbor/susunan/utama')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pertanyaan</h1>
  </div>

  <div class="col-lg-6">
    <form method="POST" action="/dasbor/pertanyaan" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label for="tanya" class="form-label @error('tanya') is-invalid @enderror">tanya</label>
          <input type="text" name="tanya" class="form-control" id="tanya" value="{{ old('tanya') }}">

          @error('tanya')
            <div class="invalid-feedback">{{ $pesan }}</div>
          @enderror
        </div>
        
        <div class="mb-3">
          <label for="jawab" class="form-label">jawab</label>
          <input type="text" name="jawab" class="form-control" id="jawab">
        </div>

        <div class="mb-3">
          <label for="kategori_id" class="form-label">kategori</label>
          <select class="form-select" name="kategori_id">
            @foreach ($kategori as $k)
              <option value="{{ $k->id }}">{{ $k->nama }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="gambar" class="form-label">unggah gambar</label>
          <input class="form-control" type="file" id="gambar" name="gambar" onchange="previewImage()">
          <img src="" alt="" class="img-preview img-fluid col-sm-5">
        </div>

        <button type="submit" class="btn btn-primary">tambah</button>
    </form>
  </div>

  <script>
    function previewImage() {
      const gmbr = document.querySelector('#gambar');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(gmbr.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
  </script>
@endsection