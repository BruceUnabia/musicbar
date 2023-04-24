<div>
    <div class="">
        @if ($message = Session::get('message'))
            <div class="alert alert-success alert-block mt-2 d-flex justify-content-between">
                <div class="mt-1">
                    <strong>{{ $message }}</strong>
                </div>

                <div class="btn close ms-auto" data-dismiss="alert">x</div>
            </div>
        @endif
        <div class="row d-flex flex-row justify-content-center">
            <div class="col-md-9 text-white mb-5" style="width:800px">
                <div class="card m-3 shadow-lg" style="height: 280px; background-color:#A5D7E8">
                    <div class="mt-2 mx-4">
                        <input type="search" wire:model="search" class="form-control input" placeholder="Search" style="width:700px">
                    </div>
                    <div class="mx-4 mt-2">
                        <label>Genre</label>
                        <div class="form-check d-flex flex-wrap">
                            @foreach(['Rock', 'Pop', 'Reggae', 'Acoustic', 'Classical'] as $genre)
                                <div class="form-check me-3">
                                    <input wire:model="by{{$genre}}" class="form-check-input" type="checkbox" value="{{$genre}}" id="{{$genre}}">
                                    <label class="form-check-label" for="{{$genre}}">
                                        {{$genre}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <br>
                    <div class="ms-3 d-flex flex-row">
                        <div class="me-3" style="width: 300px;">
                          <label>Location</label>
                          <select class="form-select" wire:model="byLocation">
                            <option value="all">Select Location</option>
                            @foreach ($locations as $location)
                              <option value="{{ $location }}">{{ $location }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="me-3">
                          <label for="customRange2">Rate</label><br>
                          <input type="range" class="form-range" min="100" max="10000" id="customRange2" style="width: 300px;" wire:model='byRate'>
                          <p>P{{ $byRate }}</p>
                        </div>
                        <div class="me-3" style="width: 300px;">
                          <label for="">Sort by</label>
                          <select name="" id="" class="form-control" wire:model='srtBy'>
                            <option value="asc">Lowest to Highest</option>
                            <option value="desc">Highest to Lowest</option>
                          </select>
                        </div>
                      </div>
                    <button style="background-color:#4b6cb7" class="btn mt-2 mx-auto me-3" wire:click='resetFilters' type='button'>Reset Filter</button>
                </div>
            </div>
            <div class="col-md-8">
                <div class="d-flex justify-content-between mx-auto">
                    <b><div class="btn me-5 mb-3 text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #A5D7E8">+Add</div></b>
                    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header text-center" style="background-color:#4b6cb7">
                                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add Band Profile</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="addProfile()">
                                        @csrf
                                        <div class="container mx-auto">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="image" >Image:</label>
                                                        <input type="file" class="form-control" wire:model="image" id="image">
                                                        @if ($image)
                                                            <span>Photo Preview:</span>
                                                            <img src="{{ $image->temporaryUrl() }}" style="width:100px; height:100px">
                                                        @endif
                                                        @error('image')
                                                            <span class="error">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="bandName" >Band Name:</label>
                                                        <input type="text" class="form-control" wire:model="bandName" id="bandName">
                                                        @error('bandName')
                                                            <span class="error">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="location" >Location</label>
                                                        <input type="text" class="form-control" wire:model="location" id="location">
                                                        @error('location')
                                                            <span class="error">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="rate" >Rate</label>
                                                        <input type="number" class="form-control" wire:model="rate" id="rate">
                                                        @error('rate')
                                                            <span class="error">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="genre" >Genre</label>
                                                        <select class="form-select" wire:model="genre" id="genre">
                                                            <option selected>Select Genre</option>
                                                            <option value="Pop">Pop</option>
                                                            <option value="Rock">Rock</option>
                                                            <option value="Reggae">Reggae</option>
                                                            <option value="Acoustic">Acoustic</option>
                                                            <option value="Classical">Classical</option>
                                                        </select>
                                                        @error('genre')
                                                            <span class="error">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Description</label>
                                                        <textarea type="number" class="form-control" wire:model="description"></textarea>
                                                        @error('description')
                                                            <span class="error">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save Profile</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($bands as $band)
                    <div class="col-sm-5 md-4">
                        <div data-bs-toggle="modal" data-bs-target="#viewBand{{ $band->id }}"
                            class="card mb-2 btnh me-3 shadow-lg" style="max-width: 360px;">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage') }}/{{ $band->image }}" class="img-fluid mt-2 mb-2" alt="..." style="width:200px; height:130px; border-radius:50%; margin-right:20px">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $band->bandName }}</h6>
                                        <label class="card-text"><span class="fst-italic">Location: </span> <span class="fw-semibold"> {{ $band->location }} </span></label>
                                        <label class="card-text"><span class="fst-italic">Rate: </span> <span class="fw-semibold">P{{ $band->rate }} </span></label><br>
                                        <label class="card-text"><span class="fst-italic">Genre: </span> <span class="fw-semibold"> {{ $band->genre }} </span></label>

                                    </div>
                                    <div class="action d-flex" style="margin-left: 1px; margin-top: -17px;">
                                        <a style="margin-right: 5px" data-bs-toggle="modal" data-bs-target="#updateBand{{ $band->id }}">
                                            <div class="btn" wire:click="editProfile({{ $band->id }})" style="background-color:#A5D7E8; margin-left:90px;">
                                            Edit
                                            </div>
                                        </a>
                                        <a data-bs-toggle="modal" data-bs-target="#deleteModal{{ $band->id }}">
                                            <div class="btn" wire:click="deleteProfile({{ $band->id }})" style="background-color:red">
                                                Delete
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div wire:ignore.self class="modal fade" id="updateBand{{ $band->id }}" tabindex="-1" aria-labelledby="updateBandLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header text-center" style="background-color:#A5D7E8; ">
                                        <h1 class="modal-title fs-5" id="updateBandLabel">Edit Band Profile </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form wire:submit.prevent="updateProfile()">
                                            @csrf
                                            <div class="container mx-auto">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label>Image:</label>
                                                            <input type="file" wire:model="image"
                                                                class="form-control">
                                                            {{-- <img src="{{asset('storage')}}/{{$this->image}}" class="img-fluid mt-2 mb-2" alt="..."> --}}
                                                            @if ($image)
                                                                Photo Preview:
                                                                <img src="{{ $image->temporaryUrl() }}"
                                                                    style="width:100px; height:100px">
                                                            @endif

                                                            @error('image')
                                                                <span class="error">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Band Name:</label>
                                                            <input type="text" class="form-control" wire:model="bandName">
                                                            @error('name')
                                                                <span class="error">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Location</label>
                                                            <input type="text" class="form-control"
                                                                wire:model="location">
                                                            @error('location')
                                                                <span class="error">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Rate</label>
                                                            <input type="number" class="form-control"
                                                                wire:model="rate">
                                                            @error('rate')
                                                                <span class="error">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="">
                                                            <label for="genre" >Genre</label>
                                                            <select class="form-select" wire:model="genre"
                                                                id="genre">
                                                                <option selected>Select Genre</option>
                                                                <option value="Pop">Pop</option>
                                                                <option value="Rock">Rock</option>
                                                                <option value="Reggae">Reggae</option>
                                                                <option value="Acoustic">Acoustic</option>
                                                                <option value="Classical">Classical</option>
                                                            </select>
                                                            @error('genre')
                                                                <span class="error">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for=""
                                                                >Description</label>
                                                            <textarea type="number" class="form-control" wire:model="description"></textarea>
                                                            @error('description')
                                                                <span class="error">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Profile</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div wire:ignore.self class="modal fade" id="deleteModal{{ $band->id }}" tabindex="-1"
                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h1 class="modal-title fs-5" id="deleteModalLabel">Delete</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button wire:click="destroyProfile" class="btn btn-primary">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div wire:ignore.self class="modal fade" id="viewBand{{ $band->id }}" tabindex="-1"
                            aria-labelledby="viewBandLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="d-flex justify-content-center">
                                            <img src="{{ asset('storage') }}/{{ $band->image }}"
                                                class="rounded-circle w-25" alt="...">
                                        </div>
                                        <h3 class="text-center">{{ $band->bandName }}</h3>
                                        <hr>
                                        <p class="text-center">{{ $band->description }}</p>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn rounded-pill" style="background-color:#AEC2B6">Book Now</button>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-2">
            {{ $bands->links() }}
        </div>
    </div>
</div>
