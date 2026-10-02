@extends('layouts.app')

@section('content')
    <main class="mx-auto w-full max-w-2xl flex-1 px-6 py-10">

        <div class="mb-8 border-b border-[#E5E3DB] pb-5">

            <a href="{{ route('teachers.index') }}"
                class="text-xs uppercase tracking-[0.15em] text-slate-400 hover:text-[#A16207]">
                &larr; Buku Induk
            </a>

            <h1 class="font-display mt-2 text-3xl font-semibold text-[#16213A]">
                Catat Guru Baru
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Isi data untuk mendaftarkan Guru ke buku induk.
            </p>

        </div>

        <form action="{{ route('teachers.store') }}" method="POST" class="space-y-6 border border-[#E5E3DB] bg-white p-8">
            @csrf
            <div>
                <label for="nip" class="mb-1.5 block text-xs font-semibold uppercase tracking-widest text-[#16213A]">
                    NIP
                </label>

                <input value="{{ old('nip') }}" type="text" id="nip" name="nip"
                    placeholder="Contoh: 198501012024"
                    class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm placeholder:text-slate-400 focus:border-[#A16207] focus:bg-white focus:outline-none">
                @error('nip')
                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="name" class="mb-1.5 block text-xs font-semibold uppercase tracking-widest text-[#16213A]">
                    Nama Lengkap
                </label>

                <input value="{{ old('name') }}" type="text" id="name" name="name"
                    placeholder="Nama lengkap Guru"
                    class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm placeholder:text-slate-400 focus:border-[#A16207] focus:bg-white focus:outline-none">
                @error('name')
                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="gender" class="mb-1.5 block text-xs font-semibold uppercase tracking-widest text-[#16213A]">
                    Jenis Kelamin
                </label>

                <select id="gender" name="gender"
                    class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
                    <option @selected(old('gender') === 'Laki-laki/Perempuan') value="" selected>Laki-laki / Perempuan</option>
                    <option @selected(old('gender') === 'Laki-laki') value="Laki-laki">Laki-laki</option>
                    <option @selected(old('gender') === 'Perempuan') value="Perempuan">Perempuan</option>
                </select>

                @error('gender')
                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="subject" class="mb-1.5 block text-xs font-semibold uppercase tracking-widest text-[#16213A]">
                    Mata Pelajaran
                </label>

                <input value="{{ old('subject') }}" type="text" id="subject" name="subject"
                    placeholder="Mata pelajaran yang diampu"
                    class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm placeholder:text-slate-400 focus:border-[#A16207] focus:bg-white focus:outline-none">
                @error('subject')
                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="phone_number"
                    class="mb-1.5 block text-xs font-semibold uppercase tracking-widest text-[#16213A]">
                    No. Telepon
                </label>

                <input value="{{ old('phone_number') }}" type="text" id="phone_number" name="phone_number"
                    placeholder="Contoh: 08123456789"
                    class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm placeholder:text-slate-400 focus:border-[#A16207] focus:bg-white focus:outline-none">
                @error('phone_number')
                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="status" class="mb-1.5 block text-xs font-semibold uppercase tracking-widest text-[#16213A]">
                    Status
                </label>

                <select id="status" name="status"
                    class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
                    <option @selected(old('status') === 'Aktif/Tidak Aktif') value="" selected>Aktif / Tidak Aktif</option>
                    <option @selected(old('status') === 'Aktif') value="Aktif">Aktif</option>
                    <option @selected(old('status') === 'Tidak Aktif') value="Tidak Aktif">Tidak Aktif</option>
                </select>
                @error('status')
                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-end gap-4 border-t border-[#EFEDE6] pt-6">

                <a href="{{ route('teachers.index') }}"
                    class="px-4 py-2.5 text-sm font-medium text-slate-500 hover:text-[#16213A]">
                    Batal
                </a>

                <button type="submit"
                    class="bg-[#16213A] px-6 py-2.5 text-sm font-medium text-white transition hover:bg-[#26324f]">
                    Simpan ke Buku Induk
                </button>

            </div>

        </form>

    </main>
@endsection
