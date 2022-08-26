@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.departments.store') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="inputName" class="col-3 col-form-label">Tên</label>
                            <div class="col-9">
                                <input type="text" class="form-control" id="inputName" placeholder="Tên" name="name">
                            </div>
                        </div>
                        <div class="form-group mb-0 justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Thêm</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('menusidebar')
    @include('admin/sidebar_admin')
@endsection

@push('js')
@endpush
