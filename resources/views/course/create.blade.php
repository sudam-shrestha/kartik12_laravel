<x-layout>
    <section>
        <div class="p-10">
            <h1 class="mb-6 text-3xl text-center font-semibold">Create Course</h1>
            <form action="/save-course" method="post" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="name">Enter Name</label>
                        <input type="text" name="name" id="name" class="w-full rounded">
                    </div>

                    <div>
                        <label for="price">Enter Price</label>
                        <input type="number" name="price" id="price" class="w-full rounded">
                    </div>

                    <div class="col-span-2">
                        <label for="description">description</label>
                        <textarea name="description" id="description" class="w-full"></textarea>
                    </div>

                    <div>
                        <label for="image">Upload Image</label>
                        <input type="file" name="image" id="image" class="w-full rounded">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 px-6 py-2 rounded mt-6 text-white">Save Record</button>
                </div>

            </form>
        </div>
    </section>

</x-layout>
