<x-master>
    <section id="posts">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">{{$contact->name}}  </h4>
                        <div class="d-flex justify-content-center">
                            <a href="/phones/create" class="btn btn-success mx-2">
                                <i class="fas fa-plus"></i> Add Phone
                            </a>
                            <a href="/emails/create" class="btn btn-info mx-2">
                                <i class="fas fa-plus"></i> Add Email
                            </a>
                            <a href="/contacts/{{$contact->id}}/edit" class="btn btn-dark mx-2">
                                <i class="fas fa-user-edit"></i> Edit
                            </a>
                        <form
                            onclick="return confirm('Do you want to delete this contact?');"
                            action="/contacts/{{$contact->id}}"
                            method="post">

                            @csrf
                            @method('delete')
                            <button type="submit" value="Delete"
                                    class="btn text-danger"><i class="fas fa-user-times"></i> Delete
                            </button>
                        </form>
                        </div>
                    <ul class="card-text text-info" style="list-style: none;">
                        @foreach($contact->emails as $email)
                            <li class="d-flex flex-row m-2"><i class="fas fa-at">{{$email->email}}</i>
                                <a href="/emails/{{$email->id}}/edit" class="btn btn-dark mb-2 mx-2"><i
                                        class="fas fa-edit"></i></a>
                                <form
                                    onclick="return confirm('Do you want to delete this email?');"
                                    action="/emails/{{$email->id}}"
                                    method="post">

                                    @csrf
                                    @method('delete')
                                    <button type="submit" value="Delete"
                                            class="btn bg-danger btn-sm mb-2 nav-link text-white"><i
                                            class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </li>

                        @endforeach
                    </ul>
                    <ul class="card-text text-success" style="list-style: none;">
                        @foreach($contact->phones as $phone)
                            <li class="d-flex flex-row m-2"><i class="fas fa-phone">{{$phone->number}}</i>
                                <a href="/phones/{{$phone->id}}/edit" class="btn btn-dark mb-2 mx-2"><i
                                        class="fas fa-edit"></i></a>
                                <form
                                    onclick="return confirm('Do you want to delete this phone?');"
                                    action="/phones/{{$phone->id}}"
                                    method="post">

                                    @csrf
                                    @method('delete')
                                    <button type="submit" value="Delete"
                                            class="btn bg-danger btn-sm mb-2 nav-link text-white"><i
                                            class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </li>

                        @endforeach
                    </ul>
                    <p class="card-text text-center">
                        <small class="text-muted">Added in {{$contact->created_at}}</small>
                    </p>
                </div>
            </div>

        </div>
    </section>
</x-master>


