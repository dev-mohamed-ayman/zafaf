@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">تعديل السجل</h3>
        </div>
        <form action="{{ route('admin.meeting-record.update', $meetingRecord->id) }}" method="post"
              enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label class="form-label">القاعة</label>
                        <select class="form-control" name="hall_id">
                            @foreach($halls as $hall)
                                <option
                                        value="{{$hall->id}}" {{$hall->id == $meetingRecord->hall_id ?'selected':''}}>{{$hall->name_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label class="form-label">الوقت والتاريخ</label>
                        <input type="datetime-local" name="date" value="{{$meetingRecord->date}}" class="form-control"
                               placeholder="الوقت والتاريخ">
                    </div>
                    <div class="col-md-12 form-group">
                        <label class="form-label">Note</label>
                        <textarea name="note" class="form-control" placeholder="Note">{{$meetingRecord->note}}</textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </form>
    </div>
@endsection
