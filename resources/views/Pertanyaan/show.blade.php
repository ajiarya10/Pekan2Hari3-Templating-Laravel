@extends('adminlte.master')

@section('content')
<div class="container">
    <!-- <div class="mt-2"> -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Pertanyaan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <div class="ml-1">
                <div class="form-group">
                    <a href="/pertanyaan/create"><button type="submit" class="btn btn-primary">Create</button></a>
                </div>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pertanyaan as $a)
                    <tr>
                        <td>{{$a->judul}}</td>
                        <td>{{$a->isi}}</td>
                        <td style="display: flex;">
                            <a href="/pertanyaan/{{ $a->id }}/detail" class="btn btn-info btn-sm">Detail</a>
                            <a href="/pertanyaan/{{ $a->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <form action="/pertanyaan/{{ $a->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="delete" class="btn btn-danger btn-sm">
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- </div> -->
</div>
@endsection
