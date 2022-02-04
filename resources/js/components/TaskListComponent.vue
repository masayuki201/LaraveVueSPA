<template>
    <v-list
        class="overflow-x-auto mx-auto my-5"
        width="100%"
        max-width="2000"
    >
        <!--検索エリア-->
        <search-area
            @search="searchTasks($event)"
        />

        <!--件数表示-->
        <v-layout wrap>
            <v-flex sm4 pa-2>{{from}}〜{{to}}件 / {{total}}件</v-flex>
        </v-layout>

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
            <!--ページネーション-->
            <template>
                <div class="text-center">
                    <v-container>
                        <v-row justify="center">
                            <v-col cols="8">
                                <v-container class="max-width">
                                    <v-pagination
                                        v-model="page"
                                        :length="length"
                                        :total-visible="10"
                                    />
                                </v-container>
                            </v-col>
                        </v-row>
                    </v-container>
                </div>
            </template>
        </v-container>
    </v-list>
</template>

 <script>
 import SearchArea from "../components/SearchArea.vue";

 export default {
     data() {
         return {
             tasks: [],       //Task一覧データ
             page: 1,   　    //表示中のページ（v-paginationにバインド）
             length: 0,　　　  //ページネーションのリンクの数（v-paginationのprops）
             urlParams: "",   //検索パラメータ
             from: "",        //Task一覧の開始
             to: "",          //Task一覧の終了
             total: "",       //件数
         };
     },
     methods: {
         //検索ボタンをクリックすると呼ばれる
         async searchTasks(params) {
             //検索パラメータをURLに付与してapiを叩く
             this.urlParams = params;
             let url = "/api/tasks?page=" + this.page + "&" + this.urlParams;
             const response = await axios.get(url);
             //戻り値をデータに代入すれば表示が変わる
             let tasks = response.data.data;
             this.tasks = tasks;
             this.length = response.data.last_page;
             this.from = response.data.from;
             this.to = response.data.to;
             this.total = response.data.total;
         },
         //Task削除
         deleteTask(id) {
             axios.delete('/api/tasks/' + id)
                 .then((res) => {
                     this.searchTasks();
                 });
         },
     },
     mounted() {
         //初期表示
         this.searchTasks(this.urlParams);
     },
     watch: {
         //ページネーションのリンクをクリックすると、pageが変わる。
         //pageを監視、変更されたらsearchTasksを実行
         page: function (newPage) {
             this.searchTasks(this.urlParams);
         }
     },
     components: {
         //検索コンポーネント
         SearchArea
     }
 };
 </script>
