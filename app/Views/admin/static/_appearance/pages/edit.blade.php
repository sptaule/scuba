@extends('admin.layout')

@section('admin.layouts.main')

    <div class="controls w-full rounded flex items-center justify-start space-x-2">
        <div class="text-white font-arima inline-block h-12 rounded text-lg flex items-center justify-center">
            <span>{!! $title !!}</span>
        </div>
        <div class="h-10 w-0.5 bg-gray-500"></div>
        <a class="btn add py-3" href="{{ ADMIN_PAGES }}">Annuler</a>
    </div>

    <div id="content" class="w-3/4">
        <form action="" method="post" class="space-y-10 my-12" enctype="multipart/form-data">
            @php echo csrf_input() @endphp

            {{--Is the page editable/deletable or not--}}
            {{ partial('input', ['name' => 'deletable', 'type' => 'hidden', 'label' => '', 'size' => 'hidden', 'model' => $page]) }}

            <div class="border-l-2 border-green-400 pl-4 w-full space-y-4">

                @if($page->deletable)
                    <div class="flex flex-row items-end justify-start space-x-0.5">
                        <div class="flex flex-col sm:flex-row space-x-4">
                            {{ partial('input', ['name' => 'name', 'label' => 'Nom', 'model' => $page]) }}
                        </div>
                    </div>
                @endif

                {{--Si des menus existent et que la page est modifiable--}}
                @if($menus && $page->deletable)
                    <div class="flex flex-col sm:flex-row space-x-4">
                        <div class="bg-teal-50 shadow-md p-2 flex flex-col items-start justify-center">
                            {{ partial('checkbox', [
                                'id' => 'is_in_menu',
                                'name' => 'is_in_menu',
                                'toggle' => 'menuSelect',
                                'label' => "Cette page appartient à un menu parent",
                                'subLabel' =>
                                    "Si oui, cette page sera accessible via un menu déroulant au survol du menu parent sélectionné<br>
                                    Si non, elle sera directement accessible depuis la navigation",
                                'state' => !is_null($page->menu_id) ? 'checked' : ''])
                            }}
                            <div class="menuSelect {{ is_null($page->menu_id) ? 'hidden' : '' }}">
                                {{ partial('select', [
                                    'name' => 'menu_id',
                                    'label' => 'Menu',
                                    'subLabel' => 'Choisissez le menu dans laquelle la page sera rangée',
                                    'options' => $menus,
                                    'option_key_label' => 'name',
                                    'model' => $page])
                                }}
                            </div>
                        </div>
                    </div>
                @endif

                <div class="flex flex-row items-end justify-start space-x-0.5">
                    <div class="flex flex-col w-full">
                        {{ partial('quill', ['name' => "editor", 'label' => "Contenu de la page", "content" => $page->content]) }}
                    </div>
                </div>
            </div>
            <button type="submit" class="w-max py-3 mx-4 btn btn-submit">Valider</button>
        </form>
    </div>

@endsection