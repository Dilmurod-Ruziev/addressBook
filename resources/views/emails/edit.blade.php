<x-master>
    <header id="main-header" class="py-2 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>
                        <i class="far fa-edit"></i> Edit Email</h1>
                </div>
            </div>
        </div>
    </header>
    <div class="card card-body bg-light mt-5">
        <h2>{{$email->contact->name}}</h2>
        <form action="/emails/{{$email->id}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <div id="inputFormEmail">
                    <label for="email">Email</label>
                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{$email->email}}" class="form-control m-input"
                               required>
                        @foreach ($errors->get('email') as $message)
                            <div class="text-danger">{{$message}}</div>
                        @endforeach
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="Update">
        </form>
    </div>
</x-master>
