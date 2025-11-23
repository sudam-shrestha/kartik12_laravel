<x-layout>
    <section>
        <div class="p-10">
            <h1 class="mb-6 text-3xl text-center font-semibold">Create Admission</h1>
            <form action="{{ route('admission.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="name">Enter Name</label>
                        <input type="text" name="name" id="name" class="w-full rounded">
                    </div>

                    <div>
                        <label for="email">Enter Email</label>
                        <input type="email" name="email" id="email" class="w-full rounded">
                    </div>

                    <div>
                        <label for="phone">Enter Phone</label>
                        <input type="tel" name="phone" id="phone" class="w-full rounded">
                    </div>

                    <div>
                        <label for="course_id">Select Course</label>
                        <select name="course_id" id="course_id" class="w-full rounded">
                            @foreach ($courses as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
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
