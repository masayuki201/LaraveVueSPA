<template>
  <v-container>
      <div class="justify-content-center">
              <form v-on:submit.prevent="submit">
                  <v-card class="col-sm-6">
                  <div class="form-group row border-bottom">
                      <label for="id" class="col-sm-3 col-form-label">No</label>
                      <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id" v-model="task.id">
                  </div>
                  <div class="form-group row border-bottom">
                      <label for="title" class="col-sm-3 col-form-label">タイトル</label>
                      <input type="text" class="col-sm-9 form-control" id="title" v-model="task.title">
                  </div>
                  <div class="form-group row border-bottom">
                      <label for="content" class="col-sm-3 col-form-label">内容</label>
                      <input type="text" class="col-sm-9 form-control" id="content" v-model="task.content">
                  </div>
                  <div class="form-group row border-bottom">
                      <label for="person-in-charge" class="col-sm-3 col-form-label">担当者</label>
                      <input type="text" class="col-sm-9 form-control" id="person-in-charge" v-model="task.person_in_charge">
                  </div>
                  </v-card>
                  <v-btn
                      type="submit"
                      class="btn"
                      color="#F57C00"
                      elevation="10"
                  >
                      Submit
                  </v-btn>
              </form>
      </div>
  </v-container>
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
        },
        submit() {
            axios.put('/api/tasks/' + this.taskId, this.task)
                .then((res) => {
                    this.$router.push({name: 'task.list'})
                });
        }
    },
    mounted() {
        this.getTask();
    }
}
</script>

<style>
.btn{
    margin: 10px 0px 0px 0px;
}
</style>
