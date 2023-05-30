<template>
    <header class="fixed w-full z-50 bg-blue-800 shadow-md">
        <!---Normal View--->
        <div class="flex justify-between px-4 h-16 2xl:mx-auto max-w-7xl">
            <!--Logo-->
            <div class="flex">
                <a href="/" class="self-center text-white text-center">
                    <img :src="logoUri"  class="h-4 sm:inline-block" alt="logo">
                </a>
            </div>


            <!--Menu Toggle Button--->
            <div class="block md:hidden self-center">
                <!---Avatar---->
                <div v-if="isAuth" class="inline-block mr-4 relative text-left">
                    <Menu>
                        <MenuButton type="button" class="bg-gray-800 relative z-10 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-gray-300" id="user-menu" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <div class="w-8 h-8 bg-gray-200 rounded-full overflow-hidden shadow-inner text-center table">
                                <span class="table-cell text-sm text-white font-bold align-middle uppercase">{{ initials }}</span>
                            </div>
                        </MenuButton>
                        <transition
                            enter-active-class="transition duration-100 ease-out"
                            enter-from-class="transform scale-95 opacity-0"
                            enter-to-class="transform scale-100 opacity-100"
                            leave-active-class="transition duration-75 ease-out"
                            leave-from-class="transform scale-100 opacity-100"
                            leave-to-class="transform scale-95 opacity-0">
                            <MenuItems class="absolute right-0 w-52 mt-2 origin-top-right bg-white border border-gray-200 rounded-md shadow-lg outline-none">
                                    <MenuItem>
                                    <div class="flex flex-col space-y-2 border-b py-2 bg-gray-50 border-gray-100">
                                        <h3 class="whitespace-normal overflow-ellipsis px-4 w-52 text-gray-800">{{ username }}</h3>
                                        <h3 class="whitespace-normal px-4 text-xs w-52 text-gray-400">{{ email }}</h3>
                                    </div>
                                </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                    <a href="/settings" :class="active ? 'bg-gray-100 text-gray-900':'text-gray-700'" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 hover:no-underline" role="menuitem">Settings</a>
                                </MenuItem> 
                                <MenuItem v-slot="{ active }">
                                    <a v-on:click.prevent="logout" href="/logout" :class="active ? 'bg-gray-100 text-gray-900':'text-gray-700'" class="block px-4 py-3 rounded-b-md text-sm text-gray-700 hover:bg-gray-100 hover:no-underline" role="menuitem">Logout</a>
                                </MenuItem>
                            </MenuItems>
                        </transition>
                    </Menu>
                </div>

                <button @click="isOpen = !isOpen" type="button" class="text-white focus:text-white focus:outline-none" 
                aria-controls="mobile-menu" aria-expanded="false">     
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path v-if="isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        <path v-if="!isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <div class="hidden md:flex md:items-center md:space-x-12">
                <!--Nav Links-->
                <div class="hidden md:flex md:ml-12 md:space-x-12">
                    <a v-if="isAuth" href="/home" v-bind:class="currentUrl == 'home' ? 'text-white':'text-blue-300 hover:no-underline hover:text-white border-transparent '" >
                        <div class="-mb-1">
                            <p class="text-sm font-bold">
                                Home
                            </p>
                        </div>
                    </a>
                    <a v-if="isAuth" href="/my-payments" v-bind:class="currentUrl == 'my-payments' ? 'text-white':'text-blue-300 hover:no-underline hover:text-white border-transparent '">
                        <div class="text-sm font-bold">
                            My Payments
                        </div>
                    </a>
                    <a v-if="isAuth && isAdmin" href="#" v-bind:class="currentUrl == 'membership' ? 'text-white':'text-blue-300 hover:no-underline hover:text-white border-transparent '">
                        <div class="text-sm font-bold">
                            Users
                        </div>
                    </a>
                    <a v-if="isAuth && isAdmin" href="/fees-and-charges" v-bind:class="currentUrl == 'fees-and-charges' ? 'text-white':'text-blue-300 hover:no-underline hover:text-white border-transparent '">
                        <div class="text-sm font-bold">
                            Fees &amp; Charges
                        </div>
                    </a>
                    <a v-if="isAuth && isAdmin" href="/organizations" v-bind:class="currentUrl == 'organizations' ? 'text-white':'text-blue-300 hover:no-underline hover:text-white border-transparent '">
                        <div class="text-sm font-bold">
                            Organizations
                        </div>
                    </a>
                </div>

                <!---Avatar---->
                <div v-if="isAuth" class="relative inline-block text-left">
                    <Menu>
                        <MenuButton type="button" class="bg-gray-800 relative z-10 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-gray-300" id="user-menu" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <div class="w-8 h-8 bg-gray-200 rounded-full overflow-hidden shadow-inner text-center table">
                                <span class="table-cell text-sm text-white font-bold align-middle uppercase">{{ initials }}</span>
                            </div>
                        </MenuButton>
                        <transition
                            enter-active-class="transition duration-100 ease-out"
                            enter-from-class="transform scale-95 opacity-0"
                            enter-to-class="transform scale-100 opacity-100"
                            leave-active-class="transition duration-75 ease-out"
                            leave-from-class="transform scale-100 opacity-100"
                            leave-to-class="transform scale-95 opacity-0">
                            <MenuItems class="absolute right-0 w-52 mt-2 origin-top-right bg-white border border-gray-200 rounded-md shadow-lg outline-none">
                                 <MenuItem>
                                    <div class="flex flex-col space-y-2 border-b py-2 bg-gray-50 border-gray-100">
                                        <h3 class="whitespace-normal overflow-ellipsis px-4 w-52 text-gray-800">{{ username }}</h3>
                                        <h3 class="whitespace-normal px-4 text-xs w-52 text-gray-400">{{ email }}</h3>
                                    </div>
                                </MenuItem>
                                 <MenuItem v-slot="{ active }">
                                    <a href="/settings" :class="active ? 'bg-gray-100 text-gray-900':'text-gray-700'" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 hover:no-underline" role="menuitem">Settings</a>
                                </MenuItem> 
                                <MenuItem v-slot="{ active }">
                                    <a v-on:click.prevent="logout" href="/logout" :class="active ? 'bg-gray-100 text-gray-900':'text-gray-700'" class="block px-4 py-3 rounded-b-md text-sm text-gray-700 hover:bg-gray-100 hover:no-underline" role="menuitem">Logout</a>
                                </MenuItem>
                            </MenuItems>
                        </transition>
                    </Menu>
                </div>

                <a v-if="!isAuth && currentUrl != 'login'" href="/login" class="text-blue-50 py-1.5 hover:no-underline hover:text-white border-transparent focus:ring-offset-0 focus:ring-gray-300">Login</a>
                <a v-if="!isAuth && currentUrl != 'register'" href="/register" class="sm:ml-2 text-blue-50 py-1.5 border-transparent hover:text-white hover:no-underline focus:ring-offset-0 focus:ring-gray-300">Register</a>
            </div>
        </div>

        <!---Mobile View--->
        <div v-if="isOpen" class="block md:hidden overflow-auto space-y-4 px-4 pt-1 pb-4">
            <!---Dropdown Links---->
            <a v-if="isAuth" href="/home" v-bind:class="currentUrl == 'home'? 'bg-blue-400 mobile-nav-link':'mobile-nav-link'">Home</a>
            <a v-if="isAuth" href="/my-payments" v-bind:class="currentUrl == 'my-payments'? 'bg-blue-400 mobile-nav-link':'mobile-nav-link'">My Payments</a>
            <a v-if="isAuth && isAdmin" href="#" v-bind:class="currentUrl == 'users'? 'bg-blue-400 mobile-nav-link':'mobile-nav-link'">Users</a>
            <a v-if="isAuth && isAdmin" href="/fees-and-charges" v-bind:class="currentUrl == 'fees-and-charges'? 'bg-blue-400 mobile-nav-link':'mobile-nav-link'">Fees &amp; Charges</a>
            <a v-if="isAuth && isAdmin" href="/organizations" v-bind:class="currentUrl == 'organizations'? 'bg-blue-400 mobile-nav-link':'mobile-nav-link'">Organizations</a>

            <!----Un-Authenticated----->
            <a v-if="!isAuth && currentUrl != 'login'" href="/login" class="block border border-gray-600 px-2 py-1 hover:no-underline hover:bg-gray-700 hover:text-white focus:ring-offset-0 focus:ring-gray-300">Login</a>
            <a v-if="!isAuth && currentUrl != 'register'" href="/register" class="block border border-gray-600 mt-1 px-2 py-1 hover:no-underline hover:bg-gray-700 hover:text-white focus:ring-offset-0 focus:ring-gray-300">Register</a>
        </div>

        <!----->
        <form ref="mform" action="/logout" method="POST" class="hidden">    
            <input type="hidden" name="_token" :value="csrf">
        </form>
    </header>
</template>

<script>
    import { Menu, MenuButton, MenuItems, MenuItem } from "@headlessui/vue";
    export default {
        data () {
            return {
                isOpen: false,
                //isLanding: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        props:{
            isAuth: Boolean,
            currentUrl: String,
            initials: String,
            username: String,
            email:{
                type: String,
                default: '',
            },
            isAdmin: {
                type: Boolean,
                default: true,
            },
            /*currentAdminUrl: {
                type: String,
                default: '',
            },*/
            logoUri: String,
        },
        computed: {},
        methods:{
            logout: function(){
                this.$refs.mform.submit();
            },
        },
        components:{
            Menu, 
            MenuItem,
            MenuItems,
            MenuButton,
        }
    }
</script>