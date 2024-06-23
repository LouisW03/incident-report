@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Laporan Insiden</h1>
    <a href="{{ route('report.create') }}" class="btn btn-primary">Tambah Laporan</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Web Subdomain</th>
                <th>OPD Pemilik Web</th>
                <th>Tipe Insiden</th>
                <th>Tanggal Insiden</th>
                <th>Status Insiden</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($incident as $index => $m)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $m->subdomain }}</td>
                <td>{{ $m->webowner }}</td>
                <td>{{ $m->tipe->type }}</td>
                <td>{{ $m->date }}</td>
                <td>{{ $m->kondisi->status }}</td>
                <td>
                    <a href="{{ route('report.edit', $m->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('report.destroy', $m->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
