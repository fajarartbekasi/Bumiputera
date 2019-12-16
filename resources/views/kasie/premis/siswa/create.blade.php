@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Formulir Premis .</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0">
                <div class="card-body">
                    <form action="{{route('kasie.simpan.data.type-premi.baru')}}" method="POST">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="card border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="code_premi" class="text-muted">Code Premi *</label>
                                                <input type="text"
                                                       name="code_premi"
                                                       id="code_premi"
                                                       value="1013"
                                                       readonly
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name" class="text-muted">Jenis Premis *</label>
                                                <input type="text"
                                                       name="name"
                                                       id="name"
                                                       value="{{old('name')}}"
                                                       class="form-control"
                                                       placeholder="Jenis premis...">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="premi_1" class="text-muted">Juara *</label>
                                                <input type="number"
                                                       name="premi_1"
                                                       id="premi_1"
                                                       value="{{old('premi_1')}}"
                                                       class="form-control"
                                                       placeholder="Rp.">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="premi_2" class="text-muted">Unggul *</label>
                                                <input type="number"
                                                       name="premi_2"
                                                       id="premi_2"
                                                       value="{{old('premi_2')}}"
                                                       class="form-control"
                                                       placeholder="Rp.">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="premi_3" class="text-muted">Pandai *</label>
                                                <input type="number"
                                                       name="premi_3"
                                                       id="premi_3"
                                                       value="{{old('premi_3')}}"
                                                       class="form-control"
                                                       placeholder="Rp.">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="premi_4" class="text-muted">Cerdas *</label>
                                                <input type="number"
                                                       name="premi_4"
                                                       id="premi_4"
                                                       value="{{old('premi_4')}}"
                                                       class="form-control"
                                                       placeholder="Rp.">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="premi_5" class="text-muted">Tangkas *</label>
                                                <input type="number"
                                                       name="premi_5"
                                                       id="premi_5"
                                                       value="{{old('premi_5')}}"
                                                       class="form-control"
                                                       placeholder="Rp.">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="premi_6" class="text-muted">Kualitas *</label>
                                                <input type="number"
                                                       name="premi_6"
                                                       id="premi_6"
                                                       value="{{old('premi_6')}}"
                                                       class="form-control"
                                                       placeholder="Rp.">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="premi_7" class="text-muted">Cendekia *</label>
                                                <input type="number"
                                                       name="premi_7"
                                                       id="premi_7"
                                                       value="{{old('premi_7')}}"
                                                       class="form-control"
                                                       placeholder="Rp.">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="premi_8" class="text-muted">Prima *</label>
                                                <input type="number"
                                                       name="premi_8"
                                                       id="premi_8"
                                                       value="{{old('premi_8')}}"
                                                       class="form-control"
                                                       placeholder="Rp.">

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description" class="text-muted">Description *</label>
                                                <textarea name="description" id="description" rows="10"
                                                    class="form-control">

                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="email" value="{{auth()->user()->email}}" id="">
                                    <div class="mt-3 mb-3">
                                        <button type="submit" class="btn btn-outline-info">
                                            tambah jenis premi
                                        </button>
                                        <a href="{{route('home')}}" class="btn btn-outline-danger">
                                            cancel
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection