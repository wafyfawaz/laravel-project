@extends('them.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <h2>مثال على مشروع دليل الشركة</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('companies.create') }}"> إنشاء سجل جديد</a>
                </div>
            </div>

        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
<!-- بداية زر البحث  -->
        <div class="row">
    <div class="col-lg-6">
        <form action="{{ route('companies.index') }}" method="GET">
        @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="ابحث عن الشركات..." name="search">
                <button class="btn btn-outline-secondary" type="submit">ابحث</button>
            </div>
        </form>
    </div>
</div>

<!-- نهاية زر البحث  -->


<div class="row mb-3">
    <div class="col-lg-12">
        <a class="btn btn-secondary" href="{{ route('companies.index') }}">عرض جميع السجلات</a>
    </div>
</div>

@if ($companies->isEmpty())
    <div class="alert alert-warning">
        لا توجد بيانات.
    </div>
@else

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>الرقم</th>
                    <th>اسم الشركة</th>
                    <th>البريد الإلكتروني</th>
                    <th>العنوان</th>
                    <th width="280px">الإجراء</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->address }}</td>
                        <td>
                            <form action="{{ route('companies.destroy',$company->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">التعديل</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">الحذف</button>
                            </form>
                        </td>
                    </tr>
                   
                    @endforeach
            </tbody>
        </table>
        @endif
      
  <div class="pagination justify-content-end">
    {{ $companies->links() }}
   </div>
       
    </div>
 @endSection