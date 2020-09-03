<template>
    <div>
        <button 
            class="btn btn-primary btn-sm ml-4"
            @click="followUser"
        >Follow</button>
    </div>
</template>

<script>
    export default {
        props: ['user-id'],

        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            followUser() {
                axios.post(`/follow/${this.userId}`)
                    .then(res => alert(res.data));
            }
        }
    }
</script>
