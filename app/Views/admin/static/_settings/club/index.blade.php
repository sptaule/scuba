@extends('admin.layout')

@section('admin.layouts.main')

    <form action="" method="post" class="relative grid grid-flow-row grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-x-12 w-full space-y-2">
        @php echo csrf_input() @endphp
        <div class="col-span-full">
            <p class="block w-full bg-blue-100 px-8 py-2 font-arima text-xl border rounded-md shadow">Le club</p>
        </div>
        <div class="bg-blue-50 shadow-md p-2">
            {{ partial('input', ['name' => 'club_name', 'label' => 'Nom du club', 'default_value' => $clubName]) }}
        </div>
        <div class="bg-blue-50 shadow-md p-2">
            {{ partial('input', ['name' => 'club_description', 'label' => 'Slogan du club', 'default_value' => $clubDescription]) }}
        </div>

        <div class="col-span-full">
            <p class="block w-full bg-yellow-100 px-8 py-2 mt-4 font-arima text-xl border rounded-md shadow">L'administrateur</p>
        </div>
        <div class="bg-yellow-50 shadow-md p-2">
            {{ partial('input', ['name' => 'super_user_firstname', 'label' => 'Prénom du super administrateur', 'default_value' => $superUserFirstname]) }}
        </div>
        <div class="bg-yellow-50 shadow-md p-2">
            {{ partial('input', ['name' => 'super_user_lastname', 'label' => 'Nom du super administrateur', 'default_value' => $superUserLastname]) }}
        </div>
        <div class="bg-yellow-50 shadow-md p-2">
            {{ partial('input', ['name' => 'super_user_email', 'label' => 'Email du super administrateur', 'default_value' => $superUserEmail]) }}
        </div>

        <div class="col-span-full">
            <p class="block w-full bg-teal-100 px-8 py-2 mt-4 font-arima text-xl border rounded-md shadow">Inscriptions</p>
        </div>
        <div class="bg-teal-50 shadow-md p-2 flex flex-col items-start justify-start space-y-4">
            <div>
                {{ partial('checkbox', [
                    'id' => 'allow_registrations',
                    'name' => 'allow_registrations',
                    'label' => 'Autoriser les inscriptions',
                    'subLabel' => "Si non, personne ne pourra créer de compte sur le site.",
                    'state' => $allowRegistrations == 1 ? 'checked' : ''])
                }}
            </div>
            <div>
                {{ partial('checkbox', [
                    'id' => 'manual_user_approval',
                    'name' => 'manual_user_approval',
                    'label' => 'Approuver les membres manuellement',
                    'subLabel' => "Si oui, le compte du membre ne sera pas activé tant que vous ne l'aurez pas approuvé.",
                    'state' => $manualUserApproval == 1 ? 'checked' : ''])
                }}
            </div>
            <div class="grid grid-cols-2 gap-x-24 bg-white p-4 rounded-md w-full">
                <p class="col-span-full mb-2 text-gray-600 text-sm italic">Âges autorisés à s'inscrire sur le site</p>
                {{ partial('input', [
                    'name' => 'min_age_to_register',
                    'label' => 'Âge min',
                    'subLabel' => '',
                    'type' => 'number',
                    'min' => 1,
                    'default_value' => $minAgeToRegister,
                    'class' => 'mx-auto w-20',
                    'size' => 'md:flex flex-col md:flex-row md:items-center md:justify-center',
                    'labelClass' => 'text-sm font-normal'])
                }}
                {{ partial('input', [
                    'name' => 'max_age_to_register',
                    'label' => 'Âge max',
                    'subLabel' => '',
                    'type' => 'number',
                    'max' => 99,
                    'default_value' => $maxAgeToRegister,
                    'class' => 'mx-auto w-20',
                    'size' => 'md:flex flex-col md:flex-row md:items-center md:justify-center',
                    'labelClass' => 'text-sm font-normal'])
                }}
            </div>
        </div>
        <div class="bg-teal-50 shadow-md p-2">
            {{ partial('radio', [
                'id' => 'date_format',
                'groupLabel' => 'Format de date préféré',
                'subLabel' => "Toutes les dates affichées sur le site auront ce format",
                'name' => 'date_format',
                'value' => $dateFormat,
                'options' => [
                    '%d/%m/%y' => strftime('%d/%m/%y'),
                    '%d/%m/%Y' => strftime('%d/%m/%Y'),
                    '%a %d/%m/%y' => strftime('%a %d/%m/%y'),
                    '%A %d/%m/%y' => strftime('%A %d/%m/%y'),
                    '%a %d %b %Y' => strftime('%a %d %b %Y'),
                    '%A %d %b %Y' => strftime('%A %d %b %Y'),
                    '%A %d %B %Y' => strftime('%A %d %B %Y'),
                ]])
            }}
        </div>
        <div class="bg-teal-50 shadow-md p-2">
            {{ partial('radio', [
                'id' => 'time_format',
                'groupLabel' => "Format d'heure préféré",
                'subLabel' => "Toutes les heures affichées sur le site auront ce format",
                'name' => 'time_format',
                'value' => $timeFormat,
                'options' => [
                    '%Hh' => strftime('%Hh'),
                    '%R' => strftime('%R'),
                    '%Hh%M' => strftime('%Hh%M'),
                    '%H:%M:%S' => strftime('%H:%M:%S'),
                    '%Hh %Mm, %Ss' => strftime('%Hh %Mm, %Ss'),
                ]])
            }}
        </div>
        <div class="col-span-full">
            <p class="block w-full bg-purple-100 px-8 py-2 mt-4 font-arima text-xl border rounded-md shadow">Réseaux</p>
        </div>
        <div class="bg-purple-50 shadow-md p-2">
            {{ partial('input', ['name' => 'facebook_url', 'placeholder' => 'Lien Facebook du club', 'default_value' => $facebookUrl, 'label' => '<div class="h-max w-full flex items-center justify-center space-x-2"><img class="inline" src="https://cdn-icons-png.flaticon.com/32/733/733547.png"><span class="leading-3 inline-flex">Facebook</span></div>']) }}
        </div>
        <div class="bg-purple-50 shadow-md p-2">
            {{ partial('input', ['name' => 'instagram_url', 'placeholder' => 'Lien Instagram du club', 'default_value' => $instagramUrl, 'label' => '<div class="h-max w-full flex items-center justify-center space-x-2"><img class="inline" src="https://cdn-icons-png.flaticon.com/32/2111/2111463.png"><span class="leading-3 inline-flex">Instagram</span></div>']) }}
        </div>
        <div class="bg-purple-50 shadow-md p-2">
            {{ partial('input', ['name' => 'youtube_url', 'placeholder' => 'Lien YouTube du club', 'default_value' => $youtubeUrl, 'label' => '<div class="h-max w-full flex items-center justify-center space-x-2"><img class="inline" src="https://cdn-icons-png.flaticon.com/32/1384/1384060.png"><span class="leading-3 inline-flex">YouTube</span></div>']) }}
        </div>
        <div class="bg-purple-50 shadow-md p-2">
            {{ partial('input', ['name' => 'whatsapp_url', 'placeholder' => 'Lien WhatsApp du club', 'default_value' => $whatsappUrl, 'label' => '<div class="h-max w-full flex items-center justify-center space-x-2"><img class="inline" src="https://cdn-icons-png.flaticon.com/32/134/134937.png"><span class="leading-3 inline-flex">WhatsApp</span></div>']) }}
        </div>
        <div class="bg-purple-50 shadow-md p-2">
            {{ partial('input', ['name' => 'twitter_url', 'placeholder' => 'Lien Twitter du club', 'default_value' => $twitterUrl, 'label' => '<div class="h-max w-full flex items-center justify-center space-x-2"><img class="inline" src="https://cdn-icons-png.flaticon.com/32/733/733579.png"><span class="leading-3 inline-flex">Twitter</span></div>']) }}
        </div>
        <div class="bg-purple-50 shadow-md p-2">
            {{ partial('input', ['name' => 'snapchat_url', 'placeholder' => 'Lien Snapchat du club', 'default_value' => $snapchatUrl, 'label' => '<div class="h-max w-full flex items-center justify-center space-x-2"><img class="inline" src="https://cdn-icons-png.flaticon.com/32/1216/1216734.png"><span class="leading-3 inline-flex">Snapchat</span></div>']) }}
        </div>
        <button type="submit" class="md:fixed top-1 right-0 transform translate-y-full btn submit py-3.5 col-span-full flex items-center justify-center space-x-1">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span>Valider les modifications</span>
        </button>
    </form>

@endsection

