<x-master>
    <header id="main-header" class="py-2 bg-warning text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>
                        <i class="fas fa-user-edit"></i> Edit Contact</h1>
                </div>
            </div>
        </div>
    </header>
    <div class="card card-body bg-light mt-5">
        <form action="/contacts/{{$contact->id}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" value="{{$contact->name}}" name="name">
                <div class="text-danger">{{$errors->first('name')}}</div>
            </div>
            <input type="submit" class="btn btn-success" value="Update">
            <div class="d-flex justify-content-center">
                <a href="/phones/create" class="btn btn-success mx-2">
                    <i class="fas fa-plus"></i> Add Phone
                </a>
                <a href="/emails/create" class="btn btn-info mx-2">
                    <i class="fas fa-plus"></i> Add Email
                </a>
            </div>
        </form>
    </div>

    @include('components._add-btn')
</x-master>
