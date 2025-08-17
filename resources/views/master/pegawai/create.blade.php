@extends('layouts.app')

@section('page_title', 'Tambah Pegawai')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">

    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6">

        <form action="{{ route('pegawai.store') }}" method="POST" class="space-y-5">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Nama</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100"/>
                </div>

                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100"/>
                </div>

                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Telepon</label>
                    <input type="text" name="telepon" value="{{ old('telepon') }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100"/>
                </div>

                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100"/>
                </div>

                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Jabatan</label>
                    <input type="text" name="jabatan" value="{{ old('jabatan') }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100"/>
                </div>

                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Departemen</label>
                    <input type="text" name="departemen" value="{{ old('departemen') }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100"/>
                </div>

                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Username</label>
                    <input type="text" name="username" value="{{ old('username') }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100"/>
                </div>

                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Password</label>
                    <input type="password" name="password"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100"/>
                </div>

                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Role</label>
                    <select name="role" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
                        <option value="staff">Staff</option>
                        <option value="admin">Admin</option>
                        <option value="notaris">Notaris</option>
                        <option value="kasir">Kasir</option>
                    </select>
                </div>

            </div>

            <div class="pt-3 flex flex-wrap gap-4">
                <button type="submit" class="flex-1 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-3 rounded-xl shadow-lg">Simpan Pegawai</button>
                <a href="{{ route('pegawai.index') }}" class="flex-1 bg-gray-400 hover:bg-gray-500 text-white font-semibold py-3 rounded-xl shadow-lg text-center">Batal / Kembali</a>
            </div>

        </form>
    </div>
</div>
@endsection
