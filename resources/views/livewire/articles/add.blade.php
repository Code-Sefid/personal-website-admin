<div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Articles /</span> Add Article</h4
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form wire:submit="save">
                            <div>
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter Title" aria-describedby="defaultFormControlHelp" wire:model="title">
                                @error('title') <span class="error">{{ $message }}</span> @enderror
                            </div>


                            <div class="mt-4">
                                <label for="Description" class="form-label">Description</label>
                                <textarea class="form-control" id="Description" placeholder="Enter Description" rows="2"  wire:model="description"></textarea>
                                @error('description') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="mt-4">
                                <label for="body" class="form-label">Body</label>
                                <div wire:ignore>
                                <textarea wire:model="body"
                                          class="form-control"
                                          id="body" rows="5" wire:model="body"></textarea>
                                </div>
                                @error('body') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="mt-4">
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control" type="file" id="image" wire:model="image">
                                @error('image') <span class="error">{{ $message }}</span> @enderror

                                @if($image)
                                    <img width="500" height="300" class="mt-4" src="{{$image->temporaryUrl()}}"
                                @endif
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        ClassicEditor
        .create(document.querySelector('#body'))
        .then(editor => {
        editor.model.document.on('change:data', () => {
        @this.set('body', editor.getData());
        })
    })
        .catch(error => {
        console.error(error);
    });


        document.addEventListener('livewire:initialized',()=>{
        @this.on('save',(event)=>{
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Added , Your record has been added",
                showConfirmButton: false,
                timer: 1000
            });
        })
        })
</script>
