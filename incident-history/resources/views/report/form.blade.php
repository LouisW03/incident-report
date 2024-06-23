@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($incident) ? 'Edit' : 'Tambah' }} Insiden</h1>
    @if(isset($mhs))
        <form action="{{ route('report.update', $incident->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
    @else
        <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
        <div class="mb-3">
            <label for="subdomain" class="form-label">Web Subdomain</label>
            <input type="text" name="subdomain" class="form-control" value="{{ old('subdomain', $incident->subdomain ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="webowner" class="form-label">Nama Pemilik Web</label>
            <input type="text" name="webowner" class="form-control" value="{{ old('webowner', $incident->webowner ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipe Insiden</label>
            <select name="type" class="form-control" required>
                @foreach($tipes as $tipe)
                    <option value="{{ $tipe->id }}" {{ old('type', $incident->type ?? '') == $tipe->id ? 'selected' : '' }}>{{ $tipe->type }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Tanggal insiden</label>
            <input type="text" name="date" class="form-control" id="datepicker" value="{{ old('date', $incident->date ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status Insiden</label>
            <select name="status" class="form-control" required>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}" {{ old('status', $incident->status ?? '') == $status->id ? 'selected' : '' }}>{{ $status->status }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });
</script>
@endsection
