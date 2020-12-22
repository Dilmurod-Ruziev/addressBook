<x-master>
    <header id="main-header" class="py-2 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>
                        <i class="far fa-edit"></i> Edit Phone</h1>
                </div>
            </div>
        </div>
    </header>
    <div class="card card-body bg-light mt-5">
        <h2>{{$phone->contact->name}}</h2>
        <form action="/phones/{{$phone->id}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <div id="inputFormPhone">
                    <label for="phone">Phone</label>
                    <div class="input-group mb-3">
                        <input type="tel" name="number" class="form-control m-input"
                               placeholder="Enter phone" value="{{$phone->number}}" required>
                        @foreach ($errors->get('number') as $message)
                            <div class="text-danger">{{$message}}</div>
                        @endforeach
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>
</x-master>
