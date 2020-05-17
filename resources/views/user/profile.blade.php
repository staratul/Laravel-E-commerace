@extends('layouts.app')

@section('content')
<div class="container-fluid padding-bottom-3x mb-2">
    <div class="row">
        <div class="col-md-3 ml-5">
            <aside class="user-info-wrapper">
                <div class="user-cover" style="background-image: url(https://bootdey.com/img/Content/bg1.jpg);">
                    <div class="info-label" data-toggle="tooltip" title="" data-original-title="You currently have 290 Reward Points to spend"><i class="icon-medal"></i>290 points</div>
                </div>
                <div class="user-info">
                    <div class="user-avatar">
                        <a class="edit-avatar" href="#"></a><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="User"></div>
                    <div class="user-data">
                        <h4>{{ $user->name }}</h4><span>Joined {{ Helper::dateFormat($user->created_at) }}</span>
                    </div>
                </div>
            </aside>
            <nav class="list-group"><a class="list-group-item with-badge" href="#"><i class="fa fa-th"></i>Orders<span class="badge badge-primary badge-pill">6</span></a>
                <a class="list-group-item" href="#"><i class="fa fa-user"></i>Profile</a>
                <a class="list-group-item" href="#"><i class="fa fa-map"></i>Addresses</a>
                <a class="list-group-item with-badge" href="#"><i class="fa fa-heart"></i>Wishlist<span class="badge badge-primary badge-pill">3</span></a>
                <a class="list-group-item with-badge active" href="#"><i class="fa fa-tag"></i>My Tickets<span class="badge badge-primary badge-pill">4</span></a>
            </nav>
        </div>
        <div class="col-md-8">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <div class="table-responsive margin-bottom-2x">

            </div>
            <!-- Messages-->
            <div class="comment">
                <div class="comment-author-ava"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Avatar"></div>
                <div class="comment-body">
                    <p class="comment-text">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi.</p>
                    <div class="comment-footer"><span class="comment-meta">Daniel Adams</span></div>
                </div>
            </div>
            <div class="comment">
                <div class="comment-author-ava"><img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="Avatar"></div>
                <div class="comment-body">
                    <p class="comment-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                    <div class="comment-footer"><span class="comment-meta">Jacob Hammond, Staff</span></div>
                </div>
            </div>
            <div class="comment">
                <div class="comment-author-ava"><img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="Avatar"></div>
                <div class="comment-body">
                    <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="comment-footer"><span class="comment-meta">Jacob Hammond, Staff</span></div>
                </div>
            </div>
            <!-- Reply Form-->
            <h5 class="mb-30 padding-top-1x">Leave Message</h5>
            <form method="post">
                <div class="form-group">
                    <textarea class="form-control form-control-rounded" id="review_text" rows="8" placeholder="Write your message here..." required=""></textarea>
                </div>
                <div class="text-right">
                    <button class="btn btn-outline-primary" type="submit">Submit Message</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@push('styles')
    <link href="{{ asset('/dist/css/user.profile.css') }}" rel="stylesheet" />
@endpush
