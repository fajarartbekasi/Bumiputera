@extends('layouts.app')

@section('content')
    <div class="container py-4">
       <div class="row justify-content-center">
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Formulir Update Premis .</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <form action="{{route('kasie.update.data', $type->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-primary" role="alert">
                                        Types data
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="text-muted">Nama paket *</label>
                                        <input type="text" name="name" id="" value="{{ $type->name }}" class="form-control"
                                            >
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="text-muted">Description *</label>
                                        <input type="text" name="description" id="" value="{{ $type->description}}" class="form-control"
                                            >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="alert alert-primary" role="alert">
                                        Premi Data
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="text-muted">Harga *</label>
                                        <input type="text" name="price" id="" value="{{ $type->premis()->first()->price}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="region_1" class="text-muted">Wilayah I</label>
                                        <input type="number" name="premi_1" id="" value="{{ $type->premis->first()->premi_1 }}" class="form-control"
                                            >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="region_2" class="text-muted">Wilayah II</label>
                                        <input type="number" name="premi_2" id="" value="{{ $type->premis->first()->premi_2 }}" class="form-control"
                                            >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="region_3" class="text-muted">Wilayah III</label>
                                        <input type="number" name="premi_3" id="" value="{{ $type->premis->first()->premi_3 }}" class="form-control"
                                            >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="region_3" class="text-muted">Wilayah III</label>
                                        <input type="number" name="premi_4" id="" value="{{ $type->premis->first()->premi_4 }}" class="form-control"
                                            >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" >
                                        <label for="region_3" class="text-muted">Wilayah III</label>
                                        <input type="number" name="premi_5" id="" value="{{ $type->premis->first()->premi_5 }}" class="form-control"
                                            >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="region_3" class="text-muted">Wilayah III</label>
                                        <input type="number" name="premi_6" id="" value="{{ $type->premis->first()->premi_6}}" class="form-control"
                                            >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="region_3" class="text-muted">Wilayah III</label>
                                        <input type="number" name="premi_7" id="" value="{{ $type->premis->first()->premi_7 }}" class="form-control"
                                            >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" >
                                        <label for="region_3" class="text-muted">Wilayah III</label>
                                        <input type="number" name="premi_8" id="" value="{{ $type->premis->first()->premi_8 }}" class="form-control"
                                            >
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 mb-3">
                                <button type="submit" class="btn btn-outline-info ">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20"
                                         width="30"
                                         heigth="30">
                                        <path fill-rule="evenodd"
                                              fill="#008CCC"
                                              d="M4.16 4.16l1.42 1.42A6.99 6.99 0 0 0 10 18a7 7 0 0 0 4.42-12.42l1.42-1.42a9 9 0 1 1-11.69 0zM9 0h2v8H9V0z" />
                                    </svg>
                                    Simpan jenis asuransi
                                </button>
                                <a href="{{route('home')}}" class="btn btn-outline-danger ">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20"
                                         width="30"
                                         heigth="30">
                                        <path fill="#CD1E17"
                                              d="M5 4a2 2 0 0 0-2 2v6H0l4 4 4-4H5V6h7l2-2H5zm10 4h-3l4-4 4 4h-3v6a2 2 0 0 1-2 2H6l2-2h7V8z" />
                                    </svg>
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection