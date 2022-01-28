<template>
    <v-list
        class="overflow-x-auto mx-auto my-5"
        width="100%"
        max-width="2000"
    >
        <v-container>
            <div class="justify-content-center">
                <form v-on:submit.prevent="submit">
                    <v-card class="col-sm-6">
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">タイトル</label>
                            <input type="text" class="col-sm-9 form-control" id="title" v-model="task.title">
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">内容</label>
                            <input type="text" class="col-sm-9 form-control" id="content" v-model="task.content">
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">担当者</label>
                            <input type="text" class="col-sm-9 form-control" id="person-in-charge" v-model="task.person_in_charge">
                        </div>
                    </v-card>
                    <v-btn
                        type="submit"
                        class="btn white--text"
                        color="#F57C00"
                        elevation="10"
                    >
                        追加する
                    </v-btn>
                </form>
            </div>
        </v-container>
    </v-list>
</template>

<script>
export default {
    data: function () {
        return {
            task: {}
        }
    },
    methods: {
        submit() {
            axios.post('/api/tasks', this.task)
                .then((res) => {
                    this.$router.push({name: 'task.list'});
                })
            .catch(e => {
                console.log(e.response.data.errors)
            });
        }
    }
}
</script>
