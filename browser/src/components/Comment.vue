<template>
    <div aria-label="card 3" tabindex="0" class="focus:outline-none lg:mr-10 lg:mb-1 mb-7 bg-white p-6 shadow rounded">
        <div class="flex items-center border-b border-gray-200 pb-6">
            <img class="w-12 h-12 rounded-full flex flex-shrink-0" :src="avatar">
            <div class="flex items-start justify-between w-full">
                <div class="pl-3 w-full">
                    <p tabindex="0" class="focus:outline-none text-xl font-medium leading-5 text-gray-800">{{ name }}</p>
                    <p tabindex="0" class=" focus:outline-none text-sm leading-normal pt-2 text-gray-500">{{ new Date(created_at).toGMTString() }}</p>
                </div>
                <div role="img" aria-label="bookmark">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg" class="focus:outline-none">
                        <path d="M10.5001 4.66667H17.5001C18.1189 4.66667 18.7124 4.9125 19.15 5.35009C19.5876 5.78767 19.8334 6.38117 19.8334 7V23.3333L14.0001 19.8333L8.16675 23.3333V7C8.16675 6.38117 8.41258 5.78767 8.85017 5.35009C9.28775 4.9125 9.88124 4.66667 10.5001 4.66667Z" stroke="#2C3E50" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="px-2">
            <div>
                <p tabindex="0" class="focus:outline-none text-sm leading-5 py-4 text-gray-600">{{ text }}</p>
            </div>

            <div>
                <router-link :to="`/comments/${id}`" class="relative bg-gray-500 text-white p-3 rounded-lg text-sm uppercase font-semibold tracking-tight overflow-visible" @click="reply(id)">Reply <div class="absolute -top-3 -right-3 px-2.5 py-0.5 bg-green-500 rounded-full text-xs">{{ replies }}</div></router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Comment',
    props: {
        id: {
            type: Number,
            required: true
        },
        name: {
            type: String,
            required: true
        },
        text: {
            type: String,
            required: true
        },
        replies: {
            type: Number,
            required: true
        },
        avatar: {
            type: String,
            required: true
        },
        created_at: {
            type: String,
            required: true
        }
    },
    methods: { }
}
</script>

<style></style>