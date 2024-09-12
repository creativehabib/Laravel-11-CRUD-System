@section('title',"Edit Role")
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assign Permission') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-end min-w-full sm:px-6 lg:px-8 mb-4">
                        <a href="{{ route('roles.index') }}"
                           class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md">All Role</a>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-col">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <h2 class="text-2xl font-semibold mb-6">Update Role Name</h2>
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg p-6">
                                    <form method="POST" action="{{ route('roles.update', $role->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="sm:col-span-6">
                                            <label for="name" class="block text-sm font-medium text-gray-700"> Role name
                                            </label>
                                            <div class="mt-1">
                                                <input type="text" id="name" name="name" value="{{ $role->name }}"
                                                       class="capitalize block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                            </div>
                                            @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="sm:col-span-6 pt-5">
                                            <button type="submit"
                                                    class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 mt-6">
                                <h2 class="text-2xl font-semibold">Role Permissions</h2>
                                <div class="flex space-x-2 mt-2 p-2 mb-2">
                                    @if ($role->permissions)
                                        @foreach ($role->permissions as $role_permission)
                                            <form class="px-2 py-1 bg-red-500 hover:bg-red-700 text-white text-sm rounded-md"  method="POST" action="{{ route('roles.permissions.revoke', [$role->id, $role_permission->id]) }}"  onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">{{ $role_permission->name }}</button>
                                            </form>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg p-6">
                                    <form method="POST" action="{{ route('roles.permissions', $role->id) }}">
                                        @csrf
                                        <div class="sm:col-span-6">
                                            <label for="permission" class="block text-sm font-medium text-gray-700">Permission</label>
                                            <select id="permission" name="permission" autocomplete="permission-name" class="capitalize mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @foreach ($permissions as $permission)
                                                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        @error('name')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6 pt-5">
                                    <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Assign</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>