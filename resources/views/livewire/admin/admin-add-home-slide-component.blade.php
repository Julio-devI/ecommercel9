<div>
    <style>
        nav svg{
            height: 20px;
        }

        nav .hidden{
            display: block;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('index')}}" rel="nofollow">Home</a>
                    <span></span> Add New Slide
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        Add new Slide
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.home.slider')}}" class="btn btn-success float-end">All Slides</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('message')}}
                                </div>
                            @endif
                                <form wire:submit.prevent='addSlide' action="">
                                    <div class="mt-3 md-3">
                                        <label class="form-label">Top title</label>
                                        <input type="text" class="form-control" placeholder="Enter slide top title" wire:model="top_title" />
                                        @error('top_title')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-3 md-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" placeholder="Enter title" wire:model="title"/>
                                        @error('title')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-3 md-3">
                                        <label class="form-label">Sub title</label>
                                        <input type="text" class="form-control" placeholder="Enter Sub title" wire:model="sub_title"/>
                                        @error('sub_title')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-3 md-3">
                                        <label class="form-label">Offer</label>
                                        <input type="text" class="form-control" placeholder="Enter offer" wire:model="offer"/>
                                        @error('offer')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-3 md-3">
                                        <label class="form-label">Link</label>
                                        <input type="text" class="form-control" placeholder="Enter link" wire:model="link"/>
                                        @error('link')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-3 md-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" wire:model='status'>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        @error('status')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-3 md-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" class="form-control" wire:model='image' />
                                        @if ($image)
                                            <img src="{{$image->temporaryUrl()}}" width="100" />
                                        @endif
                                        @error('image')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary float-end">Submit</button> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>