<template>
    <div>
        <button 
            class="btn btn-primary btn-sm ml-4"
            @click="followUser"
            v-text="buttonText"
        ></button>
    </div>
</template>

<script>
    export default {
        props: ['user-id', 'follows'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function () {
            return {
                status: this.follows,
            }
        },

        methods: {
            followUser() {
                axios.post(`/follow/${this.userId}`)
                    .then(res => {
                        this.status = ! this.status;
                        console.log(res.data);
                    });
            }
        },

        computed: {
            buttonText() {
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }
    }
</script>
