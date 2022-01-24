<template>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-sm-6">
              <form>
                  <div class="form-group row">
                      <label for="id" class="col-form-label">ID</label>
                      <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id" v-bind:value="taskId">
                  </div>
                  <div class="form-group row">
                      <label for="title" class="col-form-label">Title</label>
                      <input type="text" class="col-sm-9 form-control" id="title">
                  </div>
                  <div class="form-group row">
                      <label for="content" class="col-form-label">Content</label>
                      <input type="text" class="col-sm-9 form-control" id="content">
                  </div>
                  <div class="form-group row">
                      <label for="person-in-charge" class="col-form-label">Person In Charge</label>
                      <input type="text" class="col-sm-9 form-control" id="person-in-charge">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
      </div>
  </div>
</template>

<script>
// import Index from "../../../vendor/facade/ignition/resources/compiled/index.html";
export default {
    name: "TaskEditComponent",
    props: {
        taskId: String
    }
    // components: {Index}
}
</script>

<style scoped>

</style>
