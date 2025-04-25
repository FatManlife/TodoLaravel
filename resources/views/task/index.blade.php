<x-layout>
    <div class="flex justify-center mt-10">
        <h1 class="text-3xl font-bold">Tasks</h1>
    </div>

    @if ($isAuth)
        <div class="mt-5 ml-30 mr-30 flex flex-row items-center place-content-between">
            <form method="GET" action="/tasks">
                <div class="flex flex-row items-center gap-2">
                    <ul class="text-sm flex flex-row bg-base-200 p-1 rounded-md">
                        <li class=" ">
                            <div class="flex items-center ps-3">
                                <input id="horizontal-list-radio-license" type="radio" value="all" name="query"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="horizontal-list-radio-license"
                                    class="py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">All
                                </label>
                            </div>
                        </li>
                        <li class="">
                            <div class="flex items-center ps-3">
                                <input id="horizontal-list-radio-id" type="radio" value="public" name="query"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="horizontal-list-radio-id"
                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Public</label>
                            </div>
                        </li>
                        <li class=" ">
                            <div class="flex items-center ps-3">
                                <input id="horizontal-list-radio-military" type="radio" value="private" name="query"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="horizontal-list-radio-military"
                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Private</label>
                            </div>
                        </li>
                    </ul>
                    <div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
            <a href="{{ route('task.create.view') }}" class="btn btn-primary">Create new task</a>
        </div>
    @endif

    <div class="p-30 pt-0 mt-5">
        @foreach ($tasks as $task)
            <div class="collapse collapse-arrow bg-base-100 border border-base-300">
                <input type="radio" name="my-accordion-2" />
                <div class="collapse-title font-semibold">{{ $task->title }}</div>
                <div class="collapse-content text-sm flex flex-col">
                    <p class=" break-all  text-sm ">
                        {{ $task->description }}
                    </p>
                    <div class="flex justify-end">
                        <a href="{{ route('task.show.view', $task->id) }}"
                            class="btn btn-info w-20 mt-3 text-sm">Show</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
