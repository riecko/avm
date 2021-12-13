<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AVM API demo</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>

        
        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">
                <h3 class="text-2xl font-bold">Woningwaarde API</h3>
                <p>Lorem Ipsum Lorem Ipsum.</p>
                @if (count($errors) > 0)
                <div class="alert alert-danger mt-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-4 rounded relative" role="alert">
                            <span class="block sm:inline">{{ $error }}</span>
                        </div>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form class="w-full max-w-lg mt-10" method="post" action="/avm">
                @csrf <!-- {{ csrf_field() }} -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                            <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-postcode">Postcode</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-postcode" type="text" placeholder="1812PA" name="postcode">
                            <!--p class="text-red-500 text-xs italic">Verplicht veld</p-->
                        </div>
                        <div class="w-full md:w-1/4 px-3">
                            <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-housenumber">Huisnummer</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-housenumber" type="text" placeholder="10" name="housenumber">
                        </div>
                        <div class="w-full md:w-1/4 px-3">
                            <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-houseadditional">Toevoeging</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-houseadditional" type="text" placeholder="A" name="houseadditional">
                        </div>
                        <div class="w-full md:w-1/4 px-3">
                            <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-search">&nbsp;</label>
                            <input type="submit" name="search" value="Zoek" class="shadow bg-blue-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" >
                        </div>
                    </div>
                </form>
                
                @if (isset($data->Output))
                <div class="flex items-center">
                    <ul>
                        <li class="mb-4"><h3 class="text-2xl font-bold">Zoekresultaat:</h3></li>
                        @foreach ($data->Output as $key => $value)
                        <li>
                            <span class="block sm:inline">{{ $key }}: &nbsp;{{ $value }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @elseif(!empty($data))
                    @foreach ($data as $error)
                        {{$error}}
                    @endforeach
                @endif

            </div>
        </div>    

    </body>
</html>