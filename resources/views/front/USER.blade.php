@extends('front.layout.app')
@section('title', 'account')
@section('content')
<main class="user">
    <section style="background-color: #eee">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px" />
                            <h5 class="my-3">John Smith</h5>
                            <p class="text-muted mb-1">Full Stack Developer</p>
                            <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                            <a href="">edit your info</a>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fas fa-globe fa-lg text-warning"></i>
                                    <p class="mb-0">https://mdbootstrap.com</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-github fa-lg" style="color: #333333"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-twitter fa-lg" style="color: #55acee"></i>
                                    <p class="mb-0">@mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">Johnatan Smith</p>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">example@example.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 followers-md">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4">Your Followers</p>
                                    <div class="followers">
                                        <div class="follower">
                                            <div class="img">
                                                <img src="https://cdn-icons-png.flaticon.com/512/666/666201.png" alt="" />
                                            </div>
                                            <a>Murad Agamedov</a>
                                            <a class="btn btn-success">follow</a>
                                        </div>
                                        <div class="follower">
                                            <div class="img">
                                                <img src="https://cdn-icons-png.flaticon.com/512/666/666201.png" alt="" />
                                            </div>
                                            <a>Murad Agamedov</a>
                                            <a class="btn btn-success">follow</a>
                                        </div>
                                        <div class="follower">
                                            <div class="img">
                                                <img src="https://cdn-icons-png.flaticon.com/512/666/666201.png" alt="" />
                                            </div>
                                            <a>Murad Agamedov</a>
                                            <a class="btn btn-success">follow</a>
                                        </div>
                                        <div class="follower">
                                            <div class="img">
                                                <img src="https://cdn-icons-png.flaticon.com/512/666/666201.png" alt="" />
                                            </div>
                                            <a>Murad Agamedov</a>
                                            <a class="btn btn-success">follow</a>
                                        </div>
                                        <div class="follower">
                                            <div class="img">
                                                <img src="https://cdn-icons-png.flaticon.com/512/666/666201.png" alt="" />
                                            </div>
                                            <a>Murad Agamedov</a>
                                            <a class="btn btn-success">follow</a>
                                        </div>
                                        <div class="follower">
                                            <div class="img">
                                                <img src="https://cdn-icons-png.flaticon.com/512/666/666201.png" alt="" />
                                            </div>
                                            <a>Murad Agamedov</a>
                                            <a class="btn btn-success">follow</a>
                                        </div>
                                        <div class="follower">
                                            <div class="img">
                                                <img src="https://cdn-icons-png.flaticon.com/512/666/666201.png" alt="" />
                                            </div>
                                            <a>Murad Agamedov</a>
                                            <a class="btn btn-success">follow</a>
                                        </div>
                                        <div class="follower">
                                            <div class="img">
                                                <img src="https://cdn-icons-png.flaticon.com/512/666/666201.png" alt="" />
                                            </div>
                                            <a>Murad Agamedov</a>
                                            <a class="btn btn-success">follow</a>
                                        </div>
                                        <div class="follower">
                                            <div class="img">
                                                <img src="https://cdn-icons-png.flaticon.com/512/666/666201.png" alt="" />
                                            </div>
                                            <a>Murad Agamedov</a>
                                            <a class="btn btn-success">follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 followers-md">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4">Your Followers</p>
                                    <div class="followers">
                                        <div class="follower">
                                            <div class="img">
                                                <img src="https://cdn-icons-png.flaticon.com/512/666/666201.png" alt="" />
                                            </div>
                                            <a>Murad Agamedov</a>
                                            <a class="btn btn-success">follow</a>
                                        </div>
                                        <div class="follower">
                                            <div class="img">
                                                <img src="https://cdn-icons-png.flaticon.com/512/666/666201.png" alt="" />
                                            </div>
                                            <a>Murad Agamedov</a>
                                            <a class="btn btn-success">follow</a>
                                        </div>
                                        <div class="follower">
                                            <div class="img">
                                                <img src="https://cdn-icons-png.flaticon.com/512/666/666201.png" alt="" />
                                            </div>
                                            <a>Murad Agamedov</a>
                                            <a class="btn btn-success">follow</a>
                                        </div>
                                        <div class="follower">
                                            <div class="img">
                                                <img src="https://cdn-icons-png.flaticon.com/512/666/666201.png" alt="" />
                                            </div>
                                            <a>Murad Agamedov</a>
                                            <a class="btn btn-success">follow</a>
                                        </div>
                                        <div class="follower">
                                            <div class="img">
                                                <img src="https://cdn-icons-png.flaticon.com/512/666/666201.png" alt="" />
                                            </div>
                                            <a>Murad Agamedov</a>
                                            <a class="btn btn-success">follow</a>
                                        </div>
                                        <div class="follower">
                                            <div class="img">
                                                <img src="https://cdn-icons-png.flaticon.com/512/666/666201.png" alt="" />
                                            </div>
                                            <a>Murad Agamedov</a>
                                            <a class="btn btn-success">follow</a>
                                        </div>
                                        <div class="follower">
                                            <div class="img">
                                                <img src="https://cdn-icons-png.flaticon.com/512/666/666201.png" alt="" />
                                            </div>
                                            <a>Murad Agamedov</a>
                                            <a class="btn btn-success">follow</a>
                                        </div>
                                        <div class="follower">
                                            <div class="img">
                                                <img src="https://cdn-icons-png.flaticon.com/512/666/666201.png" alt="" />
                                            </div>
                                            <a>Murad Agamedov</a>
                                            <a class="btn btn-success">follow</a>
                                        </div>
                                        <div class="follower">
                                            <div class="img">
                                                <img src="https://cdn-icons-png.flaticon.com/512/666/666201.png" alt="" />
                                            </div>
                                            <a>Murad Agamedov</a>
                                            <a class="btn btn-success">follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
