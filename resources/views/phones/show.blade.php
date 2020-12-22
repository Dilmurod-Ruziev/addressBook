<x-master>
    <section id="actions" class="py-2 mb-2">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="javascript:history.go(-1)" class="btn btn-light btn-block" >
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="/phones/{{$phone->id}}/edit" class="btn btn-dark btn-block">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>
                <div class="col-md-3">
                    <form onclick="return confirm('Do you want to delete this task?');" action="/phones/{{$phone->id}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" value="Delete" class="btn btn-danger btn-block"><i class="far fa-trash-alt"></i> Delete Post</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{$phone->contact->name}}</h2>
                <p class="card-text">{{$phone->number}}</p>
            <p class="card-text">
                <small class="text-muted">Created at {{$phone->created_at->format('H:m, j F')}} </small>
            </p>
        </div>
    </div>
</x-master>


