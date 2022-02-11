<x-app-layout>
    <x-slot name="header">
        <h2 class="inline font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Recipes Here') }}
        </h2>
            @if (session('status'))
                <div class="flex justify-center text-2xl alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('recipe.store') }}" method="POST" enctype="multipart/form-data">
{{-- Thumbnail Details --}}
                        <div class="relative flex py-5 items-center">
                            <div class="flex-grow border-t border-gray-400"></div>
                            <span class="flex-shrink mx-4 text-gray-400">Thumbnail Details</span>
                            <div class="flex-grow border-t border-gray-400"></div>
                        </div>
                        <div class="grid md:grid-cols-4 md:gap-4">
                            @csrf
                            <div>
                                <label class="lbl" for="title">Title: </label>
                                <input type="text" id="title" name="title" class="form-input">
                            </div>
                            <div>
                                <label class="lbl" for="title">Difficulty: </label>
                                <select name="difficulty" id="difficulty" class="form-input">
                                    <option value="" selected disabled></option>
                                    <option value="Easy">Easy</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Hard">Hard</option>
                                    <option value="Master">Master</option>
                                </select>
                            </div>
                            <div class="flex space-x-2 mt-2 md:mt-0">
                                <div class="w-full">
                                    <label class="lbl" for="hours">Hours:</label>
                                    <select name="" id="" class="form-input">
                                        @for ($i = 0; $i < 10; $i++)
                                        <option value="{{ sprintf("%02d", $i) }}">{{ sprintf("%02d", $i) }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="w-full">
                                    <label class="lbl" for="minutes">Minutes: </label>
                                    <select name="" id="" class="form-input">
                                        @for ($i = 0; $i < 60; $i=$i+5)
                                            <option value="{{ sprintf("%02d", $i) }}" {{ $i==30 ? 'selected' : '' }}>{{ sprintf("%02d", $i) }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label class="lbl" for="cardImage">Card Image </label>
                                <input type="file" class="form-input text-sm" id="cardImage" name="cardImage">
                            </div>
                        </div>
{{-- Recipe Card Details --}}
                        <div class="relative flex py-5 items-center">
                            <div class="flex-grow border-t border-gray-400"></div>
                            <span class="flex-shrink mx-4 text-gray-400">Recipe Card Details</span>
                            <div class="flex-grow border-t border-gray-400"></div>
                        </div>
                    
                        <div id="ingredientParent">
                        <div class="flex space-x-4 justify-center">
                            <div>
                                <label class="lbl">Ingredient: </label>
                                <select name="ingredient[]" class="form-input">
                                    <option value="" selected disabled></option>
                                    @foreach ($ingredients as $ingredient)
                                        <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex space-x-1 mt-2 md:mt-0">
                                <div class="">
                                    <label class="lbl">Quantity</label>
                                    <input type="number" name="quantity[]" class="form-input">
                                </div>
                                <div class="">
                                    <label class="lbl">Unit of Measurement</label>
                                    <select name="unit[]" class="form-input">
                                        <option value="" selected disabled></option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->name }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="py-2 flex justify-center">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 border border-blue-700 rounded py-2" type="button" id="addIngredient">Add Another Ingredient</button>
                        </div>
                        <div class="flex items-center justify-center">
                            <div id="methodParent">
                                <label class="lbl" for="method">Method</label>
                                <textarea class="form-input" name="method[]" id="" cols="100" rows="2"></textarea>
                            </div>
                            <div class="mt-4">
                                <button class="btn-more ml-3" type="button" id="addMethod">+</button>
                            </div>
                        </div>
{{-- Categories --}}
                        <div class="relative flex py-5 items-center">
                            <div class="flex-grow border-t border-gray-400"></div>
                            <span class="flex-shrink mx-4 text-gray-400">Categories</span>
                            <div class="flex-grow border-t border-gray-400"></div>
                        </div>
                        <div class="flex items-center justify-center">
                            <div id="categoryParent">
                                <label class="lbl" for="method">Category</label>
                                <select name="category[]" class="form-input">
                                    <option value="" selected disabled></option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-4">
                                <button class="btn-more ml-3" type="button" id="addCategory">+</button>
                            </div>
                        </div>
{{-- Pictures --}}
                        <div class="relative flex py-5 items-center">
                            <div class="flex-grow border-t border-gray-400"></div>
                            <span class="flex-shrink mx-4 text-gray-400">Pictures</span>
                            <div class="flex-grow border-t border-gray-400"></div>
                        </div>
                        <div class="flex items-center justify-center">
                            <div id="pictureParent">
                                <label class="lbl">Additional Images </label>
                                <input type="file" class="form-input text-sm" name="picture[]">
                            </div>
                            <div class="mt-7">
                                <button class="btn-more ml-3" type="button" id="addPicture">+</button>
                            </div>
                        </div>
{{-- Submit Button --}}
                        <div class="relative flex py-5 items-center">
                            <div class="flex-grow border-t border-gray-400"></div>
                            {{-- <span class="flex-shrink mx-4 text-gray-400">Save Recipe</span> --}}
                            <div class="flex-grow border-t border-gray-400"></div>
                        </div>
                        <div class="flex justify-center">

                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold px-4 border border-green-700 rounded py-2">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

{{-- Add Items Section --}}
    <div class="pt-6 pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    
                    <div class="relative flex py-2 items-center">
                        <div class="flex-grow border-t border-gray-400"></div>
                        <span class="flex-shrink mx-4 text-black-400">Add New Items to Database</span>
                        <div class="flex-grow border-t border-gray-400"></div>
                    </div>


                    <div class="flex justify-between flex-wrap px-20 space-y-4 md:space-y-0">
                        <form action="{{ route('ingredient.store') }}" method="POST">
                            @csrf
                            <input class="form-input w-full" type="text" name="newIngredient" placeholder="Ingredient">
                            <button class="border border-green-700 bg-green-500 hover:bg-green-700 font-semibold text-sm rounded">Add Ingredient</button>
                        </form>
                        <form action="{{ route('unit.store') }}" method="POST">
                            @csrf
                            <input class="form-input w-full" type="text" name="newUnit" placeholder="Unit of Measurement">
                            <button class="border border-green-700 bg-green-500 hover:bg-green-700 font-semibold text-sm rounded">Add Unit</button>
                        </form>
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <input class="form-input w-full" type="text" name="newCategory" placeholder="Category">
                            <button class="border border-green-700 bg-green-500 hover:bg-green-700 font-semibold text-sm rounded">Add Category</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        </div>
</x-app-layout>


{{-- JAVASCRIPT --}}

<script>
let clickMethod = document.querySelector('#addMethod');
let clickIngredient = document.querySelector('#addIngredient');
let clickPicture = document.querySelector('#addPicture');
let clickCategory = document.querySelector('#addCategory');


clickMethod.addEventListener('click', function (event) {
    let newTextArea = document.createElement('div');
    newTextArea.innerHTML = '<textarea class="form-input" name="method[]" cols="100" rows="2"></textarea>';
    document.getElementById("methodParent").appendChild(newTextArea);
});

clickIngredient.addEventListener('click', function (event) {
    let newIngredientGroup = document.createElement('div');
    newIngredientGroup.innerHTML = `
                            <div class="flex space-x-4 justify-center">
                                <div>
                                    <label class="lbl">Ingredient: </label>
                                    <select name="ingredient[]" class="form-input">
                                        <option value="" selected disabled></option>
                                        @foreach ($ingredients as $ingredient)
                                            <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                        @endforeach
                                </select>
                                </div>
                                <div class="flex space-x-1 mt-2 md:mt-0">
                                    <div>
                                        <label class="lbl">Quantity</label>
                                        <input type="number" name="quantity[]" class="form-input">
                                    </div>
                                    <div>
                                        <label class="lbl">Unit of Measurement</label>
                                        <select name="unit[]" class="form-input">
                                            <option value="" selected disabled></option>
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->name }}">{{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            `;
    document.getElementById("ingredientParent").appendChild(newIngredientGroup);
});

clickPicture.addEventListener('click', function (event) {
    let newPicture = document.createElement('div');
    newPicture.innerHTML = '<input type="file" class="form-input mt-2 text-sm" name="picture[]">';
    document.getElementById("pictureParent").appendChild(newPicture);
});

clickCategory.addEventListener('click', function (event) {
    let newCategory = document.createElement('div');
    newCategory.innerHTML = `<select name="category[]" class="form-input">
                                    <option value="" selected disabled></option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                            </select>`;
    document.getElementById("categoryParent").appendChild(newCategory);
});
</script>