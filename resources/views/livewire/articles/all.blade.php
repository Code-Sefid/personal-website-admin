<div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Articles /</span> List of articles</h4>

        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>User</th>
                        <th>View Count</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($articles as $article)
                        <tr>
                            <td> {{ $loop->index+1  }} </td>
                            <td> {{ $article->title ?? "" }} </td>
                            <td> {{ $article->user->name ?? "" }} </td>
                            <td> {{ $article->view_count }} </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('admin.articles.update',$article->id) }}"
                                        ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" wire:click="$dispatch('delete-prompt',{id : {{$article->id}} })"
                                        ><i class="bx bx-trash me-1"></i> Delete</a
                                        >
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
{{--    <livewire:users.update>--}}
</div>

<script>
    document.addEventListener('livewire:initialized',()=>{
    @this.on('delete-prompt',(event)=>{
        swal.fire({
            title:'Are you sure?',
            text:'You are about to delete this record, this action is irreversible',
            icon:'warning',
            showCancelButton:true,
            confirmButtonColor:'#3085d6',
            showCancelButtonColor:'#d33',
            confirmButtonText:'Yes, Delete it!',
        }).then((result)=>{
            if(result.isConfirmed){
                console.log(event)
                console.log("test")
            @this.dispatch('goOn-Delete' , {
                id : event.id
            })

            @this.on('deleted',(event)=>{
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Deleted , Your record has been deleted",
                    showConfirmButton: false,
                    timer: 1000
                });
            })
            @this.dispatch('refresh-articles');
            }
        })
    })
    })
</script>


