<x-layout>

    <section>
        <div class="p-10">
            <div class="flex items-center justify-between">
                <h1 class="mb-6 text-3xl font-semibold">Admissions Data</h1>
                <a href="/course/create" class="bg-[navy] px-4 py-1.5 rounded-3xl text-white">
                    add new <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <table class="w-full text-center">
                <thead>
                    <tr>
                        <th class="border p-2 bg-gray-200">SN</th>
                        <th class="border p-2 bg-gray-200">Name</th>
                        <th class="border p-2 bg-gray-200">Price</th>
                        <th class="border p-2 bg-gray-200">Image</th>
                        <th class="border p-2 bg-gray-200">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($courses as $i => $course)
                        <tr>
                            <td class="border p-2">{{ ++$i }}</td>
                            <td class="border p-2">{{ $course->name }}</td>
                            <td class="border p-2">{{ $course->price }}</td>
                            <td class="border p-2">
                                <img src="{{ asset($course->image) }}" class="h-[100px]" alt="">
                            </td>
                            <td class="border p-2">
                                <div class="flex justify-center gap-4">
                                    <form action="/delete-course/{{ $course->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">
                                            <i class="fa-solid fa-trash text-[red]"></i>
                                        </button>
                                    </form>

                                    <a href="/edit-course/{{ $course->id }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>

        </div>
    </section>
</x-layout>
