<x-layout>
    <div class="hero bg-base-200 min-h-screen min-w-screen">
        <div class="hero-content flex-col h-full w-full">
            <div>
                <h1 class="text-4xl font-bold ">Edit <b class="text-primary">{{ $task->title }}</b></h1>
            </div>
            <div class="card bg-base-100  w-full max-w-xl  shrink-0 shadow-2xl mt-3">
                <div class="card-body">
                    <form method="POST" action="{{ route('task.edit.action', $task->id) }}">
                        @method('PUT')
                        @csrf
                        <fieldset class="fieldset">
                            {{-- Title --}}
                            <label class="label text-lg">Title</label>
                            @error('title')
                                <p class="text-warning">{{ $message }}</p>
                            @enderror
                            <input type="text" class="input w-full text-base" placeholder="Title"
                                value="{{ $task->title }}" name="title" />
                            {{-- Decription --}}
                            <label class="label text-lg">Description</label>
                            @error('email')
                                <p class="text-warning">{{ $message }}</p>
                            @enderror
                            <textarea rows="4" class="p-2.5 w-full text-base bg-base-200 rounded-lg" placeholder="Description"
                                name="description">{{ $task->description }}</textarea>
                            </textarea>
                            {{-- Status --}}
                            <label class="label text-lg mt-1.5 flex justify-center">Status</label>
                            <div
                                class="flex items-center justify-center space-x-20 bg-base-200 p-2.5 border border-base-300 rounded-sm">
                                <div class="flex flex-row">
                                    <p class="text-base mr-2">Private</p>
                                    <input type="radio" name="status" value="private" />
                                </div>
                                <div class="flex flex-row content-between space-x-2">
                                    <p class="text-base mr-2">Public</p>
                                    <input type="radio" name="status" value="public" checked />
                                </div>
                            </div>

                            <input type="hidden" value="{{ $task->id }}" name="id">

                            <button type="submit" class="btn bg-base-200 mt-4 text-lg">Update</button>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
