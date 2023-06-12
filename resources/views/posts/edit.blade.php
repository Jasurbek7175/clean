<x-layouts.main>
    <x-page-header>
        Postni o'zgartirish # {{ $post->id }}
    </x-page-header>

    <div class="col-lg-7 mb-5 ">
        <div class="contact-form">
            <div id="success"></div>
            <form action="{{ route('posts.update', ['post'=>$post->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-row">
                    <div class="col-sm-12 control-group mb-3">
                        <input type="text"  value="{{ $post->title}}" class="form-control p-4" name="title" placeholder="Sarlavha"/>
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-12 control-group">
                        <textarea type="text" class="form-control p-4" name="short_content"
                                  placeholder="Qisqacha">{{ $post->short_content }}</textarea>
                    </div>
                    @error('short_content')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="control-group">
                    <input name="photo" type="file" class="form-control p-4" placeholder="Rasm"/>
                </div>
                <div class="control-group">
                    <textarea class="form-control p-4" rows="4" name="part" placeholder="Ma'qola">{{$post->part }}</textarea>
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

</x-layouts.main>
