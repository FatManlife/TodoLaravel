<x-layout>
    <div class="pl-60 pr-60 mt-10">
        <div class="flex justify-center mt-4 mb-4 items-center">
            <p class=" text-4xl font-bold ">{{ $task->title }}</p>
            <p class=" text-4xl font-bold   text-info bg-base-300 p-2 ml-2 rounded-lg">
                {{ $task->status }}</p>
        </div>
        <div>
            <div class="flex place-content-between pl-2 pr-2">
                <p class="text-base text-start">Created by <b>{{ $user->name }}</b></p>
                <p class="text-base ">Created at <b>{{ $task->created_at }}</b></p>
            </div>
        </div>
        <div class="bg-base-200 border border-base-300 mt-5 rounded-lg pl-9 pr-9 flex flex-col pb-7">
            <div class="flex justify-start mt-4 mb-4">
                <p class=" text-2xl font-bold">Description</p>
            </div>
            <p class=" text-base break-all">{{ $task->description }}</p>
            <div class="mt-10 flex justify-end items-center gap-3">
                <p class=" text-base break-all ">Last updated on {{ $task->updated_at }}</p>
                @if ($isUser)
                    <a href="{{ route('task.edit.view', $task->id) }}" class="btn btn-info text-base">Edit</a>
                    <form method="POST" action="{{ route('task.delete.action', $task->id) }}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-error text-base"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-trash-icon lucide-trash">
                                <path d="M3 6h18" />
                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                            </svg></button>
                    </form>
                @endif
                <a href="{{ route('task.index.view') }}" class="btn btn-primary text-base">Back</a>
            </div>
        </div>
    </div>
    </div>
</x-layout>
