<x-master>
    <!-- HEADER -->
    <header id="main-header" class="py-2 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>
                        <i class="far fa-address-book"></i> Address Book</h1>
                </div>
            </div>
        </div>
    </header>
    <!-- SEARCH -->
    <section id="search" class="py-4 mb-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="mx-auto pull-right">
                        <div class="">
                            <form action="/contacts" method="GET" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control mr-2" name="search"
                                           placeholder="Search everything" id="search">
                                    <span class="input-group-btn mr-1 mt-1">
                                            <button class="btn btn-info" type="submit" title="Search everything">
                                             <span class="fas fa-search"></span>
                                                  </button>
                                             </span>
                                    <a href="/contacts" class=" mt-1">
                                               <span class="input-group-btn">
                                            <button class="btn btn-success" type="button" title="Refresh page">
                                                <span class="fas fa-sync-alt"></span>
                                             </button>
                                              </span>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <a href="/contacts/create" class="btn btn-dark btn-block">
                        <i class="fas fa-user-plus"></i> Add Contact
                    </a>
                </div>
            </div>
        </div>
    </section>


<!-- POSTS -->
    <section id="posts">
        <div class="container">
            <div class="card-columns">
                @foreach($contacts as $contact)
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title d-flex justify-content-center">
                                <a href="/contacts/{{$contact->id}}" class="text-dark mx-2">{{$contact->name}}</a>
                                <a href="/contacts/{{$contact->id}}/edit" class="mx-2"><i class="fas fa-user-edit"></i></a>
                                    <form
                                        onclick="return confirm('Do you want to delete this contact?');"
                                        action="/contacts/{{$contact->id}}"
                                        method="post">

                                        @csrf
                                        @method('delete')
                                        <button type="submit" value="Delete"
                                                class="btn btn-sm text-danger"><i class="fas fa-user-times"></i>
                                        </button>
                                    </form>

                            </h4>
                            <ul class="card-text text-info" style="list-style: none;">
                            @foreach($contact->emails as $email)
                            <li><i class="fas fa-at"></i> {{$email->email}}</li>
                            @endforeach
                            </ul>
                            <ul class="card-text text-success" style="list-style: none;">
                            @foreach($contact->phones as $phone)
                                <li><i class="fas fa-phone"></i> {{$phone->number}}</li>
                            @endforeach
                            </ul>
                            <p class="card-text text-center">
                                <small class="text-muted">Added in {{$contact->created_at}}</small>
                            </p>
                        </div>
                    </div>
                @endforeach
                    {{ $contacts->links() }}
            </div>
        </div>
    </section>
</x-master>
