<x-master>
    <!-- HEADER -->
    <header id="main-header" class="py-2 bg-info text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>
                        <i class="fas fa-envelope"></i> Emails</h1>
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
                            <form action="/emails" method="GET" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control mr-2" name="search"
                                           placeholder="Search emails" id="search">
                                    <span class="input-group-btn mr-1 mt-1">
                                            <button class="btn btn-info" type="submit" title="Search emails">
                                             <span class="fas fa-search"></span>
                                                  </button>
                                             </span>
                                    <a href="/emails" class=" mt-1">
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
                    <a href="/emails/create" class="btn btn-dark btn-block">
                        <i class="fas fa-plus"></i> Add Email
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- POSTS -->
    <section id="posts">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th>Email address</th>
                                <th>Contact name</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($emails as $email)
                                <tr>
                                    <td class="text-info">{{$email->email}}</td>
                                    <td>{{$email->contact->name}}</td>
                                    <td><a href="/emails/{{$email->id}}/edit" class="btn btn-dark "><i class="fas fa-edit"></i></a></td>
                                    <td class="text-danger"> <form
                                            onclick="return confirm('Do you want to delete this email?');"
                                            action="/emails/{{$email->id}}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" value="Delete"
                                                    class="btn bg-danger btn-sm  nav-link text-white"><i class="far fa-trash-alt"></i>
                                            </button>
                                        </form></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$emails->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master>
