<x-master>
    <div class="card card-body bg-light mt-5">
        <form action="/contacts" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                @error('name')
                <div class="invalid-feedback">{{$errors->first('name')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <div id="inputFormEmail">
                    <label for="email">Email</label>
                    <div class="input-group mb-2">
                        <input type="email" name="emails[]" class="form-control m-input" required>
                        @foreach ($errors->get('emails.*') as $message)
                            <div class="invalid-feedback">{{$message}}</div>
                        @endforeach
                    </div>
                </div>
                <div id="newEmail"></div>
                <button id="addEmail" type="button" class="btn btn-info mb-3">Add Email</button>
            </div>

            <div class="form-group">
                <div id="inputFormPhone">
                    <label for="phone">Phone</label>
                    <div class="input-group mb-2">
                        <input type="tel" name="phones[]" class="form-control m-input"
                               required>
                        @foreach ($errors->get('phones.*') as $message)
                            <div class="invalid-feedback">{{$message}}</div>
                        @endforeach
                    </div>
                </div>
                <div id="newPhone"></div>
                <button id="addPhone" type="button" class="btn btn-info">Add Phone</button>
            </div>
            {{--            <button id="addPhone" type="button" class="btn btn-success">Add Phone</button>--}}
            {{--        </div>--}}
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>
    @include('components._add-btn')
</x-master>


