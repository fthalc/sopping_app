<div class="col mb-5">
    <div class="card-title" style="font-weight: bolder;text-align: center">KATEGORİLER</div>
    <div class="list-group">
        @foreach($categories as $category)
            <a style="border-radius: 10px;margin-top: 5px;margin-bottom: 5px" class="list-group-item text-light bg-dark" href="#">{{$category->name}}<span style="font-weight: bolder;border-radius: 50px" class="text-black bg-white float-end">12</span></a>
        @endforeach
    </div>
</div>
