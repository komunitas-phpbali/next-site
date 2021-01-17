<div class="w-full md:w-1/2 mt-16 m-auto">
    <form class="rounded px-8 pt-6 pb-8 mb-4" method="post" action="{{ $action }}">
        @isset($_method) @method($_method) @endisset
        @csrf
        <div class="mb-4">
        <label class="block text-black text-sm font-bold mb-2" for="eventName">
            Nama Kegiatan
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:ring @error('name') border-red-500 @enderror" id="eventName" type="text" placeholder="Nama kegiatan" name="name"
            value="{{ $event->name }}">
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
        <label class="block text-black text-sm font-bold mb-2" for="eventDesc">
            Deskripsi Kegiatan
        </label>
        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:ring @error('desc') border-red-500 @enderror" id="eventDesc" name="desc">{{ $event->desc }}</textarea>
            @error('desc')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
        <label class="block text-black text-sm font-bold mb-2" for="eventPlace">
            Tempat
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:ring @error('place_name') border-red-500 @enderror" id="eventPlace" type="text" placeholder="Tempat" name="place_name" value="{{ $event->place_name }}">
            @error('place_name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
        <label class="block text-black text-sm font-bold mb-2" for="eventAddress">
            Alamat
        </label>
        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:ring @error('address') border-red-500 @enderror" id="eventAddress" name="address">{{ $event->address }}</textarea>
            @error('address')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-black text-sm font-bold mb-2" for="eventStartDateTime">
                Tanggal/Waktu Mulai
            </label>
            <input type="text" name="start_datetime" id="eventStartDateTime" class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:ring @error('start_datetime') border-red-500 @enderror" value="{{ $event->start_datetime }}">
                @error('start_datetime')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
        </div>
        <div class="mb-6">
            <label class="block text-black text-sm font-bold mb-2" for="eventEndDateTime">
                Tanggal/Waktu Selesai
            </label>
            <input type="text" name="end_datetime" id="eventEndDateTime" class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:ring @error('end_datetime') border-red-500 @enderror" value="{{ $event->end_datetime }}">
                @error('end_datetime')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
        </div>
        <div class="flex flex-col items-center justify-between">
        <button type="submit" class="bg-blue-500 w-full hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring" type="button">
            Simpan
        </button>
        <a class="bg-white border w-full py-2 px-4 rounded text-center my-4 font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ url()->previous() }}">
            Batal
        </a>
        </div>
    </form>
  </div>
