<?php
// Search functionality for the static site utilizing Alpine.js.
// By default, it searches the blogs of the site only. There
// are no props to be passed into this component.
?>


<div x-data="search()" class="flex flex-1 justify-end items-center text-right px-4">
    <div
        class="absolute md:relative w-full justify-end bg-white left-0 top-0 z-10 mt-7 md:mt-0 px-4 md:px-0"
        x-bind:class="{'hidden md:flex': !searching}"
    >
        <label for="search" class="hidden">Search</label>

        <input
                id="search"
                x-model="query"
                ref="search"
                class="transition-fast relative block h-10 w-full lg:w-1/2 lg:focus:w-3/4 bg-gray-100 border border-gray-500 focus:border-blue-400 outline-none cursor-pointer text-gray-700 px-4 pb-0 pt-px"
                x-bind:class="{ 'transition-border': query }"
                autocomplete="off"
                name="search"
                placeholder="Search"
                type="text"
                @keyup.esc="reset"
                @blur="reset"
        >

        <button
                x-show="query || searching"
                class="absolute top-0 right-0 leading-snug font-400 text-3xl text-blue-500 hover:text-blue-600 focus:outline-none pr-7 md:pr-3"
                @click="reset"
        >&times;</button>

            <div x-show="query" class="absolute left-0 right-0 md:inset-auto w-full lg:w-3/4 text-left mb-4 md:mt-10" x-transition>
                <div class="flex flex-col bg-white border border-b-0 border-t-0 border-blue-400 rounded-b-lg shadow-lg mx-4 md:mx-0">
                    <template x-for="(result,index) in results"
                    >
                        <a
                                class="bg-white hover:bg-blue-100 border-b border-blue-400 cursor-pointer p-4"
                                x-bind:class="{ 'rounded-b-lg' : (index === results.length - 1) }"
                                :href="result.item.link"
                                :title="result.item.title"
                                :key="result.item.link"
                                @mousedown.prevent
                        >
                            <span class="text-xl" x-text="result.item.title"></span>
                            <span class="block font-normal text-gray-700 text-sm my-1" x-text="result.item.snippet"></span>
                        </a>
                    </template>
                    <div
                            x-show="! results.length"
                            class="bg-white w-full hover:bg-blue-100 border-b border-blue-400 rounded-b-lg shadow cursor-pointer p-4"
                    >
                        <p class="my-0">No results for <strong x-text="query"></strong></p>
                    </div>
                </div>
            </div>
    </div>

    <button
            title="Start searching"
            type="button"
            class="flex md:hidden bg-gray-100 hover:bg-blue-100 justify-center items-center border border-gray-500 rounded-full focus:outline-none h-10 px-3"
            x-on:click.prevent="showInput"
    >
        <img src="/assets/img/magnifying-glass.svg" alt="search icon" class="h-4 w-4 max-w-none">
    </button>
</div>

@push('scripts')
<script>
    function search() {
        return {
            fuse: null,
            searching: false,
            query: '',

            init() {
                axios('/index.json')
                    .then(response => {
                        this.fuse = new fuse(response.data, {
                            minMatchCharLength: 6,
                            keys: ['title', 'snippet', 'categories'],
                        });
                    })
                    .catch(console.error);
            },

            get results () {
                return this.query ? this.fuse.search(this.query) : [];
            },
            showInput() {
                this.searching = true;
                this.$nextTick(() => {
                    this.$refs.search.focus();
                })
            },
            reset() {
                this.query = '';
                this.searching = false;
            },
        }
    };
</script>
@endpush

@push('styles')
<style>
    input[name='search'] {
        background-image: url('/assets/img/magnifying-glass.svg');
        background-position: 0.8em;
        background-repeat: no-repeat;
        border-radius: 25px;
        text-indent: 1.2em;
    }

    input[name='search'].transition-border {
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
        border-top-left-radius: .5rem;
        border-top-right-radius: .5rem;
    }
</style>
@endpush