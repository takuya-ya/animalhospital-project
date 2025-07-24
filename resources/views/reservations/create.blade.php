
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-center">
            {{ __('新規 診察予約登録') }}
        </h2>
    </x-slot>

    @auth 
         <p class="text-center">
           {{Auth::user()->name}}さん、こんにちは！
         </p>
    @endauth


    <div class="py-12">
        <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
            <!-- formの遷移先を変更したら削除してＯＫ？ -->
            @if (session('message'))
                <div class="mb-4 text-green-600">
                    {{ session('message') }}
                </div>
            @endif

            <form method="POST" action="{{ route('reservations.store') }}">
                @csrf

 
            <div class="text-center">
                <label for="reservation_datetime">予約希望日時 : </label>
                <input type="datetime-local"   step="3600" name="reservation_datetime" id="reservation_datetime" required>
            </div>
            
            <div class="text-center mt-10">
                <x-primary-button>
                    送信する
                </x-primary-button>
            </div>
            </form>
        </div>
    </div>
</x-app-layout> 

