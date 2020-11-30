@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Driver yang sudah ditambahkan</div>
                <div class="card-body">
                    <div class="container">
                        <table class="table" id="data_driver">
                            <thead>
                                <tr>
                                    <th class="hidden">Aksi</th>
                                    <th>ID Driver</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>No HP</th>
                                    <th>KTP/SIM</th>
                                    <th>Armada</th>
                                    <th>Rekening</th>
                                    <th>Regional</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($drivers as $driver)
                                    <tr>
                                        <td>
                                            <a href="{{url('driver/delete?id=').$driver->user->id}}" class="btn btn-danger">Hapus</a>
                                        </td>
                                        <td>{{$driver->id_driver}}</td>
                                        <td>
                                            <a href="{{asset('storage/app/driver/'.$driver->foto_driver)}}" target="_blank">
                                                Foto Driver
                                            </a>
                                        </td>
                                        <td>{{$driver->user->name}}</td>
                                        <td>{{$driver->user->no_hp}}</td>
                                        <td>
                                            <ul>
                                                <li>
                                                    <a href="{{asset('storage/app/driver/'.$driver->foto_ktp)}}" target="_blank">KTP</a> : {{$driver->no_ktp}}
                                                </li>
                                                <li>
                                                    <a href="{{asset('storage/app/driver/'.$driver->foto_sim)}}" target="_blank">SIM</a> : {{$driver->no_sim}}
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <a href="{{asset('storage/app/driver/'.$driver->foto_armada)}}"
                                                target="_blank">Foto Armada</a>
                                            <br/>
                                            {{$driver->tipe_armada}}
                                            <br/>
                                            No Polisi : {{$driver->no_polisi}}
                                        </td>
                                        <td>
                                            {{$driver->no_rekening}} <br/>
                                            {{$driver->nama_bank}} <br/>
                                            a.n {{$driver->nama_holder}}
                                        </td>
                                        <td>
                                            {{$driver->regional}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
    $(document).ready(function() {
        $.noConflict();
        $('#data_driver').DataTable();
    });
    </script>
@endsection
