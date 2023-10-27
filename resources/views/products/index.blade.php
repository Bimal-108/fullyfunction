<x-app>
    <div class="container">
        <div class="text-right">
            <a href="/product/create"  class="btn btn-dark mt-2">New Product</a>
        </div>
        <table class="table table-hover mt-2">
            <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td><a href="/products/{{$product->id}}/view" class="text-dark">{{$product->name}}</a></td>
                    <td>
                        <img src="/products/{{$product->image}}" class="rounded-circle" width="50" height="50">
                    </td>
                    <td>
                        <a href="products/{{$product->id}}/edit" class="btn btn-dark btn-sm">Edit</a>
                        <form method="POST" class="d-inline" action="products/{{$product->id}}/delete">
                            @csrf
                            @method('DELETE')
                            {{--                    laravel ly vanxa ki deleted gardha route ma get haina deleted method used garna parxa vanera--}}
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
{{--            layout desgine bigriyeo vane provider ko folder gayera AppService bhitra euta add garnnu parxa--}}
            @endforeach
        </table>
        {{$products->links()}}
    </div>
</x-app>


