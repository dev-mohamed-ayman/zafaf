@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">اضافة صلاحية</h3>
        </div>
        <form action="{{ route('admin.role.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name" class="form-label">اسم الصلاحية</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="اسم الصلاحية">
                </div>
                <div class="form-group">
                    <label for="permission" class="form-label">الأذونات</label>
                    <div class="d-flex align-items-center flex-wrap">
                        @foreach($permissions as $permission)
                            @if($loop->index != '0')
                            <span>|</span>
                            @endif
                            <div class="m-3">
                                <input type="checkbox" name="permissions[]" value="{{$permission->name}}"
                                       id="permission{{$permission->id}}" class=""
                                       placeholder="الأذونات">
                                <label for="permission{{$permission->id}}" class="m-0">{{$permission->name}}</label>
                            </div>
                        @endforeach
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
