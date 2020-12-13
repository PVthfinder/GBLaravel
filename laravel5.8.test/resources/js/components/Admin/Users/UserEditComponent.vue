<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Edit Component</div>

                    <div class="card-body">
                        Привет из компонента Vue
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:[
            'user'
        ],
        mounted() {
            console.log(this.user)
            console.log('Component mounted.')
        }
    }
</script>
