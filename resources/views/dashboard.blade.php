<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" x-data x-init="
                {{-- Echo.channel('chat')
                    .listen('Example', (event) => {
                        notifyMe(event);
                    }); --}}
                
                Echo.private('App.Models.User.{{ auth()->id() }}')
                    .notification((notification) => {
                        notifyMe(notification);
                    })
                
                window.notifyMe = (data) => {
                    if (!('Notification' in window)) {
                        alert('This browser does not support desktop notification');
                    } else if (Notification.permission === 'granted') {
                        createNotification(data);
                    } else if (Notification.permission !== 'denied') {
                        Notification.requestPermission().then((permission) => {
                            if (permission === 'granted') {
                                createNotification(data);
                            }
                        });
                    }
                };
                
                function createNotification(data) {
                    const notification = new Notification(data.title, {
                        body: data.content,
                        icon: 'https://th.bing.com/th/id/OIP.EhTMbGiYfYzQnWLgjZaoJAHaHa?rs=1&pid=ImgDetMain',
                        vibrate: [100, 50, 100],
                    });
                }">


                    <button onclick="notifyMe({title: 'Hello', content: 'World'})">Send Notification</button>
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

