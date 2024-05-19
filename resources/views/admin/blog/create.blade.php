@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">اضافة مقال</h3>
        </div>
        <form action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">العنوان</label>
                    <input type="text" name="title" class="form-control" placeholder="العنوان">
                </div>
                <div class="form-group">
                    <label class="form-label">الصورة</label>
                    <input type="file" accept="image/*" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label">المحتوي</label>
                    <textarea id="summernote" name="content"></textarea>
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
