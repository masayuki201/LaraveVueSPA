<template>
    <v-list
        class="overflow-x-auto mx-auto my-5"
        width="100%"
        max-width="2000"
    >
        <v-container>
            <div class="justify-content:center">
                <v-card class="col-sm-6">
                    <form>
                        <div class="form-group row border-bottom">
                            <label for="id" class="col-sm-3 col-form-label">No</label>
                            <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id"
                                   v-model="task.id">
                        </div>
                        <div class="form-group row border-bottom">
                            <label for="title" class="col-sm-3 col-form-label">タイトル</label>
                            <input type="text" class="col-sm-9 form-control-plaintext" readonly id="title"
                                   v-model="task.title">
                        </div>
                        <div class="form-group row border-bottom">
                            <label for="content" class="col-sm-3 col-form-label">内容</label>
                            <input type="text" class="col-sm-9 form-control-plaintext" readonly id="content"
                                   v-model="task.content">
                        </div>
                        <div class="form-group row border-bottom">
                            <label for="person-in-charge" class="col-sm-3 col-form-label">担当者</label>
                            <input type="text" class="col-sm-9 form-control-plaintext" readonly id="person-in-charge"
                                   v-model="task.person_in_charge">
                        </div>
                    </form>
                </v-card>
            </div>
        </v-container>
    </v-list>
</template>

<script>
export default {
    props: {
        taskId: String
    },
    data: function () {
        return {
            task: {}
        }
    },
    methods: {
        getTask() {
            axios.get('/api/tasks/' + this.taskId)
                .then((res) => {
                    this.task = res.data;
                });
        }
    },
    mounted() {
        this.getTask();
    }
}
</script>
