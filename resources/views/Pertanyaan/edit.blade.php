@extends('adminlte.master')

@section('content')
<div class="container">
    <!-- <div class="mt-2"> -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Question {{$pertanyaan->id}}</h3>
        </div>
        <!-- /.card-header -->
        <form role="form" action="{{route('pertanyaan.update',['pertanyaan' => $pertanyaan->id])}}" method="post">
            <!-- {{ csrf_field() }}
            {{ method_field('PUT') }} -->
            @csrf
            @method('PUT')
            <div class="card-body">
                <!-- <div class="form-group">
                        <label for="exampleInputEmail1">Profile id</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter profile id">
                    </div> -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul"
                        value="{{ old('title',$pertanyaan->judul) }}" placeholder="Enter judul">
                    @error('judul')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Isi</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="isi">{{ old('isi', $pertanyaan->isi) }}</textarea>
                </div>
                @error('isi')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- /.box-body -->
            <div class="ml-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
        <!-- /.card-body -->
    </div>
    <!-- </div> -->
</div>
@endsection
