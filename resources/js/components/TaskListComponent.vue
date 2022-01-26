<template>
    <v-list
        class="overflow-x-auto mx-auto my-5"
        width="100%"
        max-width="2000"
    >
        <v-container>
            <div class="justify-content-center">
                <div class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">タイトル</th>
                            <th scope="col">内容</th>
                            <th scope="col">担当者</th>
                            <th scope="col">詳細</th>
                            <th scope="col">編集</th>
                            <th scope="col">削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(task, index) in tasks" :key="indnex">
                           <th scope="row">{{ task.id }}</th>
                           <td>{{ task.title }}</td>
                           <td>{{ task.content }}</td>
                           <td> {{ task.person_in_charge }}</td>
                           <td>
                               <v-btn
                                   class="showBtn"
                                   color="#00B0FF"
                                   elevation="10"
                                   :to="{name: 'task.show', params: {taskId: task.id }}"
                               >
                                   詳細
                               </v-btn>
                           </td>
                           <td>
                               <v-btn
                                   class="editBtn"
                                   color="#7CB342"
                                   elevation="10"
                                   :to="{name: 'task.edit', params: {taskId: task.id }}"
                               >
                                   編集
                               </v-btn>
                           </td>
                           <td>
                               <v-btn
                                   class="deleteBtn"
                                   color="#F06292"
                                   elevation="10"
                                   @click="deleteTask(task.id)"
                               >
                                   削除
                               </v-btn>
                           </td>
                        </tr>
                    </tbody>
                </div>
            </div>
        </v-container>
    </v-list>
</template>

 <script>
     export default {
         data: function () {
             return {
                 tasks: []
             }
         },
         methods: {
             getTasks() {
                 axios.get('/api/tasks')
                     .then((res) => {
                        this.tasks = res.data;
                    });
             },
             deleteTask(id) {
                 axios.delete('/api/tasks/' + id)
                     .then((res) => {
                         this.getTasks();
                     });
             }
         },
         mounted() {
             this.getTasks();
         }
     }
 </script>
