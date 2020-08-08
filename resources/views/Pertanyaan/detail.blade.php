@extends('adminlte.master')

@section('content')
<section class="content">
    <div class="mt-2">
        <div class="callout callout-info">
            <h4>Judul : {{$pertanyaan->judul}}</h4>

            <p>Isi : <br>
                {{$pertanyaan->isi}}
            </p>
        </div>
    </div>
</section>
@endsection
