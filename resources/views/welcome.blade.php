<x-layout>
    <section>
        <div class="p-10">
            <h1 class="mb-6 text-3xl text-center font-semibold">Create Company</h1>
            <form action="/save-company" method="post" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="name">Enter Company Name</label>
                        <input type="text" name="name" id="name" class="w-full rounded">
                    </div>

                    <div>
                        <label for="email">Enter Company Email</label>
                        <input type="email" name="email" id="email" class="w-full rounded">
                    </div>

                    <div>
                        <label for="contact">Enter Company Contact</label>
                        <input type="text" name="contact" id="contact" class="w-full rounded">
                    </div>

                    <div>
                        <label for="address">Enter Company Address</label>
                        <input type="text" name="address" id="address" class="w-full rounded">
                    </div>
                    <div class="col-span-2">
                        <label for="">description</label>
                        <textarea name="description" id="" class="w-full"></textarea>
                    </div>

                    <div>
                        <label for="logo">Enter Company Logo</label>
                        <input type="file" name="logo" id="logo" class="w-full rounded">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 px-6 py-2 rounded mt-6 text-white">Save Record</button>
                </div>

            </form>
        </div>
    </section>

    <section>
        <div class="p-10">
            <h1 class="mb-6 text-3xl text-center font-semibold">Companies Data</h1>

            <table class="w-full text-center">
                <thead>
                    <tr>
                        <th class="border p-2 bg-gray-200">SN</th>
                        <th class="border p-2 bg-gray-200">Name</th>
                        <th class="border p-2 bg-gray-200">Email</th>
                        <th class="border p-2 bg-gray-200">Address</th>
                        <th class="border p-2 bg-gray-200">Image</th>
                        <th class="border p-2 bg-gray-200">Contact</th>
                        <th class="border p-2 bg-gray-200">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $i => $company)
                        <tr>
                            <td class="border p-2">{{ ++$i }}</td>
                            <td class="border p-2">{{ $company->name }}</td>
                            <td class="border p-2">{{ $company->email }}</td>
                            <td class="border p-2">{{ $company->address }}</td>
                            <td class="border p-2">
                                <img src="{{ asset($company->image) }}" class="h-[100px]" alt="">
                            </td>
                            <td class="border p-2">{{ $company->contact }}</td>
                            <td class="border p-2">
                                <form action="/delete-company/{{ $company->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">
                                        <i class="fa-solid fa-trash text-[red]"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </section>
</x-layout>
