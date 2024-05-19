@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">اضافة سجل</h3>
        </div>
        <form action="{{ route('admin.meeting-record.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label class="form-label">القاعة</label>
                        <select class="form-control" name="hall_id">
                            <option disabled selected>اختر قاعة</option>
                            @foreach($halls as $hall)
                                <option value="{{$hall->id}}">{{$hall->name_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label class="form-label">الوقت والتاريخ</label>
                        <input type="datetime-local" name="date" class="form-control" placeholder="الوقت والتاريخ">
                    </div>
                    <div class="col-md-12 form-group">
                        <label class="form-label">Note</label>
                        <textarea name="note" class="form-control" placeholder="Note"></textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </form>
    </div>

    <script>
        let fileInput = document.getElementById("file-input");
        let imageContainer = document.getElementById("images");
        var countImages = document.getElementById('countImages');
        var btnImages = document.getElementById('btnImages');
        var count = '';
        fileInput.onchange = function () {
            count = fileInput.files.length
            imageContainer.innerHTML = "";
            var n = 1
            for (i of fileInput.files) {
                let reader = new FileReader();
                let figure = document.createElement("figure");
                let figCap = document.createElement("figcaption");
                let inp = document.createElement("input");
                // figCap.innerText = i.name;
                inp.value = n
                figure.appendChild(figCap);
                inp.classList.add('form-control')
                inp.setAttribute("name", 'orders[]');
                figure.appendChild(inp);
                reader.onload = () => {
                    let img = document.createElement("img");
                    img.style.width = "100%"
                    img.setAttribute("src", reader.result);
                    figure.insertBefore(img, figCap);
                }
                figure.style.width = "100px"
                imageContainer.appendChild(figure);
                reader.readAsDataURL(i);
                n++
            }
        }
    </script>
@endsection
