<x-master>
    <!-- HEADER -->
    <header id="main-header" class="py-2 bg-success text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>
                        <i class="far fa-address-book"></i> Phones</h1>
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
                            <form action="/phones" method="GET" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control mr-2" name="search"
                                           placeholder="Search phones" id="search">
                                    <span class="input-group-btn mr-1 mt-1">
                                            <button class="btn btn-info" type="submit" title="Search phones">
                                             <span class="fas fa-search"></span>
                                                  </button>
                                             </span>
                                    <a href="/phones" class=" mt-1">
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
                    <a href="/phones/create" class="btn btn-dark btn-block">
                        <i class="fas fa-plus"></i> Add Phone
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
                                <th>Phone Number</th>
                                <th>Name</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($phones as $phone)
                                <tr>
                                    <td class="text-success">{{$phone->number}}</td>
                                    <td>{{$phone->contact->name}}</td>
                                    <td><a href="/phones/{{$phone->id}}/edit" class="btn btn-dark "><i class="fas fa-edit"></i></a></td>
                                    <td class="text-danger"> <form
                                            onclick="return confirm('Do you want to delete this phone?');"
                                            action="/phones/{{$phone->id}}"
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

                        {{$phones->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master>
