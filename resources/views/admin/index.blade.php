@extends('admin.components.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <p class="text-muted">Basic Example with Existing List</p>
                    <div id="contact-existing-list">
                        <div class="row mb-2">
                            <div class="col">
                                <div>
                                    <input class="search form-control" placeholder="Search">
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-light sort asc" data-sort="contact-name">
                                    Sort by name
                                </button>
                            </div>
                        </div>
                        
                        <div data-simplebar="init" style="height: 242px;" class="mx-n3"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
                            <ul class="list list-group list-group-flush mb-0"><li class="list-group-item" data-id="04">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-3">
                                            <div>
                                                <img class="image avatar-xs rounded-circle" alt="" src="assets/images/users/avatar-4.jpg">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="contact-name fs-13 mb-1"><a href="#" class="link text-dark">Gustaf Lindqvist</a></h5>
                                            <p class="contact-born text-muted mb-0">I've finished it! See you so</p>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <div class="fs-11 text-muted">01 hrs</div> 
                                        </div>
                                    </div>
                                </li><li class="list-group-item" data-id="02">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-3">
                                            <div>
                                                <img class="image avatar-xs rounded-circle" alt="" src="assets/images/users/avatar-2.jpg">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="contact-name fs-13 mb-1"><a href="#" class="link text-dark">Jonas Arnklint</a></h5>
                                            <p class="contact-born text-muted mb-0">Bug Report - abc theme</p>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <div class="fs-11 text-muted">12 min</div> 
                                        </div>
                                    </div>
                                </li><li class="list-group-item" data-id="01">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0 me-3">
                                            <div>
                                                <img class="image avatar-xs rounded-circle" alt="" src="assets/images/users/avatar-1.jpg">
                                            </div>
                                        </div>

                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="contact-name fs-13 mb-1"><a href="#" class="link text-dark">Jonny Stromberg</a></h5>
                                            <p class="contact-born text-muted mb-0">New updates for ABC Theme</p>
                                        </div>

                                        <div class="flex-shrink-0 ms-2">
                                            <div class="fs-11 text-muted">06 min</div> 
                                        </div>
                                    </div>
                                </li><li class="list-group-item" data-id="03">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-3">
                                            <div>
                                                <img class="image avatar-xs rounded-circle" alt="" src="assets/images/users/avatar-3.jpg">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="contact-name fs-13 mb-1"><a href="#" class="link text-dark">Martina Elm</a></h5>
                                            <p class="contact-born text-muted mb-0">Nice to meet you</p>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <div class="fs-11 text-muted">28 min</div> 
                                        </div>
                                    </div>
                                </li></ul>
                            <!-- end ul list -->
                        </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 249px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 235px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div>
                    </div>
                </div>
        </div>
    </div>
@endsection