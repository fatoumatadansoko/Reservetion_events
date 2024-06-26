<div x-data="{ activeTab: 'user' }">
    <ul class="flex border-b">
        <li class="-mb-px mr-1">
            <a :class="{'bg-white': activeTab === 'user'}" @click="activeTab = 'user'" class="bg-gray-200 inline-block py-2 px-4 font-semibold cursor-pointer">Utilisateur</a>
        </li>
        <li class="mr-1">
            <a :class="{'bg-white': activeTab === 'association'}" @click="activeTab = 'association'" class="bg-gray-200 inline-block py-2 px-4 font-semibold cursor-pointer">Association</a>
        </li>
    </ul>

    <div x-show="activeTab === 'user'" class="mt-4">
        @include('auth.register-user')
    </div>
    <div x-show="activeTab === 'association'" class="mt-4">
        @include('auth.register-association')
    </div>
</div>
