<x-master>
    <header id="main-header" class="py-2 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>
                        <i class="far fa-address-card"></i> Add Email</h1>
                </div>
            </div>
        </div>
    </header>
    <div class="card card-body bg-light mt-5">
        <form action="/emails" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label><br>
                <select class="selectpicker" data-live-search="true" name="id">
                    @foreach($contacts as $contact)
                        <option value="{{$contact->id}}">{{$contact->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div id="inputFormEmail">
                    <label for="email">Email</label>
                    <div class="input-group mb-3">
                        <input type="email" name="emails[]" class="form-control m-input"
                               placeholder="Enter email" required>
                        @foreach ($errors->get('emails.*') as $message)
                            <div class="text-danger">{{$message}}</div>
                        @endforeach
                    </div>
                </div>
                <div id="newEmail"></div>
                <button id="addEmail" type="button" class="btn btn-info mb-3">Add Email</button>
            </div>
            <input type="submit" class="btn btn-success" value="Create">
        </form>
    </div>
    @include('components._add-btn')
</x-master>


