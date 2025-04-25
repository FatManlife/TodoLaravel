<x-root-layout>
    <div class="hero bg-base-200 min-h-screen min-w-screen">
        <div class="hero-content flex-col h-full w-full">
            <div>
                <h1 class="text-4xl font-bold ">Register</h1>
            </div>
            <div class="card bg-base-100  w-full max-w-xl  shrink-0 shadow-2xl mt-3">
                <div class="card-body">
                    <form method="POST" action="{{ route('register.action') }}">
                        @method('POST')
                        @csrf
                        <fieldset class="fieldset">
                            {{-- Name --}}
                            <label class="label text-base">Name</label>
                            @error('name')
                                <p class="text-warning">{{ $message }}</p>
                            @enderror
                            <input type="text" class="input w-full text-sm" placeholder="Name"
                                value="{{ old('name') }}" name="name" />
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
                                <p class="text-warning">{{ $message }}</p>
                            @enderror
                            <input type="password" class="input w-full text-sm" placeholder="Password"
                                name="password" />
                            {{-- Confirm Password --}}
                            <label class="label text-base mt-1.5">Confirm Password</label>
                            @error('password2')
                                <p class="text-warning">{{ $message }}</p>
                            @enderror
                            <input type="password" class="input w-full text-sm" placeholder="Confirm Password"
                                name="password_confirmation" />

                            <div class="mt-2 ml-1 text-sm">Already have an account?<a href="{{ route('login.view') }}"
                                    class="link link-hover text-info ml-1.5 font-bold">Login</a></div>

                            <button type="submit" class="btn btn-neutral mt-4 text-base">Register</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-root-layout>
