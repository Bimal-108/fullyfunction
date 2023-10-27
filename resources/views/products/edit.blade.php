<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <h3>Product Edit #{{$products->name}}</h3>
                    <form method="POST" action="/products/{{$products->id}}/update" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{--                    kunai kura edit paxi update gardha yeo method ma put dina parxa Route ma put used gardha--}}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{old('name', $products->name)}}" class="form-control"/>
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="4" name="description">{{old('description',$products->description)}}</textarea>
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control"/>
                            @error('image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark">Submited</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app>


