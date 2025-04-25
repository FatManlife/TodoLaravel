<x-root-layout>
    <div class="hero bg-base-200 min-h-screen min-w-screen">
        <div class="hero-content flex-col h-full w-full">
            <div>
                <h1 class="text-4xl font-bold ">Log in</h1>
            </div>
            <div class="card bg-base-100  w-full max-w-xl  shrink-0 shadow-2xl mt-3">
                <div class="card-body">
                    <form method="POST" action="{{ route('login.action') }}">
                        @method('POST')
                        @csrf
                        <fieldset class="fieldset">
                            {{-- Email --}}
                            <label class="label text-base">Email</label>
                            @error('email')
                                <p class="text-warning">{{ $message }}</p>
                            @enderror
                            <input type="email " class="input w-full text-sm" placeholder="Email"
                                value="{{ old('email') }}" name="email" />
                            {{-- Password --}}
                            <label class="label text-base mt-1.5">Password</label>
                            @error('password')
                                <p class="text-warning text">{{ $message }}</p>
                            @enderror
                            <input type="password" class="input w-full text-sm" placeholder="Password"
                                name="password" />

                            @error('userExists')
                                <p class="text-warning">{{ $message }}</p>
                            @enderror

                            <div class="mt-2 ml-1 text-sm">Don't have an account?<a href="{{ route('register.view') }}"
                                    class="link link-hover text-info ml-1.5 font-bold">Register</a></div>
                            <button type="submit" class="btn btn-neutral mt-4 text-base">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-root-layout>
