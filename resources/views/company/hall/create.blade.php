@extends('company.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">اضافة قاعة</h3>
        </div>
        <form action="{{ route('company.hall.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">الاسم بالعربي</label>
                    <input type="text" name="name_ar" class="form-control" placeholder="الاسم بالعربي">
                </div>
                <div class="form-group">
                    <label class="form-label">الاسم بالانجليزي</label>
                    <input type="text" name="name_en" class="form-control" placeholder="الاسم بالانجليزي">
                </div>
                <div class="form-group">
                    <label class="form-label">العنوان</label>
                    <input type="text" name="address" class="form-control" placeholder="العنوان">
                </div>
                <div class="form-group">
                    <label class="form-label">احداثيات الموقع</label>
                    <input type="text" name="coordinates" class="form-control" placeholder="احداثيات الموقع">
                </div>
                <div class="form-group">
                    <label class="form-label">الوصف بالعربي</label>
                    <textarea name="description_ar" class="form-control" placeholder="الوصف بالعربي"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">الوصف بالانجليزي</label>
                    <textarea name="description_en" class="form-control" placeholder="الوصف بالانجليزي"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">السعه</label>
                    <input type="text" name="size" class="form-control" placeholder="السعه">
                </div>
                <div class="form-group">
                    <label class="form-label">السعر</label>
                    <input type="text" name="price" class="form-control" placeholder="السعر">
                </div>
                <div class="form-group">
                    <label class="form-label">الهاتف</label>
                    <input type="text" name="phone" class="form-control" placeholder="الهاتف">
                </div>
                <div class="form-group">
                    <label class="form-label">رقم الواتساب</label>
                    <input type="text" name="whatsapp" class="form-control" placeholder="رقم الواتساب">
                </div>
                <div class="form-group">
                    <label class="form-label">النوع</label>
                    <select name="type" class="form-control">
                        <option disabled selected>النوع</option>
                        <option value="hotels">فندق</option>
                        <option value="halls">قاعة</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">هل يوجد عروض</label>
                    <select name="offer" class="form-control">
                        <option disabled selected>هل يوجد عروض</option>
                        <option value="1">نعم</option>
                        <option value="0">لا</option>
                    </select>
                </div>
                {{-- <div class="form-group">
                    <label class="form-label">الترتيب</label>
                    <select name="order" class="form-control">
                        <option disabled selected>الترتيب</option>
                        <option value="3">vip</option>
                        <option value="2">دايموند</option>
                        <option value="1">جولد</option>
                    </select>
                </div> --}}
                <div class="form-group">
                    <label class="form-label">اختر مدينه</label>
                    <select name="city_id" class="form-control">
                        <option disabled selected>اختر مدينه</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->title() }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">الصور</label>
                    <input type="file" id="file-input" accept="image/*" multiple name="images[]" class="form-control"
                        placeholder="الصور">
                </div>
            </div>

            <div id="images" class="d-flex align-items-center gap-2 flex-wrap"></div>
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
        fileInput.onchange = function() {
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
