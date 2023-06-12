<x-layouts.main>
    <x-page-header>
        Yangi post yaratish
    </x-page-header>


    <div class="col-lg-7 mb-5 ">
        <div class="contact-form">
            <div id="success"></div>
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-sm-12 control-group mb-3">
                        <input type="text"  value="{{ old('title') }}" class="form-control p-4" name="title" placeholder="Sarlavha"/>
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-12 control-group">
                        <textarea type="text" class="form-control p-4" name="short_content"
                                  placeholder="Qisqacha">{{ old('short_content') }}</textarea>
                    </div>
                    @error('short_content')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="control-group">
                    <input name="photo" type="file" class="form-control p-4" placeholder="Rasm"/>
                </div>
                <div class="control-group">
                    <textarea class="form-control p-4" rows="4" name="part" placeholder="Ma'qola">{{ old('part') }}</textarea>
                </div>
                    @error('part')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                <div>
                    <button class="btn btn-primary btn-block py-3 px-5" type="submit"
                            id="sendMessageButton">Send Message
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-layouts.main>
