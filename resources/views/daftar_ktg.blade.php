@extends('susunan/utama')

@section('container')
  <ul>
    @foreach ($kategori as $k)
      <li><a href="/pertanyaan?kategori={{ $k->id }}">{{ $k->nama }}</a></li>
    @endforeach
  </ul>
@endsection