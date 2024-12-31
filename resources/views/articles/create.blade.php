<x-app-layout>

    @if ($errors->any())
        <div class="text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none sm:flex items-center my-12 mx-auto px-4 md:px-12">
        <nav class="flex justify-between px-5 py-3 text-gray-700 dark:text-gray-200 rounded-lg bg-[#eaeaebf3] dark:bg-[#1E293B]"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}"
                        class="inline-flex items-center space-x-2 text-sm font-medium text-gray-700 dark:text-gray-200  hover:text-gray-900  dark:hover:text-white">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
                        </svg>
                        <span class="space-x-2">
                            Dashboard
                        </span>
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </li>
                <li class="inline-flex items-center text-sm font-bold  text-gray-700 dark:text-gray-200 hover:text-gray-900  dark:hover:text-white"
                    aria-current="page">
                    Liste des utilisateurs
                </li>
            </ol>
        </nav>

    </div>
    <!--end breadcrumb-->


    <div class=" my-12 mx-auto px-4 md:px-12">
        <h1 class="text-2xl font-bold mb-6">Créer un nouvel article</h1>
        <!-- Formulaire -->
        <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Titre -->
            <div class="mb-4">
                <label for="titre" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Titre de
                    l'article</label>
                <input type="text" id="titre" name="titre"
                    class="mt-1 block w-full text-gray-700 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    value="{{ old('titre') }}" required>
                @error('titre')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contenu -->
            <div class="mb-4">
                <label for="contenu" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Contenu de
                    l'article</label>

                <div id="quill-editor" class="mb-3" style="height: 300px;">{{ old('contenu') }}</div>

                <textarea id="quill-editor-area" name="contenu"
                    class="block w-full px-0 text-sm text-gray-700 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                    required>{{ old('contenu') }}</textarea>


                @error('contenu')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Catégorie -->
            <div class="mb-4">
                <label for="categorie_id"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-200">Catégorie</label>
                <select id="categorie_id" name="categorie_id"
                    class="mt-1 block w-full text-gray-700 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    required>
                    <option value="">Sélectionnez une catégorie</option>
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}"
                            {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                            {{ $categorie->name }}
                        </option>
                    @endforeach
                </select>
                @error('categorie_id')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tags -->
            <div class="mb-4">
                <label for="tags" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Tags</label>
                <select id="tags" name="tags[]" multiple="multiple"
                    class="mt-1 block w-full text-gray-700 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm js-example-basic-multiple">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}"
                            {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                @error('tags')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Image de
                    l'article</label>

                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                <span class="font-semibold">Cliquez pour téléverser</span> ou glissez-déposez
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Formats supportés : SVG, PNG, JPG ou
                                GIF</p>
                        </div>
                        <input id="dropzone-file" type="file" name="image" class="hidden"
                            onchange="previewImage(event)" />
                    </label>
                </div>

                <!-- Zone d'aperçu -->
                <div id="preview-container" class="mt-4 hidden relative">
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Aperçu de l'image :</p>
                    <img id="image-preview" src="#" alt="Aperçu de l'image"
                        class="max-w-full h-auto rounded-lg shadow-md" />
                    <button type="button" onclick="removePreview()"
                        class="absolute top-0 right-0 bg-red-500 text-white p-1 rounded-full w-10 h-10 shadow-md hover:bg-red-600 focus:outline-none">
                        &times;
                    </button>
                </div>

                @error('image')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- Mise à la Une -->
            <div class="mb-4">
                <label for="mis_a_la_une" class="flex items-center">
                    <input type="checkbox" id="mis_a_la_une" name="mis_a_la_une"
                        class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                        {{ old('mis_a_la_une', $article->mis_a_la_une ?? false) ? 'checked' : '' }}>
                    <span class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-200">Mettre cet article à la
                        une</span>
                </label>
                @error('mis_a_la_une')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Boutons -->
            <div class="flex justify-end">
                <button type="reset"
                    class="mr-4 px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Annuler</button>
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Publier</button>
            </div>
        </form>
    </div>



    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (document.getElementById('quill-editor-area')) {
                    var editor = new Quill('#quill-editor', {
                        modules: {
                            toolbar: [
                                [{
                                    'header': [1, 2, false]
                                }],
                                ['bold', 'italic', 'underline', 'strike'],
                                ['blockquote', 'code-block'],
                                [{
                                    'list': 'ordered'
                                }, {
                                    'list': 'bullet'
                                }],
                                ['link', 'image', 'video'],
                                ['clean']
                            ]
                        },
                        theme: 'snow'
                    });
                    var quillEditor = document.getElementById('quill-editor-area');
                    editor.on('text-change', function() {
                        quillEditor.value = editor.root.innerHTML;
                    });
                    quillEditor.addEventListener('input', function() {
                        editor.root.innerHTML = quillEditor.value;
                    });
                }
            });
        </script>
        <script>
            // Fonction pour afficher l'aperçu de l'image
            function previewImage(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const previewContainer = document.getElementById('preview-container');
                        const previewImage = document.getElementById('image-preview');
                        previewImage.src = e.target.result;
                        previewContainer.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            }

            // Fonction pour supprimer l'aperçu de l'image
            function removePreview() {
                const previewContainer = document.getElementById('preview-container');
                const previewImage = document.getElementById('image-preview');
                const fileInput = document.getElementById('dropzone-file');

                // Réinitialiser l'image et le champ de fichier
                previewImage.src = '#';
                previewContainer.classList.add('hidden');
                fileInput.value = ''; // Efface la sélection du fichier
            }
        </script>
        <script type="module">
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>
        <script>
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Succès',
                    text: '{{ session('success') }}',
                    toast: true,
                    position: 'top-end',
                    timer: 3000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: '{{ session('error') }}',
                    toast: true,
                    position: 'top-end',
                    timer: 3000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                });
            @endif
        </script>
    @endsection

    @vite(['resources/js/textarea.js'])
</x-app-layout>
