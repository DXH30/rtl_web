@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('home')}}" class="btn btn-default btn-sm">
                        <i class="fa fa-arrow-left" aria-hidden="true">
                        </i>
                    </a>
                    {{ __('Tambah Driver') }}
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group input-group input-group-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>Nama Driver :</strong>
                                </div>
                            </div>
                            <input type="text" id="name" name="name" required="required" class="form-control form-control-sm">
                        </div>

                        <div class="form-group input-group input-group-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>ID Driver :</strong>
                                </div>
                            </div>
                            <input type="text" id="id_driver" name="id_driver" required="required" class="form-control form-control-sm">
                        </div>

                        <div class="form-group input-group input-group-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>No Telepon :</strong>
                                </div>
                            </div>
                            <input type="text" id="no_hp" name="no_hp" required="required" class="form-control form-control-sm">
                        </div>

                        <div class="form-group input-group input-group-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>Foto Driver :</strong>
                                </div>
                            </div>
                            <input type="file" id="foto_driver" name="foto_driver" class="form-control form-control-sm" required="required">
                        </div>

                        <div class="form-group input-group input-group-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>No KTP :</strong>
                                </div>
                            </div>
                            <input type="text" id="no_ktp" name="no_ktp" required="required" class="form-control form-control-sm">
                        </div>

                        <div class="form-group input-group input-group-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>Foto KTP :</strong>
                                </div>
                            </div>
                            <input type="file" id="foto_ktp" name="foto_ktp" class="form-control form-control-sm" required="required">
                        </div>


                        <div class="form-group input-group input-group-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>No SIM :</strong>
                                </div>
                            </div>
                            <input type="text" id="no_sim" name="no_sim" required="required" class="form-control form-control-sm">
                        </div>

                        <div class="form-group input-group input-group-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>Foto SIM :</strong>
                                </div>
                            </div>
                            <input type="file" id="foto_sim" name="foto_sim" class="form-control form-control-sm" required="required">
                        </div>

                        <div class="form-group input-group input-group-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>Tipe Armada :</strong>
                                </div>
                            </div>
                            <select type="text" id="tipe_armada" name="tipe_armada" class="form-control form-control-sm" onchange="changeValue(this.value)" required="required">
                                <option value="" readonly="readonly" selected="">Silakan pilih ...</option>
                                <option value="PICK UP BAK">PICK UP BAK</option>
                                <option value="PICK UP BOX">PICK UP BOX</option>
                                <option value="ENGKEL BAK">ENGKEL BAK</option>
                                <option value="ENGKEL BOX">ENGKEL BOX</option>
                                <option value="TRUK CDD BAK">TRUK CDD BAK</option>
                                <option value="TRUK CDD BOX">TRUK CDD BOX</option>
                                <option value="TRUK CDD LOS BAK">TRUK CDD LOS BAK</option>
                                <option value="FUSO ENGKEL">FUSO ENGKEL</option>
                                <option value="FUSO WING BOX">FUSO WING BOX</option>
                            </select>
                        </div>

                        <div class="form-group input-group input-group-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>Foto Armada :</strong>
                                </div>
                            </div>
                            <input type="file" id="foto_armada" name="foto_armada" class="form-control form-control-sm" required="required">
                        </div>
                        <div class="form-group input-group input-group-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>No Polisi :</strong>
                                </div>
                            </div>
                            <input type="text" id="no_polisi" name="no_polisi" required="required" class="form-control form-control-sm">
                        </div>

                        <div class="form-group input-group input-group-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>No Rekening :</strong>
                                </div>
                            </div>
                            <input type="text" id="no_rekening" name="no_rekening" required="required" class="form-control form-control-sm">
                        </div>

                        <div class="form-group input-group input-group-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>Nama Bank :</strong>
                                </div>
                            </div>
                            <input type="text" id="nama_bank" name="nama_bank" required="required" class="form-control form-control-sm">
                        </div>

                        <div class="form-group input-group input-group-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>Nama Holder :</strong>
                                </div>
                            </div>
                            <input type="text" id="nama_holder" name="nama_holder" required="required" class="form-control form-control-sm">
                        </div>

                        <div class="form-group input-group input-group-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>Regional :</strong>
                                </div>
                            </div>
                            <input type="text" id="regional" name="regional" required="required" class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <button type="submit" name="beli" class="btn btn-outline-primary pull-right btn-sm" id="button"><i class="fa fa-paper-plane" aria-hidden="true"><strong> Submit</strong></i></button>
                        </div>

                    </form>
             
                </div>
            </div>
            <div class="card">
                <div class="card-header">Driver yang sudah ditambahkan</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>No HP</th>
                                <th>ID Driver</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($drivers as $driver)
                                <tr>
                                    <td>{{$driver->user->name}}</td>
                                    <td>{{$driver->user->no_hp}}</td>
                                    <td>{{$driver->id_driver}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
