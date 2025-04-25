<nav>
    <div class="navbar bg-base-300 shadow-sm pl-30 pr-30">
        <div class="flex-1"><a href="{{ route('task.index.view') }}" class="btn btn-ghost text-xl">Home</a></div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li>
                    @if ($user)
                        <details>
                            <summary class="text-base font-bold">{{ $user->name }}</summary>
                            <ul class="bg-base-100 rounded-t-none p-2 flex justify-center">
                                <li>
                                    <form class="w-full" method="POST" action="{{ route('logout.action') }}">
                                        @method('POST')
                                        @csrf
                                        <button type="submit" class="btn text-warning bg-transparent w-full">Log
                                            out</button>
                                    </form>
                                </li>
                            </ul>
                        </details>
                    @else
                <li>
                    <a href="{{ route('login.view') }}" class="btn btn-info text-base">Log in</a>
                </li>
                <li class="ml-2">
                    <a href="{{ route('register.view') }}" class="btn btn-primary text-base">Register</a>
                </li>
        </div>
        @endif
        </li>
        </ul>
    </div>
    </div>
</nav>
