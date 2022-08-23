@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div style="text-align: end; padding: 1em">
                        <button type="button" class="btn btn-primary"
                            onclick="window.location='{{ route('admin.classrooms.create') }}'">Thêm lớp học</button>
                    </div>
                    <table class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>Mã lớp</th>
                                <th>Tên</th>
                                <th>Giáo viên phụ trách</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $each)
                                <tr>
                                    <td>{{ $each->id }}</td>
                                    <td>{{ $each->name }}</td>
                                    <td>
                                        @foreach ($lecturers_data as $lecturer)
                                            @if ($each->lecturer_id == $lecturer->id)
                                                {{ $lecturer->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="table-action">
                                        <a href="{{ route('admin.classrooms.edit', ['id' => $each->id]) }}"
                                            class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                    </td>
                                    <td class="table-action">
                                        <form id="form_delete_<?php echo $each->id; ?>"
                                            action="{{ route('admin.classrooms.destroy', ['id' => $each->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="javascript:{};" class="action-icon"
                                                onclick="document.getElementById('form_delete_<?php echo $each->id; ?>').submit();">
                                                <i class="mdi mdi-delete"></i></a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav style="margin-top: 20px">
                        <ul class="pagination pagination-rounded mb-0">
                            {{ $data->links() }}
                        </ul>
                    </nav>
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
